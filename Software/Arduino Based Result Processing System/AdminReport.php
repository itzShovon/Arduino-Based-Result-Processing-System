<?php
    session_start();
    include('Data/PHP/AdminReportConnect.php');
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
                <a class="navbar-brand" href="#">Report Pattern</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="AdminDocument.php">Dashboard</a></li>
                    <li class="active"><a href="#">Report</a></li>
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
        <h5>Take action as want to print...</h5>
        <h5><b>Use any one...</b></h5>
        <?php if($admin_type == 'normal'){ ?>
        <form name="print_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <input class="form-control" style="width: 20%; margin: 10px 0;" type="text" name="student_id" title="Write student roll." placeholder="Student Roll to Print" list="student_id">
            <datalist id="student_id">
                <?php foreach($student_list as $row){ ?>
                    <?php echo "<option value='$row->student_id'>"; ?>
                <?php } ?>
            </datalist>
            
            <select class="form-control" style="width: 20%; margin: 10px 0; text-transform: uppercase;" type="text" title="Choose course code" name="course_code">
                <option value="">Course Code to View</option>
                <?php foreach($course_list as $row){ ?>
                    <?php echo "<option value='$row->course_code'>$row->course_code</option>"; ?>
                <?php } ?>
            </select>
            
            <button type="submit" name="print" class='btn btn-info' role='button'>Click to Move</button>
        </form>
        <?php } ?>
    </div>
    <div style="height: 20px;"></div>
    
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