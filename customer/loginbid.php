<?php
$un=$_POST['uid'];
$pw=$_POST['pwd'];
include('fn.php');

$Customertype = substr(strtoupper($un),0,2);
$Cunique = substr($un,2);

$con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error in connection");

$qr="SELECT uid, password FROM customersignup WHERE uid='$Cunique' and password=SHA('$pw')";

	$quer=mysqli_query($con,$qr)or die("error in insertion");
	//echo $quer."query result";
	$count=mysqli_num_rows($quer);

	if (($count) And ($Customertype == "CU")){
		// session code start here  
  
  session_start();
	$qrcheck="SELECT * FROM customersignup WHERE uid='$Cunique' and password=SHA('$pw')";
	$quercheck=mysqli_query($con,$qrcheck)or die("error in insertion in Customer session login page");
  $rowcheck=mysqli_fetch_array($quercheck);

  $_SESSION['unique_id'] = $rowcheck['uid'];                  //unique id number
  $_SESSION['type'] = $rowcheck['type'];                      // type { FA / CU }

 
   echo '<p><script type="text/javascript"> alert("You have been logged in successfully");
        location="cindexfa.php"
         </script>in</a>.</p>'; 	
}
 else
{  
	echo '<p><script type="text/javascript"> alert("Password or username is wrong");
          </script></a></p>';
          header('loginbid.php');

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer-Login</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 


 <link rel="preconnect" href="https://fonts.gstatic.com">


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="loginbid.css">
</head>


<body>
      <div class="container"><!--Container class-->
<div class="head"><!--Heading section ending-->

  <hr>
	<h1 class="title">FASAL BAZAR</h1>
  <hr>  

</div><!--Heading section ending-->


<div class="form1 container"><!--login-up Form Starting-->
   
	<form method="post" action="loginbid.php">
	<p class="logh2">Customer Login</p>
		<table class="table1"><!--table started-->
	<!--username started-->
	<tr>
	<td><label for="uid">Login ID</label><br>
	<input type="text" name="uid" id="uid" size="30"  placeholder="यूनिक आईडी / मोबाइल नंबर" required></td>
	</tr><!--username end-->

	<!--password started-->
	<tr>
	<td><br><label for="pwd">Password</label><br>
	<input type="Password" name="pwd" id="pwd" size="30" placeholder="पासवर्ड" required></td>
  </tr>
  <!--password ended-->   
</table>
<!-- table ending -->
<a href="http://krishi.rf.gd/forget/forget.html" class="hre1">Forget Password?</a><br>
   <b><input type="submit" name="submit" value="Log in" id="submit" class="sb" style="font-size:16px;border-radius: 6px;"></b><br>
   	
  
  </form>

</div><!--login up Form Ending-->
<a href="http://krishi.rf.gd/customer/biden.html" class="hre2">Create your account here?</a>
</div><!--Container class end-->

</body>
</html>