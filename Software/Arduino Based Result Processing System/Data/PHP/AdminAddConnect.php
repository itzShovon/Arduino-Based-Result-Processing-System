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
        
        $statement = $db->prepare("SELECT * FROM course WHERE course_code='$course' ORDER BY course_code ASC");
        $statement->execute();
        $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        foreach($course_list as $row){
            if($row->course_code == $course)
                $course_title = $row->course_title;
        }
        
        if($admin_type == 'teacher'){
            if(isset($_POST['add'])){
                $X = 1;
                if(empty($_POST['student_id'])){
                    $error_message = ("Give student roll");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                    $X = 0;
                }
                else if($admin_part == 'a'){
                    if(empty($_POST['class_test_marks'])){
                        $error_message = ("Give student class test marks");
                        echo "<script type='text/javascript'>alert('$error_message');</script>";
                        $X = 0;
                    }
                    else if(empty($_POST['part_a_marks'])){
                        $error_message = ("Give student sector a marks");
                        echo "<script type='text/javascript'>alert('$error_message');</script>";
                        $X = 0;
                    }
                    else if(empty($_POST['student_year'])){
                        $error_message = ("Give student year");
                        echo "<script type='text/javascript'>alert('$error_message');</script>";
                        $X = 0;
                    }
                }
                else if($admin_part == 'b'){
                    if(empty($_POST['part_b_marks'])){
                        $error_message = ("Give student sector b marks");
                        echo "<script type='text/javascript'>alert('$error_message');</script>";
                        $X = 0;
                    }
                }
                if($X == '1'){
                    if(isset($_POST['student_id']))
                        $student_id = $_POST['student_id'];
                    if($admin_part == 'b'){
                        if(isset($_POST['part_b_marks']))
                            $part_b_marks = $_POST['part_b_marks'];
                    }
                    else if($admin_part == 'a'){
                        if(isset($_POST['class_test_marks']))
                            $class_test_marks = $_POST['class_test_marks'];
                        if(isset($_POST['part_a_marks']))
                            $part_a_marks = $_POST['part_a_marks'];
                        if(isset($_POST['student_year']))
                            $student_year = $_POST['student_year'];
                    }
                    
                    $student_flag = 1;
                    
                    if($admin_part == 'a'){
                        if($course == "cse4211"){
                            $statement = $db->prepare("INSERT INTO cse4211(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4212"){
                            $statement = $db->prepare("INSERT INTO cse4212(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4221"){
                            $statement = $db->prepare("INSERT INTO cse4221(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4222"){
                            $statement = $db->prepare("INSERT INTO cse4222(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4231"){
                            $statement = $db->prepare("INSERT INTO cse4231(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4232"){
                            $statement = $db->prepare("INSERT INTO cse4232(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4251"){
                            $statement = $db->prepare("INSERT INTO cse4251(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4252"){
                            $statement = $db->prepare("INSERT INTO cse4252(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4280"){
                            $statement = $db->prepare("INSERT INTO cse4280(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4292"){
                            $statement = $db->prepare("INSERT INTO cse4292(
                                student_id,
                                class_test_marks,
                                part_a_marks,
                                student_flag,
                                student_year
                            )
                            VALUES (?,?,?,?,?)");
                            $statement->execute(array(
                                $student_id,
                                $class_test_marks,
                                $part_a_marks,
                                $student_flag,
                                $student_year
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
                    if($admin_part == 'b'){
                        if($course == "cse4211"){
                            $statement = $db->prepare("INSERT INTO cse4211(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4212"){
                            $statement = $db->prepare("INSERT INTO cse4212(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4221"){
                            $statement = $db->prepare("INSERT INTO cse4221(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4222"){
                            $statement = $db->prepare("INSERT INTO cse4222(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4231"){
                            $statement = $db->prepare("INSERT INTO cse4231(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4232"){
                            $statement = $db->prepare("INSERT INTO cse4232(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4251"){
                            $statement = $db->prepare("INSERT INTO cse4251(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));
                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4252"){
                            $statement = $db->prepare("INSERT INTO cse4252(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4280"){
                            $statement = $db->prepare("INSERT INTO cse4280(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else if($course == "cse4292"){
                            $statement = $db->prepare("INSERT INTO cse4292(
                                part_b_marks
                            )
                            VALUES (?)");
                            $statement->execute(array(
                                $part_b_marks
                            ));

                            header('Location: ./AdminDocument.php');
                            $message = "Thanks! information is Saved successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
                }
            }
        }
        else if($admin_type == 'normal'){
            if(isset($_POST['add'])){
                if(empty($_POST['student_id'])){
                    $error_message = ("Give student roll");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if($_FILES['student_picture']['size'] < 1){
                    $error_message = ("Give student picture");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if(empty($_POST['student_rfid'])){
                    $error_message = ("Give student RFID No.");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if(empty($_POST['student_name'])){
                    $error_message = ("Give Student Name");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if(empty($_POST['student_email'])){
                    $error_message = ("Give student email");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if(empty($_POST['student_phone'])){
                    $error_message = ("Give student phone");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if(empty($_POST['student_address'])){
                    $error_message = ("Give student address");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else if(empty($_POST['student_year'])){
                    $error_message = ("Give student year");
                    echo "<script type='text/javascript'>alert('$error_message');</script>";
                }
                else{
                    if(isset($_POST['student_id']))
                        $student_id = $_POST['student_id'];
                    if(isset($_POST['student_picture']))
                        $student_picture = ($_FILES['student_picture']['name']);
                    if(isset($_POST['student_rfid']))
                        $student_rfid = $_POST['student_rfid'];
                    if(isset($_POST['student_name']))
                        $student_name = $_POST['student_name'];
                    if(isset($_POST['student_email']))
                        $student_email = $_POST['student_email'];
                    if(isset($_POST['student_phone']))
                        $student_phone = $_POST['student_phone'];
                    if(isset($_POST['student_address']))
                        $student_address = $_POST['student_address'];
                    if(isset($_POST['student_year']))
                        $student_year = $_POST['student_year'];
                    $student_flag = '1';
                    
                    $info = pathinfo($_FILES['student_picture']['name']);
                    $ext = $info['extension']; // get the extension of the file
                    $newname = "$student_id" . ".".$ext; 

                    $target = 'Data/Images/Store/'.$newname;
                    move_uploaded_file( $_FILES['student_picture']['tmp_name'], $target);
                    
                    $student_picture = $newname;
                    
                    $statement = $db->prepare("INSERT INTO student(
                        student_picture,
                        student_id,
                        student_rfid,
                        student_name,
                        student_email,
                        student_phone,
                        student_address,
                        student_flag,
                        student_year
                    )
                    VALUES (?,?,?,?,?,?,?,?,?)");
                    $statement->execute(array(
                        $student_picture,
                        $student_id,
                        $student_rfid,
                        $student_name,
                        $student_email,
                        $student_phone,
                        $student_address,
                        $student_flag,
                        $student_year
                    ));

                    $statement = $db->prepare("INSERT INTO attendance(
                        rfid,
                        active
                    )
                    VALUES (?,?)");
                    $statement->execute(array(
                        $student_rfid,
                        '0'
                    ));

                    $message = "Thanks! information is Saved successfully.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header('Location: ./AdminDocument.php');
                }
            }
        }
        else
            header('Location: ././AdminSign.php');
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>