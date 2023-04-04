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

<table class='table table-striped table-hover  table-bordered' id='tb1'>

  <thead class='bg-dark text-white'>

    <tr>

      <th scope='col'>#</th>

      <th scope='col'>uid</th>

      <th scope='col'>name</th>

      <th scope='col'>Product_name</th>

      <th scope='col'>rating</th>

      <th scope='col' id='fa'>Farmer's price</th>

      <th scope='col'>measurement</th>

      <th scope='col'>weight</th>

      <th scope='col'>total rs</th>

      <th scope='col' id='act'>Actions </th>

    </tr>

  </thead>";




  $quer="select * from listing where verified='no'";

  $res=mysqli_query($con,$quer)or die("error in insertion");

  $count=mysqli_num_rows($res);

  

  for ($i=0; $i<$count; $i++)

  {

    // Taking data row by row

          $row=mysqli_fetch_array($res);

          $uid=$row['uid'];

          $name=$row['name'];

          $grain=$row['p_id'];

          $rating=$row['rating'];   

          $fprice=$row['farmersprice'];

          $mst=$row['measurement'];

          $w8=$row['weight'];

          $veri=$row['verified']; 

          $auct=$row['auctioning'];

          $tts=$row['totalrs'];

          $sno=$row['sno'];

          $tempga;



          for ($j=0; $j <$count ; $j++) { 

            $qr="select p_name from msp where p_id='$grain'";

            $re=mysqli_query($con,$qr);

            $rw=mysqli_fetch_array($re);

            $tempga = $rw['p_name'];
          

          }

          //Showing data in table row by row

             echo "<tr id='tr1'>

              <th scope='row'>$i</th>

              <td><a href='fprofile.php?pname=$tempga&rating=$rating&uid=$uid' id='gra' data-toggle='tooltip' title='click here for this id&apos;s details'><b>$uid</b></a></td>

              <td>$name</td>

              <td>$tempga</td>

              <td>$rating</td>

              <td>$fprice</td>

              <td>$mst</td>

              <td>$w8</td>

              <td>$tts</td>

              

              <form method='get'>

              <td><a href='admin.php?x=$sno'><input type='button' class='btn btn-info' id='001' value='&#10003' name='aa'></a>

              <a href='admin.php?y=$sno'><input type='button' class='btn btn-info' id=001 value='X' name='aa'></a></td>

              </form>

              

            </tr>";



  }         



 if (isset($_GET['x']))

    { 

      $sno=$_GET['x'];

      $qr="update listing set verified='yes' where sno=$sno";

      $res=mysqli_query($con,$qr);

      msg("updated the info of order no $sno");

      sendto('admin.php');



     }

     if (isset($_GET['y']))

    { 

      $sno=$_GET['y'];

      $qr="delete from listing where sno=$sno";

      $res=mysqli_query($con,$qr);

      msg("updated the info of order no $sno");

      sendto('admin.php');



     }

?>

</table>

<div class="generate">

<hr style="border:0.1em solid white;">
<center><h2 class="text-light">Generate report</h2></center>
<hr style="border:0.1em solid white;">


<form method="get">
<label class="text-light"><h4>Generate the report of:</h4></label><input type="date" name="date1" required>
<?php $getfid=$_GET['fid'];?>
<label for="fid">Farmer id</label><input type="text" name="fid" id='fid' value="<?php if (isset($getfid)) echo $getfid;else echo ''; ?>">
<button type="submit" name="sb22">Generate</button>
</form>
</div>

<?php
if (isset($_GET['sb22'])) {

  if ($getfid>0) {

$date1=$_GET['date1'];
$query2="select count(auction_id) from auction where date='$date1' and fa_id=$getfid";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);
$totalauction=$row2['count(auction_id)'];


$query31="select count(cu_id) from tempdata where fa_id=$getfid";
$result31=mysqli_query($con,$query31);
$row31=mysqli_fetch_array($result31);
$totalbidders=$row31['count(cu_id)'];


$query32="select count(sno) from listing where uid=$getfid";
$result32=mysqli_query($con,$query32);
$row32=mysqli_fetch_array($result32);
$totallisteditems=$row32['count(sno)'];


$query33="select max(blocked_amt) from auction where date='$date1' and fa_id=$getfid;";
$result33=mysqli_query($con,$query33);
$row33=mysqli_fetch_array($result33);
$highestamount=$row33['max(blocked_amt)'];
echo"
<div class='hidden' id='hidden'>
  <label class='text-light'><h4>Total Number of auctions done: $totalauction</h4></label><br>
  <label class='text-light'><h4>Total Number of Bidders: $totalbidders</h4></label><br>
  <label class='text-light'><h4>Total Number of Listed Items: $totallisteditems</h4></label><br>
  <label class='text-light'><h4>Highest Bid on $date1: $highestamount</h4></label>
</div>
";
  }
  else{
$date1=$_GET['date1'];
$query2="select count(auction_id) from auction where date='$date1'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);
$totalauction=$row2['count(auction_id)'];


$query31="select count(cu_id) from tempdata";
$result31=mysqli_query($con,$query31);
$row31=mysqli_fetch_array($result31);
$totalbidders=$row31['count(cu_id)'];


$query32="select count(sno) from listing";
$result32=mysqli_query($con,$query32);
$row32=mysqli_fetch_array($result32);
$totallisteditems=$row32['count(sno)'];


$query33="select max(blocked_amt) from auction where date='$date1';";
$result33=mysqli_query($con,$query33);
$row33=mysqli_fetch_array($result33);
$highestamount=$row33['max(blocked_amt)'];
echo"
<div class='hidden' id='hidden'>
  <label class='text-light'><h4>Total Number of auctions done: $totalauction</h4></label><br>
  <label class='text-light'><h4>Total Number of Bidders: $totalbidders</h4></label><br>
  <label class='text-light'><h4>Total Number of Listed Items: $totallisteditems</h4></label><br>
  <label class='text-light'><h4>Highest Bid on $date1: $highestamount</h4></label>
</div>
";
}
}
?>
 <br>
  <table class='table table-striped table-hover  table-bordered' id='tb2'>

  <thead class='bg-dark text-white'>
   <tr>

      <th scope='col'>#</th>

      <th scope='col'>auction id</th>

      <th scope='col'>Product</th>

      <th scope='col'>Weight</th>

      <th scope='col'>FA id</th>

      <th scope='col' id='fa'>CU id</th>

      <th scope='col'>Amount</th>

    </tr>

  </thead>
<?php 
if (isset($_GET['sb22'])) {

    if ($getfid>0) {
      $query="select * from auction where date='$date1' and fa_id=$getfid";
      $result=mysqli_query($con,$query);
      $countrs=mysqli_num_rows($result);




if ($countrs>0) {
   for ($i=0; $i<$countrs; $i++)

  {
    $row11=mysqli_fetch_array($result);
    $aid=$row11['auction_id'];
    $product1=$row11['product'];
    $we8=$row11['weight'];
    $fid=$row11['fa_id'];
    $cid=$row11['cu_id'];
    $hamount=$row11['blocked_amt'];
    // $totalauction=$row11['count(auction_id)'];

             echo "<tr id='tr2'>

              <th scope='row'>$i</th>

              <td>$aid</td>

              <td>$product1</td>

              <td>$we8</td>

              <td>$fid</td>

              <td>$cid</td>

              <td>$hamount</td>

                          
            </tr>";

}
}
}else{
        $query="select * from auction where date='$date1'";
      $result=mysqli_query($con,$query);
      $countrs=mysqli_num_rows($result);




if ($countrs>0) {
   for ($i=0; $i<$countrs; $i++)

  {
    $row11=mysqli_fetch_array($result);
    $aid=$row11['auction_id'];
    $product1=$row11['product'];
    $we8=$row11['weight'];
    $fid=$row11['fa_id'];
    $cid=$row11['cu_id'];
    $hamount=$row11['blocked_amt'];
   

             echo "<tr id='tr2'>

              <th scope='row'>$i</th>

              <td>$aid</td>

              <td>$product1</td>

              <td>$we8</td>

              <td>$fid</td>

              <td>$cid</td>

              <td>$hamount</td>

                          
            </tr>";

}
}
}


}
?>

</div>
</div><!-- div ending container -->
<script>

$(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip();   

});

</script>


</body>

</html>