<?php
$un=$_POST['uid'];
$pw=$_POST['pwd'];
session_start();

$User_id = "AD35280";
$PaSS = "Fasalbazar12";


	if (($un == $User_id) And ($pw == $PaSS)){
    

  $_SESSION['unique_idD'] = $User_id;                  //unique id number
  $_SESSION['typeD'] = $PaSS; 
 
   echo '<p><script type="text/javascript"> alert("You have been logged in successfully");
        location="admin.php"
         </script>in</a>.</p>'; 	
}
 else
{  
	echo '<p><script type="text/javascript"> alert("Password or username is wrong");
     location="http://krishi.rf.gd/admin/Admin_login.html" 
          </script></a></p>';
        

}

?>