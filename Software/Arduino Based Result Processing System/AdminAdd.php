<?php
    session_start();
    include('Data/PHP/AdminAddConnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arduino Based Result Processing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Data/Images/Icon/AddNew.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Data/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Data/CSS/AdminHome.css">
    <script src="Data/JQuery/jquery.min.js"></script>
    <script src="Data/JS/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse bg-primary">
        <div class="container-fluid">
            <div class="navbar-header">
                <?php echo "<a class='navbar-brand' href='#' title='New student adding form'>New Student</a>"; ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="AdminDocument.php" title="Move to Dashboard">DashBoard</a></li>
                    <li class="active"><a href="#">Add Student</a></li>
                    <li><a href="About.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Data/PHP/SignOut.php" title="Click to sign out"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
                    <li><a href="Data/PHP/UpdatePassword.php" title="Click to change password"><span class="glyphicon glyphicon-wrench"></span> Change Password</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Student for course <?php echo $course_title; ?></h3>
        <h5>Attempting to add new student for course <?php echo $course . " ($course_title)"; ?></h5>
        
        <form name="add_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <table class="table table-striped">
                <thred>
                    <tr>
                        <th title="Title of sectors">Sector</th>
                        <th title="Student date">Data</th>
                    </tr>
                </thred>
                <?php if($admin_type == 'teacher'){ ?>
                <tbody>
                    <?php if($admin_part == 'a'){ ?>
                    <tr>
                        <th>Roll</th>
                        <td><input class="form-control" type="text" name="student_id" title="Write student roll" placeholder="Student Roll"></td>
                    </tr>
                    <tr>
                        <th>Class Test</th>
                        <td><input class="form-control" type="text" name="class_test_marks" title="Class Test/ Quizzes[3*10 = 30 Marks]" placeholder="Student Class Test Marks"></td>
                    </tr>
                    <tr>
                        <th>Part A</th>
                        <td><input class="form-control" type="text" name="part_a_marks" title="Write written part A marks" placeholder="Student Part A Marks"></td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td><input class="form-control" type="text" name="student_year" title="Which year student from!" placeholder="Student Year"></td>
                    </tr>
                    <?php } ?>
                
                    <?php if($admin_part == 'b'){ ?>
                    <tr>
                        <th>Roll</th>
                        <td><input class="form-control" type="text" name="student_id" title="Write student roll" placeholder="Student Roll"></td>
                    </tr>
                    <tr>
                        <th>Part B</th>
                        <td><input class="form-control" type="text" name="part_a_marks" title="Write written part B marks" placeholder="Student Part B Marks"></td>
                    </tr>
                    <?php } ?>
                    
                    <tr>
                        <td colspan="2"><button type="submit" name="add" class='btn btn-info' title="Click to proceed" role='button'>Done</button></td>
                    </tr>
                </tbody>
                <?php } ?>
                
                <?php if($admin_type == 'normal'){ ?>
                <tbody>
                    <tr>
                        <th>Picture</th>
                        <td><input class="student_picture" id="student_picture" name="student_picture" title="Picture of a student" type="file" accept="image/*" placeholder="Student Picture"></td>
                    </tr>
                    
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text" name="student_name" title="Write name of a student" placeholder="Student Name"></td>
                    </tr>
                    <tr>
                        <th>Roll</th>
                        <td><input class="form-control" type="text" name="student_id" title="Write student roll" placeholder="Student Roll"></td>
                    </tr>
                    <tr>
                        <th>RFID</th>
                        <td><input class="form-control" type="text" name="student_rfid" title="What is the RFID no." placeholder="Student RFID"></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><input class="form-control" type="email" name="student_email" title="Student E-Mail" placeholder="Student E-mail Test Marks"></td>
                    </tr>
                    <tr>
                        <th>Phone No.</th>
                        <td><input class="form-control" type="text" name="student_phone" title="Student contact no." placeholder="Student Phone No."></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class="form-control" type="text" name="student_address" title="Parmanent address of student" placeholder="Address"></td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td><input class="form-control" type="text" name="student_year" title="Which year that student from!" placeholder="Student Year"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="add" class='btn btn-info' title="Click to proceed..." role='button'>Done</button></td>
                    </tr>
                </tbody>
                <?php } ?>
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