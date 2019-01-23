<?php
    include ('config.php');
    try{
        if(($_SESSION['login_flag'] != 1) || ($_SESSION['read_password'] != $_SESSION['admin_password']))
            header('Location: ././AdminSign.php');
        
        $admin_id = $_SESSION['admin_id'];
        $admin_email = $_SESSION['admin_email'];
        $admin_password = $_SESSION['admin_password'];
        $admin_type = $_SESSION['admin_type'];
        $admin_part = $_SESSION['admin_part'];
        $admin_flag = $_SESSION['admin_flag'];
        
        $statement = $db->prepare("SELECT * FROM admin WHERE admin_id = '$admin_id'");
        $statement->execute();
        $admin_info = $statement->fetchAll(PDO::FETCH_OBJ);
        
        foreach($admin_info as $row){
            if($row->admin_password == $admin_password){
                if(isset($_POST['update'])){
                    $old_password = $_POST['old_password'];
                    $new_password = $_POST['new_password'];
                    $temp_password = $_POST['temp_password'];
                    
                    if($old_password == $admin_password){
                        if($new_password == $temp_password){
                            $sql = "UPDATE admin SET admin_password=? WHERE admin_id='$admin_id'";
                            $db->prepare($sql)->execute([$new_password]);
                            
                            $_SESSION['admin_password'] = $new_password;
//                            $_SESSION['read_password'] = $new_password;
                            
                            header('Location: ././AdminDocument.php');
                            
                            echo "<script type='text/javascript'>alert('Operation Complete...');</script>";
                        }
                        else
                            echo "<script type='text/javascript'>alert('Password didn't match...');</script>";
                    }
                    else
                        echo "<script type='text/javascript'>alert('Failure...');</script>";
                }
            }
        }
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>