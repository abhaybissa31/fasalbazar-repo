<!-- wallet.php start here -->
<?php
session_start(); 
include('fn.php');


// variables start here

    //session variable
    $unique=$_SESSION['unique_id'];
    $type= $_SESSION['type'];

if(!isset($_SESSION["unique_id"])){
msg("Please Login in order to continue");
sendto("http://krishi.rf.gd");
}

    //display
    $amount = 0;
    $wallet_number; 


// variables end here






//connection start

//connection start
$con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error in connection");



//it give default timezone 
date_default_timezone_set('Asia/Kolkata');
 $Date = date('Y-m-d H:i:s');

//wallet information  for display code start here
      $qr="SELECT * FROM wallet WHERE uid='$unique' AND type='$type'";
      $quer=mysqli_query($con,$qr)or die("error in insertion in farmerid");
      $row3=mysqli_fetch_array($quer); 
      $wallet_number = $row3['wallet_id'];
      $_SESSION['wallet_id'] = $wallet_number;
      $ifsc_code = $row3['ifsc'];
      $account_number = $row3['account_no'];
      $amount = $row3['Wallet_Amount'];
      $name = $row3['name'];
//wallet iformation for display code end here


//payment syatem Farmer/Customer start  here
if((isset($_POST['add'])) Or isset($_POST['withdraw']) ){

    //wallet information  for display code start here
    $qr="SELECT * FROM wallet WHERE uid='$unique' AND type='$type' AND wallet_id ='$wallet_number'";
      $quer=mysqli_query($con,$qr)or die("error in wallet connection ");
      $row3=mysqli_fetch_array($quer); 
      $amount = $row3['Wallet_Amount'];
    //wallet iformation for display code end here

    //post variable 
    $value = $_POST['uid'];
     
    //add money code start here
    if( (($type == "FA") Or ($type =="CU")) And ($value >0) And (isset($_POST['add'])) ){

                  
        // transaction History code for start here 

        $quer="insert into Wallet_tt values('',$unique,'$type',$wallet_number,$value,$amount,'Add Money','$Date','+');";
          $res=mysqli_query($con,$quer);

        // transaction History code for end here 
        
        $amount = $amount + $value;//update adding new amount 
        $upqr="UPDATE wallet SET Wallet_Amount ='$amount' WHERE uid ='$unique' AND type='$type' AND wallet_id ='$wallet_number'"; 
        $upquer=mysqli_query($con,$upqr)or die("error in insertion in Add amount");
        include_once 'inwallet.php';
    }
    //add money code end here

    //withdraw money code start here
    if( (($type == "FA") Or ($type =="CU")) And ($value >0) And (isset($_POST['withdraw'])) ){
        $temp_Check = $amount - $value;
            
                  if($temp_Check >= 0){
        // transaction History code for start here 

        $quer="insert into Wallet_tt values('',$unique,'$type',$wallet_number,$value,$amount,'Withdraw Money','$Date','-');";
          $res=mysqli_query($con,$quer);

        // transaction History code for end here
                  $amount = $amount - $value;
                  $upqr="UPDATE wallet SET Wallet_Amount='$amount' WHERE uid ='$unique' AND type='$type' AND wallet_id ='$wallet_number'"; 
                  $upquer=mysqli_query($con,$upqr)or die("error in insertion in Withdraw amount");

                   include_once 'inwallet.php';
                   }
            
                  else{

                  echo '<p><script type="text/javascript"> alert("you not have enough money ");
                  </script></p>'; 
                  }
             }

             if($value == 0){
                echo '<p><script type="text/javascript"> alert("Please Enter your Amount above 0 ");
                  </script></p>';  
             }

    }
    //withdraw money code end here


//add payment method code start here

if(isset($_POST['Add_payment_method'])){
    echo '<p><script type="text/javascript">
          location="http://krishi.rf.gd/payment/bank.php"
          </script></p>'; 
  }
// add payment method code end here

// check the bank details is fill or not code start  here
      $dqr1="SELECT account_no FROM wallet WHERE wallet_id ='$wallet_number' AND account_no =''";
      $dquer1=mysqli_query($con,$dqr1)or die("error in insertion");
      $dcount=mysqli_num_rows($dquer1); 
      $dqr2="SELECT ifsc FROM wallet WHERE wallet_id ='$wallet_number' AND ifsc =''";
      $dquer2=mysqli_query($con,$dqr2)or die("error in insertion");
      $dcount1=mysqli_num_rows($dquer2);      
// check the bank details is fill or not code end    here



if ($dcount And $dcount1) {
        echo '<p><script type="text/javascript">
          location="http://krishi.rf.gd/payment/bank.php"
          </script></p>';  
}

?>


<!-- wallet html page start here  -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>wallet</title>

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
  <link rel="stylesheet" type="text/css" href="FWallet.css">
</head>
<body>

     <?php include('incnav.php');?>

<div class="container"><!--FirstContainer class-->

  <div class="head"><!--Heading section ending-->
    <hr style="height:2px;border-width:0;color:#189AB4;background-color:#189AB4">
    <h1 class="title" style="color: #05445E; font-weight: bold;"><b>Wallet</h1>
    <hr style="height:2px;border-width:0;color:#189AB4;background-color:#189AB4">
  </div><!--Heading section ending-->

  <div class="form1 container"><!-- Form Starting-->
    <form method="post" action="wallet.php">
      <!-- information display started -->
         <div class="f"><!--f class starting -->
          <div class="container"><!--2container class starting -->
            <b class="idd"><u>Wallet ID</u>:<?php echo $wallet_number;?> &nbsp; &nbsp;
            <u> Unique ID</u>:<?php echo $type.$unique;?></b>
            <hr style="border-top: 0.2em solid black;"><!--hr ends-->

            <h5 class="acc"><b>Name: <b>&nbsp;<?php echo strtoupper($name)?></h5>
            <h5 class="acc"><b>Account No: <b>&nbsp;<?php echo $account_number;?></h5>
            <h5 class="acc"><b>IFSC Code: <b>&nbsp;<?php echo $ifsc_code;?>
            </h5>
            <center><h4 style="bottom: 0.5em; color: black;">Total Available Balance:&nbsp;<?php echo"<b>₹$amount</b>"?></h4></center>
            <hr style="border-top: 0.2em solid black;"><!--hr ends-->

            <h1 class="rupee">₹<?php echo $amount;?></h1>

           </div><!--2container class endinging -->
         </div><!--f class ending -->

         <div class="anx"><!-- anx starting -->

           <input type="tel" name="uid" id="uid" size="30" placeholder="Enter amount / राशि दर्ज करें" required oninvalid="this.setCustomValidity('यहाँ रिक्त स्थान भरें')"oninput="this.setCustomValidity('')"> 

         </div><!-- anx ending -->

          <div class="submit1"><!-- submit button starting  -->
            <b><input type="submit" name="add" value="Add Money" id="add" class="sb" style="font-size:12px;border-radius: 6px; color:white;"></b> &nbsp;&nbsp;&nbsp;
            <b><input type="submit" name="withdraw" value="Withdraw Money" id="withdraw" class="sb" style="font-size:12px;border-radius: 6px; color:white;">
            </b>

          </div><!-- submit button ending -->  
    </form>
    
    <form method="post" action="wallet.php">
      <br>
      <b><input type="submit" name="Add_payment_method" value="Add Payment Method" id="submit" class="sb3" style="font-size:12px;border-radius: 6px;"></b><br>
    </form>



  </div><!-- Form end-->


</div><!--FirstContainer class end-->
</body>
</html>
<!-- html wallet page end here --> 