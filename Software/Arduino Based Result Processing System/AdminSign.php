<?php
    session_start();
    include('Data/PHP/AdminSignConnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Arduino Based Result Processing System</title>
    <link rel="icon" href="Data/Images/Icon/Sign.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="Data/css/SignStyle.css">
</head>

<body>
    <div class="panel">
        <h2>LOGIN</h2>
        <div class="formset">
            <form name="signin_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <lable class="form-label">ID</lable>
                    <input title="Provide your ID here." class="form-control" name="admin_id" type="text" />
                </div>
                <div class="form-group">
                    <lable class="form-label">Your Password</lable>
                    <input title="Provide your password" class="form-control" name="admin_password" type="password" />
                </div>
                <button title="Click to enter" class="btn" type="submit" name="admin_signin">Log in</button>
            </form>
        </div>
        <form class="register-form" name="signup_form" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype="multipart/form-data"><i class="close">×</i>
            <h2>REGISTER</h2>
            <div class="formset">
                <div class="form-group">
                    <lable class="form-label">ID</lable>
                    <input title="What is your ID?" name="admin_id" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <lable class="form-label">Email</lable>
                    <input title="What is your email?" name="admin_email" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <lable class="form-label">Password</lable>
                    <input title="Need to give password." name="admin_password" class="form-control" type="password" />
                </div>
                <div class="form-group">
                    <lable class="form-label">Repeat Password</lable>
                    <input title="Re-write password." name="temp_password" class="form-control" type="password" />
                </div>
                <div class="form-group">
                    <lable class="form-label">Course</lable>
                    <select name="course" title="If you are a teacher" class="form-control">
                        <option value="0"></option>
                        <option value="cse4211" style="color:black;">CSE4211</option>
                        <option value="cse4212" style="color:black;">CSE4212</option>
                        <option value="cse4221" style="color:black;">CSE4221</option>
                        <option value="cse4222" style="color:black;">CSE4222</option>
                        <option value="cse4231" style="color:black;">CSE4231</option>
                        <option value="cse4232" style="color:black;">CSE4232</option>
                        <option value="cse4251" style="color:black;">CSE4251</option>
                        <option value="cse4252" style="color:black;">CSE4252</option>
                        <option value="cse4280" style="color:black;">CSE4280</option>
                        <option value="cse4292" style="color:black;">CSE4292</option>
                    </select>
                </div>
                <div class="form-group">
                    <lable class="form-label">Type</lable>
                    <select name="admin_type" title="Choose your option" class="form-control">
                        <option value="normal" style="color:black;">Normal</option>
                        <option value="teacher" style="color:black;">Teacher</option>
                    </select>
                </div>
                <div class="form-group">
                    <lable class="form-label">Only for teacher</lable>
                    <select name="admin_part" title="Which part examines!" class="form-control">
                        <option value="a" style="color:black;">Part A</option>
                        <option value="b" style="color:black;">Part B</option>
                    </select>
                </div>
                <button title="Clicking this, you will be new admin!" type="submit" name="admin_signup" class="btn">Register</button>
            </div>
        </form>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="Data/js/SignIndex.js"></script>
</body>

</html>
