<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="win.css">
	<title></title>
</head>
<body>
<?php include('incnav.html');?>

<div class="container">
	<div class="row">
	<div class="col-4"><h1>HERE<br>IS<br>YOUR<br>WINNINGS!</h1></div>
	<div class="col-8">
	<table class='table table-striped table-hover  table-bordered'>
  <thead class=''>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Product</th>
      <th scope='col'>Weight</th>
      <th scope='col'>Amount</th>
      <th scope='col'>Date</th>
      <th scope='col'>Bill</th>
    </tr>
  </thead>


  <?php
    
    // Fetching from auction table
     include('fn.php');
    // $con=mysqli_connect('127.0.0.1','root','','epiz_31531759_krishi') or die("Error in connection");
      session_start(); 
    $unique=$_SESSION['unique_id'];
    $type= $_SESSION['type'];
 
    if(!isset($_SESSION["unique_id"])){
msg("Please Login in order to continue");
sendto("http://krishi.rf.gd");
}
    $qr1="SELECT product,weight,date,blocked_amt from auction where cu_id=$unique order by date desc";
    $res1=mysqli_query($con,$qr1);
    $count=mysqli_num_rows($res1);

    for ($i=0; $i <$count ; $i++) 
    {   
      $row=mysqli_fetch_array($res1);
      $prd=$row['product'];
      $wgt=$row['weight'];
      $dte=$row['date'];
      $bamt=$row['blocked_amt'];
      $total= $wgt*$bamt;
      
      echo"<tr>
        <th scope='row'>$i</th>
        <td>$prd</td>
        <td>$wgt</td>  ";
        if($bamt==""){
          echo "<td> </td>";  
        }
        else
          echo "<td>₹ $bamt</td>";

        echo "<td>$dte</td>";
        
        if($prd==""){
          echo "<td> </td>";  
        }
        else
          echo "<td>₹ $total</td>";
        
        
        
        
      
   echo"</tr>";
   }//for loop ending

   ?>
  </div>
  </div>
</div><!-- container end -->
</body>
</html>
