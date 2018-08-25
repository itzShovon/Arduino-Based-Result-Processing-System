<?php
    session_start();
    include('Data/PHP/AdminUpdatePasswordConnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Arduino Based Result Processing System</title>
    <link rel="stylesheet" href="Data/CSS/bootstrap.min.css">
    <link rel="icon" href="Data/Images/Icon/UpdatePassword.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="Data/CSS/PasswordUpdateStyle.css">
</head>

<body>
    <div class="container">
        <form name="update_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <div class='text'>
                <h1>Modify</h1>
                <p>Migrate to your new password</p>
            </div>
            <div class='container-form'>
                <p>Old Password</p>
                <input type="password" name="old_password" title="Older password. Which one is still using." placeholder='Old Password' />
                <p>New Password</p>
                <input type="password" name="new_password" title="What you want to write as password?" placeholder='New Password' />
                <p>Rewrite Password</p>
                <input type="password" name="temp_password" title="Yeah, write new password again." placeholder='Rewrite Password' />
            </div>
            <input type="submit" class="h5" title="Click to proceed..." value='Fix It' name="update" />
            <a type="submit" title="Turn back." style="padding: 10px 44.5%; text-decoration: none; margin: 2px auto;" href="AdminDocument.php">Back</a>
        </form>
        <aside></aside>
    </div>
</body>

</html>