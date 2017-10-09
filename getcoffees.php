<?php
    include("mysql.php");

    /*
     * TODO: put queries in external files and load them dynamically
     * so they can be more easily edited and aren't buried in the code.
     */

    $sql = "SELECT transactions.trans_time, users.user_name, users.user_id
    FROM transactions
    JOIN users ON users.user_id = transactions.user_id_fk
    where users.user_id = " . $_REQUEST['user_id'];

    $result = $db->query($sql);

    echo "<ul>";
    $i = 0;
    
    // get all the coffee records for the user, if there none, $i==0 and
    // no coffee message is displayed.
    while ($ary = mysqli_fetch_assoc($result))
    {
        if($i===0)
        {
            echo "<h4 class=\"user_coffee_list\">".$ary['user_name'] . "'s Coffees</h3>";
        }
        $i .= 1;
        echo "<li>" . $ary['trans_time'] . "</li>";
    }
    if($i===0)
    {
        echo "<h4 class=\"user_coffee_list\">No Coffees Purchased</h3>";
    }
    echo "</ul>";
 
    mysqli_free_result($result);   
?>