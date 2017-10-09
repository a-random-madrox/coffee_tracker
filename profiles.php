<html>
    <?php include("header.php"); ?>

    <script>
        function profile_changed(str)
        {
            // clear errors
            document.getElementById("error").innerHTML="";

            // TODO: clear boxes if Select User is picked
            if (str==="" || document.getElementById("profile_index").value === "0")
            {
                document.getElementById("profile_user_name").innerHTML="";
                document.getElementById("profile_full_name").innerHTML="";
                return;
            }

            if (window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
            else
            {   
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState===4 && xmlhttp.status===200)
                {
                    // assign the new values
                    var res = JSON.parse(xmlhttp.responseText);
                    document.getElementById("profile_user_name").value=res['user_name'];
                    document.getElementById("profile_full_name").value=res['full_name'];
                    
                    // update the link to the profiles page with an index so the selected user can be kept
                    var a = document.getElementById("profile_link");
                    a.href = "profiles.php?user_id=" + document.getElementById("profile_index").value;
                    
                    // update the link to the coffees page with an index so the selected user can be kept
                    var a = document.getElementById("coffees_link");
                    a.href = "coffees.php?user_id=" + document.getElementById("profile_index").value;                    
                }
            };

            // send request
            xmlhttp.open("GET","getprofile.php?user_id="+str, true);
            xmlhttp.send();
        }

        function save_user()
        {
            if (window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
            else
            {   
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState===4 && xmlhttp.status===200)
                {                    
                    document.getElementById("error").innerHTML=xmlhttp.responseText;
                }
            };

            xmlhttp.open("PUT","save_user.php?user_id=" + document.getElementById("profile_index").value +
                         "&user_name=" + document.getElementById("profile_user_name").value +
                         "&full_name=" + document.getElementById("profile_full_name").value, 
                         true);
            xmlhttp.send();                
        }
        
        
    </script>         

    <body>
        <?php
            // add the 
            include("banner.php");
            
            // include mysql functions
            include("mysql.php");

            // include the menu.
            // needs the database connection in mysql.php established first
            include("menu.php"); 
            
            echo "<script> profile_changed('3');; </script>";
        ?>
        
    
        <p>
            User Name: 
            <input id="profile_user_name" type="text" name="profile_user_name" value="" />
            Full Name: 
            <input id="profile_full_name" type="text" name="profile_full_name" value="" />    
            <br>
            <button class="button" id="save_user_button" onclick="save_user()">Save</button>        
        </p>
        <br>
        <div id="error"></div>
    </body>
</html>