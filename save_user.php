<?php
    include("mysql.php");
      
    $sql = "UPDATE Users SET user_name='" . $_REQUEST['user_name'] . 
            "', full_name='" . $_REQUEST['full_name'] . 
            "' WHERE user_id='" . $_REQUEST['user_id'] . "'";

    $result = $db->query($sql);
       
    if ($result === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }
?>
