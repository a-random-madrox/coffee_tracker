<?php
    include("mysql.php");

    if($_REQUEST['user_id'] !== '0')
    {
        $sql = "INSERT INTO transactions(user_id_fk) VALUES('" . $_REQUEST['user_id'] . "')";
        $result = $db->query($sql);
        
        if ($result === TRUE) {
            echo "Coffee Added";
        } else {
            echo "Error adding coffee: " . $db->error;
        }        
    }
    else
    {
        echo "Select a user.";
    }
?>
