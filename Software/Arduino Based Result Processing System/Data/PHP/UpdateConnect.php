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
        $admin_part = $_SESSION['admin_part'];
        $format = $_SESSION['format'];
        
        $statement = $db->prepare("SELECT * FROM course WHERE true");
        $statement->execute();
        $course_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $statement = $db->prepare("SELECT * FROM student WHERE true");
        $statement->execute();
        $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $statement = $db->prepare("SELECT * FROM attendance WHERE active = '1'");
        $statement->execute();
        $attendance_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $tempX = 0;
        foreach($attendance_list as $row){
            if($row->active == '1')
                $tempX =  1;
        }
        
        if(isset($_POST['update'])){
            if(empty($_POST['course_code'])){
                $error_message = ("Say something man!");
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
            else if(!empty($_POST['course_code'])){
                $course_code = $_POST['course_code'];
                foreach($course_list as $row){
                    if($row->course_code == $course_code){
                        $_SESSION['course_code'] = $_POST['course_code'];
                        $course = $_SESSION['course_code'];
                        $_SESSION['student_id'] = "";
                        $_SESSION['format'] = 'course';
                        
                        if($course == 'cse4211'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4211 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4211 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4212'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4212 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4212 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4221'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4221 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4221 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4222'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4222 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4222 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4231'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4231 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4231 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4232'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4232 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4232 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4251'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4251 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4251 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4252'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4252 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4252 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4280'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4280 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4280 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        else if($course == 'cse4292'){
                            foreach($attendance_list as $active){
                                foreach($student_list as $students){
                                    if($students->student_rfid == $active->rfid){
                                        $tempID = $students->student_id;
                                        $tempRFID = $students->student_rfid;
                                        
                                        
                                        $statement = $db->prepare("SELECT student_attaindance FROM cse4292 WHERE student_id = '$tempID'");
                                        $statement->execute();
                                        $cse = $statement->fetchAll(PDO::FETCH_OBJ);
                                        
                                        foreach($cse as $marks){
                                            $tempMarks = $marks->student_attaindance;
                                        }
                                        
                                        $tempMarks = $tempMarks + 1;
                                        
                                        $sql = "UPDATE cse4292 SET student_attaindance=? WHERE student_id=?";
                                        $db->prepare($sql)->execute([$tempMarks, $tempID]);
                                    }
                                }
                            }
                        }
                        $sql = "UPDATE attendance SET active=? WHERE true";
                        $db->prepare($sql)->execute(['0']);
                
                echo "<script type='text/javascript'>alert('Done...');</script>";
                    }
                }
//                echo "<script type='text/javascript'>alert('Operation Ending');</script>";
                
                
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