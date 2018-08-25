<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arduino Based Result Processing System</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" href="Data/Images/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="iData/Images/mg/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="Data/Images/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="Data/Images/img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="Data/CSS/bootstrap.min%20(2).css">
    <link rel="stylesheet" type="text/css" href="Data/Fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="Data/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="Data/CSS/prettyPhoto.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="Data/JS/modernizr.custom.js"></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse bg-primary">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class='navbar-brand' href='#' title='System and developers about'>About All</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="AdminDocument.php" title="Move to Dashboard">DashBoard</a></li>
                    <li class="active"><a href="About.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($_SESSION['login_flag'] == 1){
                    ?>
                    <li><a href="Data/PHP/SignOut.php" title="Click to sign out"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
                    <?php
                    }else{
                    ?>
                    <li><a href="AdminSign.php" title="Click to sign in"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                    <?php } ?>
                    <li><a href="Data/PHP/UpdatePassword.php" title="Click to change password"><span class="glyphicon glyphicon-wrench"></span> Change Password</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header id="header">
        <div class="intro text-center">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="intro-text">
                            <h1>Welcome to <span class="brand">Arduino Based Result Processing System</span></h1>
                            <p>Makes easier result processing and attendance system with help of Arduino...</p>
                            <a href="#services" class="btn btn-default btn-lg page-scroll">Learn More</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Services Section -->
    <div id="services" class="text-center">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title">
                <h2>Services</h2>
                <p>Main focus is to evolve current result processing system, with help of Arduino.</p>
                <p>To take the attendance in smart way. And to removes steps like, further attendance and resul processin.</p>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-3"> <i class="fa fa-desktop"></i>
                    <h4>Attendance</h4>
                    <p>Every student will have there unique RFID card, which will allow them to consider as present in class.</p>
                </div>
                <div class="col-xs-6 col-md-3"> <i class="fa fa-gears"></i>
                    <h4>As Teachers</h4>
                    <p>Each and every course teacher will have there own account, which will help them to add and modify students marks</p>
                </div>
                <div class="col-xs-6 col-md-3"> <i class="fa fa-rocket"></i>
                    <h4>Office</h4>
                    <p>Office defined admin will have to right to generate students all informations like RFID no. Roll, Name etc.</p>
                </div>
                <div class="col-xs-6 col-md-3"> <i class="fa fa-line-chart"></i>
                    <h4>Low Cost</h4>
                    <p>All this will be solved with a very low cost and fun...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title text-center">
                <h2>About It</h2>
                <p>How to use, maintain and get outcome from it.</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6"> <img src="Data/Images/img/about.jpeg" class="img-responsive" alt=""> </div>
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h4>Students</h4>
                        <p>Students only have to show there RFID card to system, as for every course attendance. Thats all...</p>
                        <h4>Teachers</h4>
                        <p>After exam, marks should be updated as each students. Or can be modify students activity as teacher wants. No need to worry about attendance.</p>
                        <h4>Office</h4>
                        <p>Office no needs to put extra effort for generating report card of students. All is done and automated.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Section -->
    <div id="portfolio">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title text-center">
                <h2>Meet The Team</h2>
                <p>As for developing, I'm as the developer. And using PHP for backend.</p>
            </div>
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".dev">Developer</a></li>
<!--                            <li><a href="#" data-filter=".sup">Supervisor</a></li>-->
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="portfolio-items">
                    <div class="col-sm-6 col-md-6 col-lg-4 dev">
                        <div class="portfolio-item">
                            <div class="hover-bg">
                                <a href="Data/Images/img/portfolio/01-large.jpg" title="Project description" rel="prettyPhoto">
                                    <div class="hover-text">
                                        <h4>Md. Zahidul Islam</h4>
                                        <small>ID: 14095417</small>
                                        <small><br>CSE, RU</small>
                                    </div>
                                    <img src="Data/Images/img/portfolio/01-small.jpg" class="img-responsive" alt="Shovon"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section -->
    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 section-title">
                    <h2>Get In Touch</h2>
                    <p>Want to contact or need further help, please feel free to contact.</p>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div id="success"></div>
                        <button type="submit" class="btn btn-default">Send Message</button>
                    </form>
                    <div class="social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="container text-center">
            <div class="fnav">
                <p>Copyright &copy; 2018 CSE, RU. Designed by <a href="#" rel="nofollow">Shovon</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="Data/JS/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="Data/JS/bootstrap.js"></script>
    <script type="text/javascript" src="Data/JS/SmoothScroll.js"></script>
    <script type="text/javascript" src="Data/JS/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="Data/JS/jquery.isotope.js"></script>
    <script type="text/javascript" src="Data/JS/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="Data/JS/contact_me.js"></script>
    <script type="text/javascript" src="Data/JS/main.js"></script>
</body>

</html>