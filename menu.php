<div id ="menu"> 
    <select id="profile_index" name="profile_index" onchange="profile_changed(this.value)" onclick="profile_changed(this.value)">
    <option value="0" name="none">Select User</option>  
    <?php
        $uid = $_REQUEST['user_id'];
        $result = $db->query("SELECT * from Users ORDER BY user_name ASC");
        foreach($result as $name) { 
            if($uid===$name['user_id'])
            {
    ?>
                <option selected value="<?= $name['user_id']?>"><?=$name['user_name']?></option>;
        <?php                  
            }
            else {
        ?>
                <option value="<?= $name['user_id']?>"><?=$name['user_name']?></option>;              
        <?php
            }           
        }
        ?>
    </select>
    
    <!--a id="index_link" href="index.php">Home</a-->
    <a class="menu_link" id="profile_link" href="profiles.php">Profile</a>
    <a class="menu_link" id="coffees_link" href="coffees.php">Coffees</a>    
    <hr>
 </div>