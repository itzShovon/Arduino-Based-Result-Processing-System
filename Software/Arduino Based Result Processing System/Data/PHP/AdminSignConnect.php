<?php
    try{
        include ("config.php");
        
        if(isset($_POST['admin_signin'])){
            if(empty($_POST['admin_id']) AND empty($_POST['admin_password'])){
                $error_message = ("Give your ID and your password");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if(empty($_POST['admin_id'])){
                $error_message = ("Give your Name");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if(empty($_POST['admin_password'])){
                $error_message = ("Give your Password");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else{
                $admin_id = "";
                $admin_password = "";
                
                if(isset($_POST['admin_id']))
                    $admin_id = $_POST['admin_id'];
                if(isset($_POST['admin_password']))
                    $admin_password = $_POST['admin_password'];
                
                $statement = $db->prepare("SELECT * FROM admin WHERE admin_id = '$admin_id'");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                
                
                if(empty($result))
                    echo "<script type='text/javascript'>alert('Oh ou! User not found!);</script>";
                else
                    foreach($result as $row){
                        if(($admin_password == $row->admin_password) && ($admin_id == $row->admin_id)){
                            $_SESSION['admin_type'] = $row->admin_type;
                            $_SESSION['admin_email'] = $row->admin_email;
                            $_SESSION['admin_flag'] = $row->admin_flag;
                            $_SESSION['course'] = $row->course;
                            $_SESSION['read_password'] = $_POST['admin_password'];
                            $_SESSION['login_flag'] = 1;
                            $_SESSION['format'] = 'course';
                            $_SESSION['admin_part'] = $row->admin_part;
                            
                            if(empty($admin_password)){
                                $_SESSION['admin_id'] = "";
                                $_SESSION['admin_password'] = "";
                            }
                            else{
                                $_SESSION['admin_id'] = $admin_id;
                                $_SESSION['admin_password'] = $admin_password;
                            }
                            
                            header ('Location: ././AdminDocument.php');
                        }
                        else;
                    }
                echo "<script type='text/javascript'>alert('Non User... Try again...');</script>";
            }
        }
        else if(isset($_POST['admin_signup'])){
            if(empty($_POST['admin_id'])){
                $error_message = ("Give your Name");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if(empty($_POST['admin_password'])){
                $error_message = ("Give your Password");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if(empty($_POST['temp_password'])){
                $error_message = ("Rewrite your password man!");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if($_POST['temp_password'] != $_POST['admin_password']){
                $error_message = ("Password didn't match...");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if(empty($_POST['admin_email'])){
                $error_message = ("Give your E-mail");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else{
                $admin_id = "";
                $admin_email = "";
                $admin_password = "";
                $course = "";
                $admin_type = "";
                $admin_flag = "";
                $admin_part = "";
                
                $admin_flag = 1;
                
                if(isset($_POST['admin_id']))
                    $admin_id = $_POST['admin_id'];
                if(isset($_POST['admin_password']))
                    $admin_password = $_POST['admin_password'];
                if(isset($_POST['admin_type']))
                    $admin_type = $_POST['admin_type'];
                if(isset($_POST['admin_email']))
                    $admin_email = $_POST['admin_email'];
                if(isset($_POST['admin_part']))
                    $admin_part = $_POST['admin_part'];
                if(isset($_POST['course']))
                    $course = $_POST['course'];
                
                $statement = $db->prepare("INSERT INTO admin(
                    admin_id,
                    admin_email,
                    admin_password,
                    admin_type,
                    admin_flag,
                    admin_part,
                    course
                )
                VALUES (?,?,?,?,?,?,?)");
                $statement->execute(array(
                    $admin_id,
                    $admin_email,
                    $admin_password,
                    $admin_type,
                    $admin_flag,
                    $admin_part,
                    $course
                ));
                
                $message = "Thanks! information is Saved successfully.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                
                $_SESSION['login_flag'] = 1;
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_email'] = $admin_email;
                $_SESSION['admin_password'] = $admin_password;
                $_SESSION['admin_type'] = $admin_type;
                $_SESSION['admin_flag'] = $admin_flag;
                $_SESSION['admin_part'] = $admin_part;
                $_SESSION['course'] = $course;
                
                header ('Location: ././AdminDocument.php');
            }
        }
    }catch(Exception $e) {
        $error_message = $e->getMessage();
        echo($error_message);
    }
?>
