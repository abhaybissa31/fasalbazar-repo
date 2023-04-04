<?php
session_start(); 


$unique=$_SESSION['unique_id'];
$type= $_SESSION['type']; 
$uid=$_SESSION['unique_id'];
include('fn.php');

$sno=$_GET['x'];
if (!isset($sno)) {
  sendto('cindexfa.php');
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel='stylesheet' type='text/css' href='bid.css'>
	
  <script>
    sno='<?php $sno=$_GET['x']; echo $sno;?>';

    $(document).ready(function(){
      setInterval(function(){
         $("#hamount").load(`highamount.php?x=${sno}`);
      },1000);
    });
  </script>

  <title></title>
</head>
<body>

<?php
     include('incnav.html');
?>
<div class='container'>
  
  <div class='detailsr1'>
      <p id='head'>Bid</p> 
  </div><!--detailsr1-->

<?php
  
  $query2="select * from listing where sno=$sno";
  $executeq2=mysqli_query($con,$query2);
  $countq2=mysqli_num_rows($executeq2);
  $row=mysqli_fetch_array($executeq2);
  $uid=$row['uid'];
  $pid=$row['p_id'];
  $rating=$row['rating'];
  $fpri=$row['farmersprice'];
  $w8=$row['weight'];
  $totalrs=$row['totalrs'];



  $query3="select * from msp where p_id=$pid";
  $executeq3=mysqli_query($con,$query3);
  $countq3=mysqli_num_rows($executeq3);
  $row3=mysqli_fetch_array($executeq3);
  $pimg=$row3['p_pic'];
  $pname=$row3['p_name'];
  $msp=$row3['msp'];


  
  $qr1="select max(amount) from tempdata where fa_id=$uid and pid=$pid";
  $rs1=mysqli_query($con,$qr1);
  $row=mysqli_fetch_array($rs1);
  $hiam=$row['max(amount)'];
  date_default_timezone_set('Asia/Kolkata');
    $date=date('H');
  $sno=$_GET['x'];
 


   $cid= $unique;
    
    //wallet information START here
      $qra1="SELECT * FROM wallet WHERE uid='$unique' AND type='$type'";
      $quera1=mysqli_query($con,$qra1)or die("error in insertion in farmerid");
      $row3=mysqli_fetch_array($quera1); 
      $Wallet_Amount = $row3['Wallet_Amount'];
 echo "
    <div class='squa'>

    <div class='leftitem'>
      <img src='$pimg'>
    </div><!-- leftitem ends -->


       <div class='row' id='r1'>
            <div class='col-2' id='col1'>
              <p><b>Product-></b>$pname</p>
            </div>

            <div class='col-2' id='col2'>
              <p><b>Farmer id-></b>$uid</p>
            </div>

              <div class='col-2' id='col3'>
              <p><b>MSP-></b>$msp</p>
            </div>

            <div class='col-2' id='col4'>
              <p><b>Farmer's price-></b>$fpri</p>
            </div>
            
            </div><!-- row class of r1 ends-->

      <div class='row' id='r2'>
               <div class='col-2' id='col1'>
              <p style='font-weight: bolder;'><b>Time left-></b><lable id='time'></label></p>
            </div>

            <div class='col-2' id='col2'>
              <p style='font-weight: bolder;'><b>Highest bid-></b><label id='hamount'>Wait..</label></p>
            </div>

              <div class='col-2' id='col3'>
              <p><b>Min. Bid:-></b>$totalrs</p>
            </div>

            <div class='col-2' id='col4'>
              <p><b>Weight-></b>$w8</p>
            </div>

      </div> <!-- r2 ends -->

      <div class='row' id='r3'><br><h1><u>Your bid:</u></h1></div>
       <div class='row' id='r3'>
        <form method='post'>
          <input type='text' name='amount'>
          <input type='submit' name='sb'>
          
        </form>
        </div>

      </div><!--  squa class ends -->";
  
  if (isset($_POST['sb'])) {
    $pri=$_POST['amount'];

     if($Wallet_Amount < $hiam){

          echo '<p><script type="text/javascript">
          alert("please check your wallet amount,you not have enough money..");
         
          </script></p>'; 
      }
    else if ($hiam==$pri or $hiam>$pri) {
        msg('Please Bid higher than current highest bid');
        
     }
      

    else if($totalrs > $pri){
      msg('Please bid the higher amount then farmers min amount');
    }
      else{
        // get action id details start
        $qr1="select * from auction where fa_id=$uid and product='$pname'";
        $rs1=mysqli_query($con,$qr1);
        $row=mysqli_fetch_array($rs1);
        $auct=$row['auction_id'];
                
        $Deduct_amount = $Wallet_Amount - $pri;

            //update the current user wallet amount
            $upqr="UPDATE wallet SET Wallet_Amount='$Deduct_amount' WHERE uid ='$unique' AND type='$type'"; 
            $upquer=mysqli_query($con,$upqr)or die("error in insertion in Withdraw amount in bid.php");
           

        

          $newqr="SELECT cu_id,amount FROM tempdata WHERE amount=(SELECT max(amount) FROM tempdata where fa_id=$uid and pid=$pid)";
          $newrs=mysqli_query($con,$newqr);
          $newrow=mysqli_fetch_array($newrs); 
          $recent_uid = $newrow['cu_id']; //get Highest customer id Number
          $recent_Amount = $newrow['amount'];
    
         //  getin highest amountt 
        $qr="insert into tempdata values($auct,$cid,$pri,$pid,$uid)";
        $rs=mysqli_query($con,$qr);
        msg('bid sent successfully \nPlease wait a few seconds to check highest bid');
        // sendto("bid.php?x=$sno");
        
        //Get the total number temp data code start here
        $newqr111="SELECT amount FROM tempdata where fa_id=$uid and pid=$pid";
        $qrnewqr111 = mysqli_query($con,$newqr111)or die("error in insertion #NUMBER");
        $NUMBER = mysqli_num_rows($qrnewqr111);  
        //Get the total number temp data code End here    

             if($NUMBER != 1){
            // update the recent user wallet amount
            $qr1="SELECT * FROM wallet WHERE uid='$recent_uid' AND type='$type'";
            $quer1=mysqli_query($con,$qr1)or die("error in insertion in Former user Wallet Amount Check");
            $row4=mysqli_fetch_array($quer1); 
            $former_Wallet_Amount = $row4['Wallet_Amount'];
    
            $refund = $former_Wallet_Amount + $recent_Amount;
            //update the auction table
            $upqr="UPDATE wallet SET Wallet_Amount=$refund WHERE uid =$recent_uid AND type='$type'"; 
            $upquer=mysqli_query($con,$upqr)or die("error in insertion in Withdraw amount222");
              
             }
            // sendto('finalwork.php');
  }
}
?>
</div>
<script type="text/javascript">
  //    let start=0;
  //    let time=0;
  // function setint(){
  //    start=30;
  //    time= start * 60;
  //    setInterval(countdown,1000);
  //  }
  
  // function countdown(){
  //   const min=Math.floor(time/60);
  //   let seconds= time % 60;
  //   time--;
  //   document.getElementById('time').innerHTML=`${min}:${seconds}`;
  //   if (min<0 || seconds<0) {
  //     location='cindexfa.php';
  //     alert('Bidding time is over.\nNow redirecting to home');

  //   }
  // }
  // setint();
  // countdown();

// Set the date we're counting down to
let hr;
let mi;
hr = '<?php $do=date('H'); echo $do;?>';
mi= '<?php $mi=30; echo $mi;?>';

var countDownDate = new Date("2099 " +hr+":"+10+":00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  pname='<?php echo $pname; ?>';
  faid='<?php echo $uid; ?>';
  w8='<?php echo $w8?>';
  document.getElementById("time").innerHTML =  minutes + "m " + seconds + "s ";;
  if(minutes==0&&seconds==0){
     location=`finalwork.php?pname=${pname}&faid=${faid}&w8=${w8}`;
  }
  else if (minutes>59) {
    location=`finalwork.php?pname=${pname}&faid=${faid}&w8=${w8}`;
  }
  }, 1000);
</script> 
</body>
</html>