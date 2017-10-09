<?php
    include("mysql.php");
    
    $sql = "SELECT user_name, full_name FROM users WHERE user_id=" . $_REQUEST['user_id'];
    $result = $db->query($sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)){
        $data = array( "user_name" => $row['user_name'], "full_name" => $row['full_name']);
        echo json_encode( $data ); 
    }

    mysqli_free_result($result);
?>

