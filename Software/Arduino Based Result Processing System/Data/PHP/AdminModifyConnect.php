<?php
    include ('config.php');
    try{
        if(($_SESSION['login_flag'] != 1) || ($_SESSION['read_password'] != $_SESSION['admin_password']) || ($_SESSION['admin_type'] != 'normal'))
            header('Location: ././AdminSign.php');
        
        $admin_type = $_SESSION['admin_type'];
        $admin_part = $_SESSION['admin_part'];
        $student_id = $_SESSION['student_id'];
        
        $statement = $db->prepare("SELECT * FROM student WHERE student_id='$student_id'");
        $statement->execute();
        $student_list = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $X = 0;
        foreach($student_list as $row){
            if($row->student_id == $student_id){
                $X = 1;
                
                $student_id = $row->student_id;
                $student_rfid = $row->student_rfid;
                $student_name = $row->student_name;
                $student_picture = $row->student_picture;
                $student_email = $row->student_email;
                $student_phone = $row->student_phone;
                $student_address = $row->student_address;
                $student_flag = $row->student_flag;
                $student_year = $row->student_year;
            }
        }
        if($X == 0)
            header('Location: ././AdminDocument.php');
        
        if(isset($_POST['modify'])){
            $student_rfid = $_POST['student_rfid'];
            $student_name = $_POST['student_name'];
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
            
            $sql = "UPDATE student SET student_rfid=?, student_picture=?, student_name=?, student_email=?, student_phone=?, student_address=?, student_year=? WHERE student_id='$student_id'";
            $db->prepare($sql)->execute([$student_rfid, $student_picture, $student_name, $student_email, $student_phone, $student_address, $student_year]);
            
            $message = "Thanks! modification successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: ././AdminDocument.php');
        }
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>