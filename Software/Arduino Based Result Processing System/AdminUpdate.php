<?php
    session_start();
    include('Data/PHP/AdminUpdateConnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arduino Based Result Processing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <?php echo "<a class='navbar-brand' href='#'>$student_id</a>"; ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="AdminDocument.php">Dashboard</a></li>
                    <li class="active"><a href="#">Update</a></li>
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
        <h3>Session 2013-14, Roll <?php echo $student_id; ?></h3>
        <h5>Data of <?php foreach($course_list as $row){
                                $x = 0;
                                if($row->course_code == $course){
                                    echo $row->course_title;
                                    $x = 1;
                                }
                        }if($x == 0)
                            echo 'no'; ?>
            course</h5>
        
        <form name="update_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <table class="table table-striped">
                <thred>
                    <tr>
                        <th>Sector</th>
                        <th>Data</th>
                    </tr>
                </thred>
                <tbody>
                    <?php if($admin_type == 'normal'){ ?>
                    <tr>
                        <th>Picture</th>
                        <td><input class="student_picture" id="student_picture" name="student_picture" type="file" accept="image/*" placeholder="Student Picture"></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th>Name</th>
                        <?php
                            echo "<td>$student_name</td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Roll</th>
                        <?php
                            echo "<td>$student_id</td>";
                        ?>
                    </tr>
                    <?php if($admin_type == 'teacher'){ ?>
                    <tr>
                        <th>Attaindance</th>
                        <?php
                                echo "<td>$student_attaindance</td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Class Test</th>
                        <?php
                            if(($admin_type == 'teacher') && ($admin_part == 'a'))
                                echo "<td><input class='form-control' type='text' name='class_test_marks' value='$class_test_marks'></td>";
                            else
                                echo "<td>$class_test_marks</td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Part A</th>
                        <?php
                            if(($admin_type == 'teacher') && ($admin_part == 'a'))
                                echo "<td><input class='form-control' type='text' name='part_a_marks' value='$part_a_marks'></td>";
                            else
                                echo "<td>$part_a_marks";
                        ?>
                    </tr>
                    <tr>
                        <th>Part B</th>
                        <?php
                            if(($admin_type == 'teacher') && ($admin_part == 'b'))
                                echo "<td><input class='form-control' type='text' name='part_b_marks' value='$part_b_marks'></td>";
                            else
                                echo "<td>$part_b_marks</td>";
                        ?>
                    </tr>
                    <?php } ?>
                    
                    <?php if($admin_type == 'normal'){ ?>
                    <tr>
                        <th>RFID</th>
                        <?php
                            echo "<td><input class='form-control' type='text' name='student_rfid' value='$student_rfid'></td>";
                        ?>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <?php
                            echo "<td><input class='form-control' type='text' name='student_email' value='$student_email'></td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <?php
                            echo "<td><input class='form-control' type='text' name='student_phone' value='$student_phone'></td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <?php
                            echo "<td><input class='form-control' type='text' name='student_address' value='$student_address'></td>";
                        ?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th>Year</th>
                        <?php
                            echo "<td><input class='form-control' type='text' name='student_year' value='$student_year'></td>";
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="update" class='btn btn-info' role='button'>Update</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
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