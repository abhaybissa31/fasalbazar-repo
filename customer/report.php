<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>
  <link rel='stylesheet' type='text/css' href='report.css'>
  <title></title>
</head>
<body>
<?php include('incnav.html') ?>
<div class='container'>
  
  <div class='detailsr1'>
      <p id='head'>REPORT</p> 
  </div><!--detailsr1-->

<div class='squa'>
 <script>
let type='<?php $type=$_GET['type']; echo $type;?>'
if (type=="farmer") 
{ 
document.getElementById('wb').style.display='none';
document.getElementById('ho').href='/farmer/indexfa.php';
document.getElementById('pro').href='/farmer/profile.php';
}
 
</script>

 

 <?php 
  include('fn.php');
        $unique=$_GET['uid'];
        $pname=$_GET['pname'];
        
        
      $qr1="SELECT * FROM expert WHERE uid=$unique and product='$pname'";
      $quer1=mysqli_query($con,$qr1)or die("error insertion in name");
      $row1=mysqli_fetch_array($quer1);
      $pimg=$row1['p_img'];
      $frating=$row1['farmer_rating'];
      $crating=$row1['rating'];
      $review=$row1['review'];
      
    echo 
    " <div class='leftitem'>
    <img src='$pimg'>
      </div>


   <div class='row' id='r1'>
        <div class='col-3' id='col1'>
          <p><b>U_ID: </b>FA$unique</p>
        </div>

        <div class='col-3' id='col2'>
          <p><b>Product: </b>$pname</p>
        </div>

        <div class='col-3' id='col3'>
          <p><b>Rating: </b>$crating/10</p>
        </div>

        <div class='col-3' id='col4'>
          <p><b>Farmer Rating:</b> $frating/10</p>
        </div>

  </div> <!-- r2 ends -->

  ";
?>
  <div class="row" id="r3">
  <div class="col-12"><h2><u>Key points in expert grading:</u></h2></div>
    <div class="col-3">
    <ul class="ul">
      <li>Dimension</li>
      <li>Weight</li>
      <li>density</li>
      <li>Strength</li>
    </ul>
    </div>
    <div class="col-3">
      <ul class="ul">
      <li>Smooth</li>
      <li>Rough</li>
      <li>Shiny</li>
      <li>Durability</li>
    </ul>
    </div>
    <div class="col-3">
      <ul class="ul">
      <li>Oil</li>
      <li>Moisture</li>
      <li>Storage</li>
      <li>Mass</li>
    </ul>
    </div>
    <div class="col-3">
      <ul class="ul">
      <li>Pesticide</li>
      <li>Fungicide</li>
      <li>Mineral</li>
      <li>Fertilizer</li>
    </ul>
    </div></div>
 <div class="col-4" id="sad"><h1>FINAL<br>REPORT<br>BY<br>EXPERT!</h1></div>
  <center>
   
    <!-- <div class="row"> -->
    <div class="col-4">
    <textarea class="textarea" id="ta" rows="10" cols="50" name="textar" readonly><?php echo $review?></textarea>
  <!-- So final report is by keeping in mind about our crop is that : 
the dimension of crop is good. its very durable and was prepared in good weather. fertilizer used was of minimum and its texture property are all good. We can sell this at a higher rate than the msp because of good quality -->
   
</div>
</div>
</center>

</div>
</div>
</div>
</div><!--  squa class ends -->

</div><!-- container ends -->

</body>
</html>
<?php
  // include('fn.php');
if (isset($_POST['sb'])) {
  $textareaValue = $_POST['textar'];
  // msg($textareaValue);
  $croprate=$_POST['u1'];
  $farmerrate=$_POST['u2'];
  $quer="insert into expert(uid,review,p_rating) values($unique,'$textareaValue',$croprate,$pname)";
  $res1=mysqli_query($con,$quer);
  
  $qr1="select p_id from msp where p_name='$pname'";
  $rs=mysqli_query($con,$qr1);
  $row=mysqli_fetch_array($rs);
  $pid=$row['p_id'];

  $quer2="update listing set rating=$croprate where uid=$unique and p_id=$pid";
  $res2=mysqli_query($con,$quer2);
  sendto('admin.php');
}
  
?>