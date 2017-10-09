<html>
    <?php include("header.php"); ?>
    
    <script>
        function profile_changed(str)
        {
            // clear error 
            document.getElementById("error").innerHTML="";

            if (str==="")
            {
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
                if (xmlhttp.readyState===4 && xmlhttp.status===200)
                {
                    // html content is formatted in getcoffees.php, display it from here
                    document.getElementById("coffees_content").innerHTML=xmlhttp.responseText;
                    
                    // update the link to the profiles page with an index so the selected user can be kept
                    var a = document.getElementById("profile_link");
                    a.href = "profiles.php?user_id=" + document.getElementById("profile_index").value;
                    
                    // update the link to the coffees page with an index so the selected user can be kept
                    var a = document.getElementById("coffees_link");
                    a.href = "coffees.php?user_id=" + document.getElementById("profile_index").value;                    
                }
            };
            
             // send request
            xmlhttp.open("GET","getcoffees.php?user_id="+str, true);
            xmlhttp.send();
        }


        function add_coffee()
        {
            // don't insert coffees for the 0 index
            if(document.getElementById("error").value === "0")
                return;
            
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
                    // print the return message in the error box.
                    document.getElementById("error").innerHTML=xmlhttp.responseText;
                }
            };

            xmlhttp.open("PUT","add_coffee.php?user_id="+document.getElementById("profile_index").value, true);
            xmlhttp.send();                
        }            

        /*
        // Need to reupdate the coffee list and user name boxes after load so they 
        // are automatically run for selected user.
        // Need to work on this more.
        document.addEventListener('DOMContentLoaded', function() {
            profile_changed($_REQUEST['user_id']);
        }, false);
        */
    </script>        

    <body>
        <?php
            // add the 
            include("banner.php");
            
            // include mysql functions
            include("mysql.php");

            // include the menu.
            // needs the database connection mysql.php established first
            include("menu.php"); 
        ?>
        
        <div id="coffees_content"></div>
        
        
        <button class="button" id="add_coffee_button" onclick="add_coffee()">Add a Coffee</button>        
        </p>
        <br>
        <div id="error"></div>               
    </body>
</html>



                