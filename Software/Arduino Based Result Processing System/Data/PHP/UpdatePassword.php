<?php
    session_start();
    try{
        if(($_SESSION['login_flag'] != 1) || ($_SESSION['read_password'] != $_SESSION['admin_password']))
            header('Location: ../../AdminSign.phpa');
        
        else
            header('Location: ../../AdminUpdatePassword.php');
    }catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>