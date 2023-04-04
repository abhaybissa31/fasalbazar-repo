<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>
  <link rel='stylesheet' type='text/css' href='fprofile.css'>
  <title></title>
</head>
<body>
  
<nav class='navbar navbar-expand-sm bg-dark navbar-dark fixed-top navbar-brand-center'>



  	<h1 class='navbar-brand mx-auto' style='font-size:1.6em'>FASAL BAZAR<small class='text-muted h3'> Admin</small></h1>

  <ul class='navbar-nav' id='bottomul'>

  	<li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/admin/Admin_payment.php'>Payment Transactions</a> </li>

  	<li class='nav-item'> <a class='nav-link' href='/logout.php'>Logout</a> </li>
   

  </ul>
</nav>
<div class='container'>
  
  <div class='detailsr1'>

      <p id='head'>PROFILE</p> 
  </div><!--detailsr1-->

<div class='squa'>


 

 <?php 
  include('fn.php');
        $unique=$_GET['uid'];
        
        
        $qr1="SELECT * FROM farmersignup WHERE uid=$unique";
        $quer1=mysqli_query($con,$qr1)or die("error insertion in name");
        $row1=mysqli_fetch_array($quer1);
        $name = $row1['name'];
        $phone = $row1['phone'];
        $k_no = $row1['krishi_id_no'];
        $img = $row1['krishi_img'];
        $address = $row1['address'];
        $rating=$_GET['rating'];
        $pname = $_GET['pname'];
    echo 
    " <div class='leftitem'>
    <img src='/farmer/$img'>
      </div>


   <div class='row' id='r1'>
        <div class='col-3' id='col1'>
          <p><b>U_ID: </b>FA$unique</p>
        </div>

        <div class='col-3' id='col2'>
          <p><b>NAME: </b>" .$name. "</p>
        </div>

          <div class='col-3' id='col3'>
          <p><b>PHONE: </b>".$phone."</p>
        </div>

        <div class='col-3' id='col4'>
          <p><b>Krishi_ID: </b>".$k_no."</p>
        </div>
        
        </div><!-- row class of r1 ends-->

  <div class='row' id='r2'>
           <div class='col-3' id='col1'>
             <p><b>Address: </b>".$address."</p>
        </div>

        <div class='col-3' id='col2'>
          <p><b>Product: </b>$pname</p>
        </div>

          <div class='col-3' id='col3'>
          <p><b>Rating: </b>$rating</p>
        </div>

        

  </div> <!-- r2 ends -->

  ";

?>
  <div class="row" id="r3">
  <div class="col-12"><h2><u>Points to keep in mind while Expert grade:</u></h2></div>
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
  <center>
    <form method="post" enctype="multipart/form-data"> 
    <!-- <div class="row"> -->
    <div class="col-4">
    <textarea class="textarea" id="ta" rows="6" cols="60" name="textar" placeholder="Final Report by keeping above points in mind and stating the observations"></textarea>
  <!-- So final report is by keeping in mind about our crop is that : 
the dimension of crop is good. its very durable and was prepared in good weather. fertilizer used was of minimum and its texture property are all good. We can sell this at a higher rate than the msp because of good quality -->
   
</div>
</div>
</center>

<div class="row" id="r5">
 
  <div class="col-4">
    <h2><u>Product Rating:</u></h2><br>
    <input type="text" name="u1" id="u1" required> 
  </div>
<div class="col-4">
  <h2><u>Farmer Rating:</u></h2><br>
  <input type="text" name="u2" id="u2" required> 
</div>

<div class="col-4">
  <h2><u>Upload Picture:</u></h2><br>
  <input type="file" name="u3" required> 
</div>
</div>
<div class="row" id="r6">
  <button type="submit" class='btn-primary' style='border:none;text-decoration: none;' value='$id' name='sb'>Send report</button>
</div>
</form>
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
  $pidp=$_FILES['u3'];
   $filename=$pidp['name'];//file name
  $filep=$pidp['tmp_name'];//tmp file save path
  $fileer=$pidp['error'];//if error occurs it'll be bigger than 0 and hence that's how we know error


  $destf='/product_img/'.$filename;

    move_uploaded_file($filep,$destf);
  
  $textareaValue = $_POST['textar'];
  // msg($textareaValue);
  $croprate=$_POST['u1'];
  $farmerrate=$_POST['u2'];
  
  if ($croprate>10 or $farmerrate>10) {
    msg("Please rate out of 10");
  }else{


  $quer="insert into expert(uid,product,p_img,rating,review,farmer_rating) values($unique,'$pname','$destf',$croprate,'$textareaValue',$farmerrate)";
  $res1=mysqli_query($con,$quer);
  
  
  $qr1="select p_id from msp where p_name='$pname'";
  
  $rs=mysqli_query($con,$qr1);
  $row=mysqli_fetch_array($rs);
  $pid=$row['p_id'];

  $quer2="update listing set rating=$croprate where uid=$unique and p_id=$pid";
  $res2=mysqli_query($con,$quer2);
  
  sendto('admin.php');
}
}
  
?>