<!-- jai ho hanuman ji maharaj -->
<?php
session_start();
  include('fn.php');
if(!isset($_SESSION["unique_idD"])){
msg("Please Login in order to continue");
sendto("Admin_login.html");
}

?>
<!DOCTYPE html>

<html>

<head>

	<meta charset='utf-8'>

	<meta name='viewport' content='width=device-width, initial-scale=1'>

	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>

  	<script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>

  	<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>

  	<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>

  	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  	<link rel='stylesheet' type='text/css' href='admin.css'>

	<title>Admin</title>

</head>

<body class='bg-secondary'>
<nav class='navbar navbar-expand-sm bg-dark navbar-dark fixed-top navbar-brand-center'>



  	<h1 class='navbar-brand mx-auto' style='font-size:1.6em'>FASAL BAZAR<small class='text-muted h3'> Admin</small></h1>

  <ul class='navbar-nav' id='bottomul'>

  	<li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/admin/Admin_payment.php'>Payment Transactions</a> </li>

  	<li class='nav-item'> <a class='nav-link' href='/logout.php'>Logout</a> </li>
   

  </ul>

</nav>




<div class='container'>

<!-- table starting -->

<?php

echo"


<table class='table table-striped table-hover bg-light table-bordered'>

  <thead class='bg-dark text-white'>

    <tr>

      <th scope='col'>#</th>

      <th scope='col'>Auction Id Number</th>

      <th scope='col'>product</th>

      <th scope='col'>CUid</th>

      <th scope='col'>CU Name</th>

      <th scope='col'>Payment Amount</th>

      <th scope='col' id='fa'>FAid</th>

      <th scope='col'>FA Name</th>

      <th scope='col'>product Delivered?</th>

      <th scope='col' id='act'>Pay To User</th>

    </tr>

  </thead>";






  $quer="select * from Ap_history where paid='No'";

  $res=mysqli_query($con,$quer)or die("error in insertion");

  $count=mysqli_num_rows($res);
  $j=0;

  for ($i=0; $i<$count; $i++)

  {
        
          $j++;
          $row=mysqli_fetch_array($res);
           

          $Auction_number = $row['auction_id'];

          $qr="select * from auction where auction_id ='$Auction_number'";
          $re=mysqli_query($con,$qr);
          $rw=mysqli_fetch_array($re);
          
          $product_name = $rw['product'];
          $Cuid = $rw['cu_id'];

          $qr="select * from wallet where uid ='$Cuid' And type ='CU'";
          $rew=mysqli_query($con,$qr);
          $rww=mysqli_fetch_array($rew);
          
          $CuName = $rww['name'];
          $Amount = $rw['blocked_amt'];
          $Faid = $rw['fa_id'];

          $qr="select * from wallet where uid ='$Faid' And type ='FA'";
          $rew=mysqli_query($con,$qr);
          $rww=mysqli_fetch_array($rew);
          
          $faName = $rww['name'];
          $status = $row['item_recived'];

          //Showing data in table row by row

             echo "<tr>

              <th scope='row'>$j</th>


              <td>$Auction_number</td>

              <td>$product_name</td>

              <td>$Cuid</td>

              <td>$CuName</td>

              <td>$Amount</td>

              <td>$Faid</td>

              <td>$faName</td>
              <td>$status</td>

              <form method='get'>

              <td><a href='Admin_payment.php?x=$Auction_number'><input type='button' class='btn btn-info' id='001' value='&#10003' name='aa'></a>

              </form>

              

            </tr>";



  }         



 if (isset($_GET['x'])){ 

      //default timezone code start here 
      date_default_timezone_set('Asia/Kolkata');
      $Date = date('Y-m-d H:i:s');
      //default timezone code end here 

      $Auction_number=$_GET['x'];
      
      $quer="select * from Ap_history where auction_id='$Auction_number'";

      $res=mysqli_query($con,$quer)or die("error in insertion #3");
      
      $row=mysqli_fetch_array($res);


      $recived = $row['item_recived'];

      if($recived == "Yes"){
         
          $qr="select * from auction where auction_id ='$Auction_number'";
          $re=mysqli_query($con,$qr);
          $rw=mysqli_fetch_array($re);
          
          $value = $rw['blocked_amt'];
          $Faid = $rw['fa_id'];

          $qr="select * from wallet where uid ='$Faid' And type ='FA'";
          $rew=mysqli_query($con,$qr);
          $rww=mysqli_fetch_array($rew);
          $wallet_number = $rww['wallet_id'];
          $Wallet_Amount = $rww['Wallet_Amount'];

          // transaction historyy code start...//
          $quer="insert into Wallet_tt values('',$Faid,'FA',$wallet_number,$value,$Wallet_Amount,'Credit Auction Amount','$Date','+');";
          $res=mysqli_query($con,$quer)or die("error in insertion Finalwork_wallet_TTable #2");
          //transaction history code end...//
          

          // add money to User wallet code start here..//
          $amount = $Wallet_Amount + $value;//update adding new amount 
        $upqr="UPDATE wallet SET Wallet_Amount ='$amount' WHERE uid ='$Faid' AND type='FA' AND wallet_id ='$wallet_number'"; 
        $upquer=mysqli_query($con,$upqr)or die("error in insertion in Add amount");
         // add money to User wallet code End here..//   

      $qr="UPDATE Ap_history SET paid='Yes' WHERE auction_id ='$Auction_number'";
      mysqli_query($con,$qr)or die("error in Ap_history update error##09");  

          sendto('Admin_payment.php');
      }
       msg('No transaction,Product is not recived');

      sendto('Admin_payment.php');



     }

?>

</table>

</div><!-- div start container -->


</body>

</html>