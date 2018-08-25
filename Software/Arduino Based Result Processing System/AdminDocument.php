<?php
    session_start();
    include('Data/PHP/AdminDocumentConnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arduino Based Result Processing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Data/Images/Icon/Dashboard.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Data/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Data/CSS/AdminHome.css">
    <script src="Data/JQuery/jquery.min.js"></script>
    <script src="Data/JS/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Results</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <?php if($admin_type == 'normal'){ ?>
                        <li><a href="AdminReport.php">Report Card</a></li>
                    <?php } ?>
                    <li><a href="About.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Data/PHP/SignOut.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
                    <li><a href="Data/PHP/UpdatePassword.php"><span class="glyphicon glyphicon-wrench"></span> Change Password</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Session 2013-14</h3>
        <h5>Results of <?php $x = 0;
                            foreach($course_list as $row){
                                if($row->course_code == $course){
                                    echo $row->course_title;
                                    $x = 1;
                                }
                            }if($x == 0)
                                echo 'no'; ?>
            course</h5>
        <?php if($admin_part != 'b'){ ?>
        <a class='btn btn-info' role='button' href='AdminAdd.php'>Add New Student</a>
        <?php } ?>
        
        <?php if($admin_type == 'normal'){ ?>
        <form name="modify_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <input class="form-control" style="width: 20%; margin: 10px 0;" type="text" name="student_id" placeholder="Student Roll to Modify">
            <button type="submit" name="modify" class='btn btn-info' role='button'>Click to modify</button>
        </form>
        <?php } ?>
        
        <?php if($admin_type == 'teacher'){ ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name of Student</th>
                    <th>Roll</th>
                    <th>Attendance</th>
                    <th>Class Test</th>
                    <th>Part A</th>
                    <th>Part B</th>
                    <th>Marks</th>
                    <th>GPA</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                try{
                    foreach($student_list as $row1){
                        echo "<tr>";
                        foreach($cse as $row2){
                            if($row1->student_id == $row2->student_id){
                                echo "<th>$row1->student_name</th>";
                                echo "<th>$row1->student_id</th>";
                                echo "<th>$row2->student_attaindance</th>";
                                echo "<th>$row2->class_test_marks</th>";
                                echo "<th>$row2->part_a_marks</th>";
                                echo "<th>$row2->part_b_marks</th>";

                                $student_name = $row1->student_name;
                                $student_id = $row1->student_id;
                                $student_attaindance = $row2->student_attaindance;
                                $class_test_marks = $row2->class_test_marks;
                                $part_a_marks = $row2->part_a_marks;
                                $part_b_marks = $row2->part_b_marks;


                                foreach($course_list as $row){
                                    if($row->course_code == $course){
                                        if($student_attaindance > 35)
                                            $student_attaindance = 35;
                                        
                                        $credit = $row->course_credit;
                                        
                                        if($credit == 1){
                                            $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                            $gpa = ($marks * 4 / 25);
                                        }
                                        else if($credit == 2){
                                            $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                            $gpa = ($marks * 4 / 50);
                                        }
                                        else if($credit == 3){
                                            $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                            $gpa = ($marks * 4 / 75);
                                        }
                                        
                                        if($gpa < 1.6)
                                            $grade = 'F';
                                        else if($gpa < 2)
                                            $grade = 'D';
                                        else if($gpa < 2.25)
                                            $grade = 'C';
                                        else if($gpa < 2.55)
                                            $grade = 'C+';
                                        else if($gpa < 2.75)
                                            $grade = 'B-';
                                        else if($gpa < 3)
                                            $grade = 'B';
                                        else if($gpa < 3.25)
                                            $grade = 'B+';
                                        else if($gpa < 3.5)
                                            $grade = 'A-';
                                        else if($gpa < 3.7)
                                            $grade = 'A';
                                        else
                                            $grade = 'A+';
                                    }
                                }
                                echo "<th>$marks</th>";
                                echo "<th>$gpa</th>";
                                echo "<th>$grade</th>";
                                echo "<th><a class='btn btn-info' role='button' href='Data/PHP/Update.php?id=$row1->student_id' title='Update info of $row1->student_name'>Update</a></th>";
                            }
                        }
                        echo "</tr>";
                    }

                }catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            ?>
            </tbody>
        </table>
        <?php } ?>
        
        
        <?php if($admin_type == 'normal'){ ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name of Student</th>
                    <th>Roll</th>
                    <th>RFID</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                try{
                    foreach($student_list as $row1){
                        echo "<tr>";
                        if(empty($row1->student_picture)){
                            echo '<th><img src="Data/Images/Icon/Student.png" class="img-rounded" alt="Student Picture" height="236"></th>';
                        }else{
                            $temp = 'Data/Images/Store/' . $row1->student_picture;
                            echo "<th><img src='$temp' class='img-rounded' alt='Student Picture' height='236'></th>";
                        }
                        echo "<th>$row1->student_name</th>";
                        echo "<th>$row1->student_id</th>";
                        echo "<th>$row1->student_rfid</th>";
                        echo "<th>$row1->student_email</th>";
                        echo "<th>$row1->student_phone</th>";
                        echo "<th>$row1->student_address</th>";
                        echo "<th>$row1->student_year</th>";


                        $student_name = $row1->student_name;
                        $student_id = $row1->student_id;
                        $student_rfid = $row1->student_rfid;
                        $student_email = $row1->student_email;
                        $student_phone = $row1->student_phone;
                        $student_address = $row1->student_address;
                        $student_year = $row1->student_year;


                        echo "<th><a class='btn btn-info' role='button' href='Data/PHP/Update.php?id=$row1->student_id' title='Update info of $row1->student_name'>Update</a></th>";
                        echo "</tr>";
                    }

                }catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            ?>
            </tbody>
        </table>
        <?php } ?>
        
    </div>
    <!-- Footer -->
	<section style="background-color: gray; color: white;" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>University of Rajshahi, [Rajshahi, Bangladesh]</p>
					<p class="h5">&copy; All right Reversed. <a class="text-white ml-2" style="color: white;" href="#" target="_blank">Shovon</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
</body>

</html>