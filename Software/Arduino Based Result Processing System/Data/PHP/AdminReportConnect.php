<?php
    include ('config.php');
    try{
        if(($_SESSION['login_flag'] != 1) || (($_SESSION['read_password'] != $_SESSION['admin_password'])) || ($_SESSION['admin_type'] != 'normal'))
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
        $format = $_SESSION['format'];
        
        $statement = $db->prepare("SELECT * FROM course WHERE true");
        $statement->execute();
        $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $statement = $db->prepare("SELECT * FROM student WHERE true");
        $statement->execute();
        $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        if(isset($_POST['print'])){
            if(empty($_POST['student_id']) && empty($_POST['course_code'])){
                $error_message = ("Say something man!");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if((!empty($_POST['student_id'])) && (!empty($_POST['course_code']))){
                $error_message = ("Fill only one of those...");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if((empty($_POST['student_id'])) && (!empty($_POST['course_code']))){
                $course_code = $_POST['course_code'];
                foreach($course_list as $row){
                    if($row->course_code == $course_code){
                        $_SESSION['course_code'] = $_POST['course_code'];
                        $_SESSION['student_id'] = "";
                        $_SESSION['format'] = 'course';
                        echo "
                        <script>
                            window.open('PrintDocument.php');
                            window.location.assign('AdminDocument.php');
                        </script>";
                    }
                }
            }
            else if((!empty($_POST['student_id'])) && (empty($_POST['course_code']))){
                $student_id = $_POST['student_id'];
                foreach($student_list as $row){
                    if($row->student_id == $student_id){
                        $_SESSION['student_id'] = $_POST['student_id'];
                        $_SESSION['course_code'] = "";
                        $_SESSION['format'] = 'student';
                        echo "
                        <script>
                            window.open('PrintDocument.php');
                            window.location.assign('AdminDocument.php');
                        </script>";
                    }
                }
            }
            else{
                $error_message = ("Oh! Something wrong!!!");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
        }
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>