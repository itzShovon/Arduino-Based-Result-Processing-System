<?php
    try{
        session_start();
        $_SESSION['login_flag'] = 0;
        $_SESSION['admin_id'] = "";
        $_SESSION['admin_email'] = "";
        $_SESSION['admin_password'] = "";
        $_SESSION['admin_type'] = "";
        $_SESSION['admin_flag'] = "";
        $_SESSION['admin_part'] = "";
        $_SESSION['course'] = "";

        header ('Location: About.php');
    }catch(Exception $e) {
        $error_message = $e->getMessage();
        echo($error_message);
    }
?>
