<?php
    include("mysql.php");

    // the user_name based on the user_id
    $sql = "SELECT user_name FROM users WHERE user_id=" . $_REQUEST['user_id'];
    $result = $db->query($sql);

    $data = array();
    while ($row = mysqli_fetch_row($result)){
        $data[] = $row[0];
    } 
?>

