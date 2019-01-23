<?php
    include ('config.php');
    try{
        if(($_SESSION['login_flag'] != 1) || ($_SESSION['read_password'] != $_SESSION['admin_password']))
            header('Location: ././AdminSign.php');
        
        $admin_id = $_SESSION['admin_id'];
        $admin_email = $_SESSION['admin_email'];
        $admin_password = $_SESSION['admin_password'];
        $admin_type = $_SESSION['admin_type'];
        $admin_flag = $_SESSION['admin_flag'];
        $admin_part = $_SESSION['admin_part'];
        
        $course = $_SESSION['course'];
        $student_id = $_SESSION['student_id'];
        
        $statement = $db->prepare("SELECT * FROM course WHERE course_code = '$course'");
        $statement->execute();
        $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $statement = $db->prepare("SELECT * FROM student WHERE student_id = '$student_id'");
        $statement->execute();
        $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        if($admin_type == 'teacher' || $admin_type == 'normal'){
            if(!empty($course)){
//                $statement = $db->prepare("SELECT * FROM $course WHERE student_id = '$student_id'");
//                $statement->execute();
//                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                
//                if($_SESSION['admin_type'] == 'teacher')
//                    echo "<script type='text/javascript'>alert('You are teacher of course $course...');</script>";
//                else
//                    echo "<script type='text/javascript'>alert('You are normal admin');</script>";
                
                
                if($course == 'cse4211'){
                    $statement = $db->prepare("SELECT * FROM cse4211 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4212'){
                    $statement = $db->prepare("SELECT * FROM cse4212 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4221'){
                    $statement = $db->prepare("SELECT * FROM cse4221 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4222'){
                    $statement = $db->prepare("SELECT * FROM cse4222 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4231'){
                    $statement = $db->prepare("SELECT * FROM cse4231 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4232'){
                    $statement = $db->prepare("SELECT * FROM cse4232 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4251'){
                    $statement = $db->prepare("SELECT * FROM cse4251 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4252'){
                    $statement = $db->prepare("SELECT * FROM cse4252 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4280'){
                    $statement = $db->prepare("SELECT * FROM cse4280 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
                else if($course == 'cse4292'){
                    $statement = $db->prepare("SELECT * FROM cse4292 WHERE student_id = '$student_id'");
                    $statement->execute();
                    $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                }
            }
            else
                echo "<script type='text/javascript'>alert('Idel teacher...');</script>";
            
            foreach($student_list as $row){
                if($student_id == $row->student_id){
                    $student_name = $row->student_name;
                    $student_id = $row->student_id;
                    $student_picture = $row->student_picture;
                    $student_rfid = $row->student_rfid;
                    $temp_rfid = $row->student_rfid;
                    $student_email = $row->student_email;
                    $student_phone = $row->student_phone;
                    $student_address = $row->student_address;
                    $student_year = $row->student_year;
                }
            }
            foreach($cse as $row){
                if($student_id == $row->student_id){
                    $student_attaindance = $row->student_attaindance;
                    $class_test_marks = $row->class_test_marks;
                    $part_a_marks = $row->part_a_marks;
                    $part_b_marks = $row->part_b_marks;
                    $student_year = $row->student_year;
                }
            }
        }
        
        if(isset($_POST['update'])){
            if($admin_type == 'normal'){
                $student_rfid = $_POST['student_rfid'];
                $student_email = $_POST['student_email'];
                $student_phone = $_POST['student_phone'];
                $student_address = $_POST['student_address'];
                $student_year = $_POST['student_year'];
                if($_FILES['student_picture']['size'] > 0){
                    $info = pathinfo($_FILES['student_picture']['name']);
                    $ext = $info['extension']; // get the extension of the file
                    $newname = "$student_id" . ".".$ext; 

                    $target = 'Data/Images/Store/'.$newname;
                    move_uploaded_file( $_FILES['student_picture']['tmp_name'], $target);
                    
                    $student_picture = $newname;
                }else{
                    $student_picture = $student_picture;
                }
                
                $_SESSION['student_rfid'] = $student_rfid;
                $_SESSION['student_email'] = $student_email;
                $_SESSION['student_phone'] = $student_phone;
                $_SESSION['student_address'] = $student_address;
                $_SESSION['student_year'] = $student_year;
                
                $sql = "UPDATE student SET student_rfid=?, student_picture=?, student_email=?, student_phone=?, student_address=?, student_year=? WHERE student_id='$student_id'";
                $db->prepare($sql)->execute([$student_rfid, $student_picture, $student_email, $student_phone, $student_address, $student_year]);
                
                
                $sql = "UPDATE attendance SET rfid=?, active=? WHERE rfid='$temp_rfid'";
                $db->prepare($sql)->execute([$student_rfid, '0']);
                
                header('Location: ./AdminDocument.php');
                echo "<script type='text/javascript'>alert('Update Sucessful');</script>";
            }
            if($admin_type == 'teacher'){
                if($admin_part == 'a'){
//                    $student_attaindance = $_POST['student_attaindance'];
//                    $written_marks = $_POST['written_marks'];
                    $class_test_marks = $_POST['class_test_marks'];
                    $student_year = $_POST['student_year'];
                    $part_a_marks = $_POST['part_a_marks'];
                    
                    $_SESSION['class_test_marks'] = $class_test_marks;
                    $_SESSION['part_a_marks'] = $part_a_marks;
                    $_SESSION['student_year'] = $student_year;
                }
                else if($admin_part == 'b'){
                    $part_b_marks = $_POST['part_b_marks'];
                    
                    $_SESSION['part_b_marks'] = $part_b_marks;
                }
            
                if($course == "cse4211"){
                    $sql = "UPDATE cse4211 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4212"){
                    $sql = "UPDATE cse4212 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4222"){
                    $sql = "UPDATE cse4222 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4231"){
                    $sql = "UPDATE cse4231 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4232"){
                    $sql = "UPDATE cse4232 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4251"){
                    $sql = "UPDATE cse4251 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4252"){
                    $sql = "UPDATE cse4252 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4280"){
                    $sql = "UPDATE cse4280 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                else if($course == "cse4292"){
                    $sql = "UPDATE cse4292 SET student_attaindance=?, class_test_marks=?, part_a_marks=?, part_b_marks=?, student_year=? WHERE student_id='$student_id'";
                    $db->prepare($sql)->execute([$student_attaindance, $class_test_marks, $part_a_marks, $part_b_marks, $student_year]);
                }
                
                
                header('Location: ./AdminDocument.php');
                echo "<script type='text/javascript'>alert('Update Sucessful');</script>";
            }
        }
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>