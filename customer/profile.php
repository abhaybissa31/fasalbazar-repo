<?php 
include('fn.php');
session_start(); 
if(!isset($_SESSION["unique_id"])){
 sendto("cindexfa.php");
}
else{
$uid = $_SESSION["unique_id"];
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> 
    <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
    <title>Profile page</title>

    <meta name='author' content='Codeconvey' />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap' rel='stylesheet'><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel='stylesheet' href='profile.css'>
</head>
<body>
		
<?php include('incnav.html')?>

<div class='student-profile '>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-4'>
        <div class='card shadow-sm'>
          <div class='card-header bg-transparent text-center'>
<?php


// personal details
$qr="select * from customersignup where uid=$uid";
$rs=mysqli_query($con,$qr);
$row=mysqli_fetch_array($rs);
$phone=$row['phone'];
$img=$row['profile_pic'];
$kid=$row['pan_card_no'];
$addr=$row['address'];
$newkid = "XXXXXX".substr(strip_tags($kid), 6,10);
$name=$row['name'];

// bank details
$qr1="select * from wallet where uid=$uid";
$rs1=mysqli_query($con,$qr1);
$row1=mysqli_fetch_array($rs1);
$account=$row1['account_no'];
$wmt=$row1['Wallet_Amount'];
$ifsc=$row1['ifsc'];
$newacc = "XXXXXXXX".substr(strip_tags($account), 8,12);
if ($wmt=="") {
  $wmt=0;
}


// auctioning items
$qr5="SELECT count(product) from auction where cu_id=$uid";
$res5=mysqli_query($con,$qr5);
$row5=mysqli_fetch_array($res5);
$wb=$row5['count(product)'];

echo" <img class='profile_img' src='$img'>
            <h3>$name</h3>
          </div>
          <div class='card-body'>
            <p class='mb-0'><b>UID:</b> CU$uid</p>
            <p class='mb-0'><b>Phone:</b> $phone</p>
            <p class='mb-0'><b>PAN Card:</b>$newkid</p>
          </div>
        </div>
      </div>
      <div class='col-lg-8' >
        <div class='card shadow-sm' id='card2'>
          <div class='card-header bg-transparent border-0'>
            <h3 class='mb-0'><i class='far fa-clone pr-1'></i>General Information</h3>
          </div><br>
          <div class='card-body pt-0'>
            <table class='table table-bordered table-striped table-hover' id='tb1'>
              <tr>
                <th width='30%'>Wallet Amount</th>
                <td width='2%'>:</td>
                <td>$wmt</td>
              </tr>
              <tr>
                <th width='30%'>Account Number</th>
                <td width='2%'>:</td>
                <td>$newacc</td>
              </tr>
              <tr>
                <th width='30%'>IFSC</th>
                <td width='2%'>:</td>
                <td>$ifsc</td>
              </tr>
              <tr>
                <th width='30%'>Address</th>
                <td width='2%'>:</td>
                <td>$addr</td>
              </tr>
              <tr>
                <th width='30%'>Bids Won</th>
                <td width='2%'>:</td>
                <td>$wb</td>
              </tr>
            </table>
          </div>
        </div>
          
";
?>

	</body>
</html>