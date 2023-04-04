<?php 
session_start();

include('fn.php');
    //session variable
    $unique=$_SESSION['unique_id'];
    $type= $_SESSION['type'];



    //connection start 

      $qr="SELECT * FROM wallet WHERE uid='$unique' AND type='$type'";
      $quer=mysqli_query($con,$qr)or die("error in insertion in wallet");
      $row3=mysqli_fetch_array($quer); 
      $WalletNumber_id = $row3['wallet_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>account details/बैंक खाता विवरण</title>

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
	<link rel="stylesheet" type="text/css" href="BANK.css">
</head>


<body>
	<?php include('incnav.php');?>

      <div class="container"  ><!--Container class-->
<div class="head" ><!--Heading section ending-->

  <hr style="height:2px;border-width:0;color:#189AB4;background-color:#189AB4">
	<h1 class="title" style="color: #05445E; font-weight: bold;" >MY BANK ACCOUNT</h1>
  <hr style="height:2px;border-width:0;color:#189AB4;background-color:#189AB4">  

</div><!--Heading section ending-->


<div class="form1 container" ><!--update details Form Starting-->
  
	<form method="post" action="bank.php">
	<p class="logh2">DETAILS</p>
		<table class="table1"><!--table started-->
	
	<!--Account Number started-->
	<tr>
	<td><label for="Account_number">Bank A/C No:</label><br>
	<input type="text" name="Account_number" id="Account_number" size="30"  placeholder="
बैंक खाता संख्या" required oninvalid="this.setCustomValidity('कृपया अपना बैंक खाता संख्या यहाँ रिक्त स्थान में भरें')"
  oninput="this.setCustomValidity('')"></td>
	</tr><!--Account Number end-->

	<!--IFSC code started-->
	<tr>
	<td><br><label for="ifsc_code">IFSC CODE:</label><br>
	<input type="text" name="ifsc_code" id="ifsc_code" size="30" placeholder="आईएफएससी कोड 11 डिजिट" required oninvalid="this.setCustomValidity('आईएफएससी कोड 11 डिजिट भरना अनिवार्य है')"
  oninput="this.setCustomValidity('')"></td>
  </tr>
  <!--IFSC CODE ended-->   
</table>
<!-- table ending -->
   <b><input type="submit" name="Update_info" value="Update" id="submit" class="sb" style="font-size:16px;border-radius: 6px;"></b><br>
   	
  
  </form>

</div><!--update details Form Ending-->
</div><!--Container class end-->

</body>
</html>

<?php


if(isset($_POST['Update_info'])){
	$account_number=$_POST['Account_number'];
 $ifsc_code =$_POST['ifsc_code'];
 $WalletNumber_id = $_SESSION['wallet_id'];

$qr="UPDATE wallet SET account_no='$account_number',ifsc='$ifsc_code' WHERE wallet_id='$WalletNumber_id'";

	mysqli_query($con,$qr)or die("error in update");

	    echo '<p><script type="text/javascript">
          location="http://krishi.rf.gd/payment/wallet.php?type=$typ"
          </script></p>';
}
?>