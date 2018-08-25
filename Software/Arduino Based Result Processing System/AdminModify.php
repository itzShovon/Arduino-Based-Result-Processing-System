<?php
    session_start();
    include('Data/PHP/AdminModifyConnect.php');
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
                    <li class="active"><a href="AdminDocument.php">Modify</a></li>
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
        <form name="modify_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <table class="table table-striped">
                <thred>
                    <tr>
                        <th>Sector</th>
                        <th>Data</th>
                    </tr>
                </thred>
                <?php if($admin_type == 'normal'){ ?>
                <tbody>
                    <tr>
                        <th>Picture</th>
                        <td><input class="student_picture" id="student_picture" name="student_picture" type="file" accept="image/*" placeholder="Student Picture"></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text" name="student_name" placeholder="Student Name" value="<?php echo $student_name; ?>"></td>
                    </tr>
                    <tr>
                        <th>Roll</th>
                        <td><?php echo $student_id; ?></td>
                    </tr>
                    <tr>
                        <th>RFID</th>
                        <td><input class="form-control" type="text" name="student_rfid" value="<?php echo $student_rfid; ?>" placeholder="Student RFID"></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><input class="form-control" type="text" name="student_email" placeholder="Student E-mail Test Marks" value="<?php echo $student_email; ?>"></td>
                    </tr>
                    <tr>
                        <th>Phone No.</th>
                        <td><input class="form-control" type="text" name="student_phone" placeholder="Student Phone No." value="<?php echo $student_phone; ?>"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class="form-control" type="text" name="student_address" placeholder="Address" value="<?php echo $student_address; ?>"></td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td><input class="form-control" type="text" name="student_year" placeholder="Student Year" value="<?php echo $student_year; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="modify" class='btn btn-info' role='button'>Modify</button></td>
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