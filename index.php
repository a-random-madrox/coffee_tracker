<!DOCTYPE html>
<html>
    <?php include("header.php"); ?>
     
    <script>
        function profile_changed(str)
        {
            if (str==="")
            {
                // if blank, we'll set our innerHTML to be blank.
                document.getElementById("profile_content").innerHTML="";
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

            // on state change
            xmlhttp.onreadystatechange=function()
            {
                // if we get a good response from the webpage, display the output
                if (xmlhttp.readyState===4 && xmlhttp.status===200)
                {
                    var res = JSON.parse(xmlhttp.responseText);
                    document.getElementById("profile_content").innerHTML="User Selected: " + res['user_name'];
                    
                    // update the link to the profiles page with an index so the selected user can be kept
                    var a = document.getElementById("profile_link");
                    a.href = "profiles.php?user_id=" + document.getElementById("profile_index").value;
                    
                    // update the link to the coffees page with an index so the selected user can be kept
                    var a = document.getElementById("coffees_link");
                    a.href = "coffees.php?user_id=" + document.getElementById("profile_index").value;
                }
            };
            // use our XML HTTP Request object to send a get to our content php. 
            xmlhttp.open("GET","getprofile.php?user_id="+str, true);
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
            // needs the database connection for mysql established first
            include("menu.php"); 
        ?>
        
        <div id="profile_content">Select a Profile to Begin</div>
    </body>
</html>
