<?php


session_start();

    $unique_number = $_SESSION['unique_number'];
    $type = $_SESSION['TYPE'];
    $BoolFarmer = $_SESSION['Farmer_check'];
    $BoolCustomer = $_SESSION['Customer_check'];
    $verifyiid = $_SESSION['verifyid'];

$pword=$_POST['npwd'];
$cpword=$_POST['cpwd'];    

//connection
$con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error"); 

if(($pword == $cpword) And ($BoolFarmer Or $BoolCustomer)){
		if($BoolFarmer){
		$qr="UPDATE farmersignup SET password=SHA('$pword') WHERE uid='$unique_number' AND krishi_id_no='$verifyiid' AND type='$type'";
			mysqli_query($con,$qr)or die("error in farmer update");
        echo '<p><script type="text/javascript"> alert(" farmer Password reset sucessfully");
            location ="http://krishi.rf.gd/farmer/login.html"
            </script></a></p>';

		}
        
		elseif($BoolCustomer){
			$qr="UPDATE customersignup SET password=SHA('$pword') WHERE uid='$unique_number' AND pan_card_no ='$verifyiid' AND type='$type'";
			mysqli_query($con,$qr)or die("error in customer update");
        echo '<p><script type="text/javascript"> alert(" customer Password reset sucessfully");
            location="http://krishi.rf.gd/customer/loginbid.html"
            </script></a></p>';

		}
}
else{
    echo '<p><script type="text/javascript"> alert("password incorrect");
            location="http://krishi.rf.gd/forget/forget.html"
            </script></a></p>';
}
?>