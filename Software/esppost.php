<?php
    $RFID = $_POST['humidity'];
    $Write = '<p>RFID : ' . $RFID . '</p>';
    file_put_contents('sensor.html', $Write);

    try{
        include ("29-06-18/Data/PHP/config.php");
        
        $sql = "UPDATE attendance SET active=? WHERE rfid=?";
        $db->prepare($sql)->execute(['1', $RFID]);
        
    }catch(Exception $e) {
        $error_message = $e->getMessage();
        echo($error_message);
    }
?>