<?php
    include ('config.php');
    try{
        if(($_SESSION['login_flag'] != 1) || (($_SESSION['read_password'] != $_SESSION['admin_password'])) || ($_SESSION['admin_type'] != 'normal'))
            header('Location: ././AdminSign.php');
        
        $admin_id = $_SESSION['admin_id'];
        $admin_email = $_SESSION['admin_email'];
        $admin_password = $_SESSION['admin_password'];
        $admin_type = $_SESSION['admin_type'];
        $admin_flag = $_SESSION['admin_flag'];
        $course = $_SESSION['course'];
        $format = $_SESSION['format'];
        $admin_part = $_SESSION['admin_part'];
        
        if($format == 'course'){
            $course = $_SESSION['course_code'];

            
            $statement = $db->prepare("SELECT * FROM course WHERE course_code = '$course'  ORDER BY course_code ASC");
            $statement->execute();
            $title = $statement->fetchAll(PDO::FETCH_OBJ);
            
            foreach($title as $row)
                $course_title = $row->course_title;
            
            $statement = $db->prepare("SELECT * FROM student WHERE true ORDER BY student_id ASC");
            $statement->execute();
            $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
            
            
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
            
            foreach($cse as $row1){
                foreach($student_list as $row2){
                    if($row1->student_id == $row2->student_id){
                        $student_id = $row2->student_id;
                    }
                }
            }
        }
        else if($format == 'student'){
            $student_id = $_SESSION['student_id'];
            
            $statement = $db->prepare("SELECT * FROM student WHERE student_id = '$student_id'");
            $statement->execute();
            $title = $statement->fetchAll(PDO::FETCH_OBJ);
            
            foreach($title as $row)
                $student_name = $row->student_name;
            
            
            $statement = $db->prepare("SELECT * FROM course WHERE true ORDER BY course_code ASC");
            $statement->execute();
            $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
            


            $statement = $db->prepare("SELECT * FROM cse4211 WHERE true");
            $statement->execute();
            $cse4211 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4212 WHERE true");
            $statement->execute();
            $cse4212 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4221 WHERE true");
            $statement->execute();
            $cse4221 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4222 WHERE true");
            $statement->execute();
            $cse4222 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4231 WHERE true");
            $statement->execute();
            $cse4231 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4232 WHERE true");
            $statement->execute();
            $cse4232 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4251 WHERE true");
            $statement->execute();
            $cse4251 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4252 WHERE true");
            $statement->execute();
            $cse4252 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4280 WHERE true");
            $statement->execute();
            $cse4280 = $statement->fetchAll(PDO::FETCH_OBJ);


            $statement = $db->prepare("SELECT * FROM cse4292 WHERE true");
            $statement->execute();
            $cse4292 = $statement->fetchAll(PDO::FETCH_OBJ);


        }
        
        $statement = $db->prepare("SELECT * FROM course WHERE true ORDER BY course_code ASC");
        $statement->execute();
        $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $statement = $db->prepare("SELECT * FROM student WHERE true");
        $statement->execute();
        $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>