<?php 
session_start();

include('fn.php');
    //session variable

    $unique=$_SESSION['unique_id'];
    $type= $_SESSION['type'];

if(!isset($_SESSION["unique_id"])){
msg("Please Login in order to continue");
sendto("http://krishi.rf.gd");
}

    //connection start 
//connection start
$con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error in connection");

      $qr="SELECT * FROM wallet WHERE uid='$unique' AND type='$type'";
      $quer=mysqli_query($con,$qr)or die("error in insertion in wallet");
      $row3=mysqli_fetch_array($quer); 
      $WalletNumber_id = $row3['wallet_id'];
?>

<!-- wallet history.html page start here  -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wallet_Transaction</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

 <link rel="preconnect" href="https://fonts.gstatic.com">


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="History.css">
</head>
<body>

     <?php include('incnav.php');?>

<div class="container"><!--FirstContainer class-->

  <div class="head"><!--Heading section ending-->
    <hr style="height:2px;border-width:0;color:#189AB4;background-color:#189AB4">
    <h1 class="title" style="color: #05445E; font-weight: bold;"><b>Transaction History</h1>
    <hr style="height:2px;border-width:0;color:#189AB4;background-color:#189AB4">
  </div><!--Heading section ending-->

  <!-- Table starting -->
  <table class='table table-hover table-bordered bg-light'>
  <thead class='bg-dark text-white'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Transaction ID</th>
      <th scope='col'>Date</th>
      <th scope='col'>Time</th>
      <th scope='col'>Amount</th>
      <th scope='col'>Transaction Details</th>
      <th scope='col'>Transaction Amount</th>
      <th scope='col'>Total Amount</th>
    </tr>
  </thead>
    
     <?php
      
      // Fetching the number data to show in table
  $qr1="SELECT * FROM Wallet_tt WHERE uid='$unique' AND type='$type' And wallet_id='$WalletNumber_id' ORDER BY `Wallet_tt`.`Transaction_date` DESC"; 
    $res1=mysqli_query($con,$qr1);
    $count1=mysqli_num_rows($res1);
       $j = 0;
      
      for ($i=0; $i <$count1 ; $i++){
      $row=mysqli_fetch_array($res1);
      $tid= $row['Transaction_Number'];
      $tdate = substr($row['Transaction_date'],0,10);
      $ttime = substr($row['Transaction_date'],10,9);
      $total = $row['Total_Amount'];
      $taction = $row['Transaction_Action'];
      $tamount = $row['Transaction_Amount'];
      $sign = $row['Sign'];
      if($sign == "+"){
        $rupee = $total + $tamount;
        $temp = "To";
      }
      else{
        $rupee = $total - $tamount;
        $temp = "From";
      }
     
      $j = $j +1;
      
          echo"<tr class='abcde'>
        <th scope='row'>$j</th>
        <td>$tid</td>
        <td>$tdate</td>
        <td>$ttime</td>
         <td>₹$total</td>
        <td><b>$taction</b> $temp Wallet.</td>
        <td>$sign ₹$tamount</td>
        <td>₹$rupee</td>
        ";
      }
?>


</table>
</div><!--FirstContainer class end-->
</body>
</html>
<!-- wallet history.html page end here --> 