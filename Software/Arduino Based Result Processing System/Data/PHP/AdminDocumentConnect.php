<?php
    include ('config.php');
    try{
        if(($_SESSION['login_flag'] != 1) || (($_SESSION['read_password'] != $_SESSION['admin_password'])))
            header('Location: ././AdminSign.php');
        
        if($_SESSION['course'] == "" || $_SESSION['course'] == "0")
            $_SESSION['course'] = 'cse4211';
        
        $admin_id = $_SESSION['admin_id'];
        $admin_email = $_SESSION['admin_email'];
        $admin_password = $_SESSION['admin_password'];
        $admin_type = $_SESSION['admin_type'];
        $admin_flag = $_SESSION['admin_flag'];
        $course = $_SESSION['course'];
        $admin_part = $_SESSION['admin_part'];
        
        $statement = $db->prepare("SELECT * FROM course WHERE true");
        $statement->execute();
        $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $statement = $db->prepare("SELECT * FROM student WHERE true");
        $statement->execute();
        $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        if(isset($_POST['modify'])){
            foreach($student_list as $row){
                if($row->student_id == $_POST['student_id']){
                    $_SESSION['student_id'] = $row->student_id;
                    header('Location: ././AdminModify.php');
                }
            }
        }
        
        if($admin_type == 'teacher' || $admin_type == 'normal'){
            if(!empty($course)){
                $statement = $db->prepare("SELECT * FROM $course WHERE true");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                
//                if($_SESSION['admin_type'] == 'teacher')
//                    echo "<script type='text/javascript'>alert('You are teacher of course $course...');</script>";
//                else
//                    echo "<script type='text/javascript'>alert('You are normal admin');</script>";
                
                
                if($course == 'cse4211'){
                    $statement = $db->prepare("SELECT * FROM cse4211 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4212'){
                    $statement = $db->prepare("SELECT * FROM cse4212 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4221'){
                    $statement = $db->prepare("SELECT * FROM cse4221 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4222'){
                    $statement = $db->prepare("SELECT * FROM cse4222 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4231'){
                    $statement = $db->prepare("SELECT * FROM cse4231 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4232'){
                    $statement = $db->prepare("SELECT * FROM cse4232 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4251'){
                    $statement = $db->prepare("SELECT * FROM cse4251 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4252'){
                    $statement = $db->prepare("SELECT * FROM cse4252 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4280'){
                    $statement = $db->prepare("SELECT * FROM cse4280 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4292'){
                    $statement = $db->prepare("SELECT * FROM cse4292 WHERE true");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
            }
            else
                echo "<script type='text/javascript'>alert('Idel teacher...');</script>";
        }
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>