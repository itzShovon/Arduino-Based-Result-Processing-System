<?php
    session_start();
    try{
        if(($_SESSION['login_flag'] != 1) || ($_SESSION['read_password'] != $_SESSION['admin_password']))
            header('Location: ../../AdminSign.php');
        
        else{
            $student_id = "";
            $student_id = htmlspecialchars($_GET["id"]);
            if(($student_id == "") || ($student_id == "0"))
                echo "<script type='text/javascript'>alert('Oh ou! System failed, course not founded...');</script>";
            else{
                $_SESSION['student_id'] = $student_id;
                header('Location: ../../AdminUpdate.php');
            }
        }
    }catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>