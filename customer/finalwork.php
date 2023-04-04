<?php 
include('fn.php');

//default timezone code start here 
  date_default_timezone_set('Asia/Kolkata');
  $Date = date('Y-m-d H:i:s');
//default timezone code end here 
  $faid=$_GET['faid'];
  $pname=$_GET['pname'];
  $w8=$_GET['w8'];

  $qe12="select p_id from msp where p_name='$pname'";
  $rs12=mysqli_query($con,$qe12);
  $row11=mysqli_fetch_array($rs12);
  $pid=$row11['p_id'];
    

  $qr1="SELECT cu_id,amount FROM tempdata WHERE amount=(SELECT max(amount) FROM tempdata where fa_id=$faid and pid=$pid)";
  
  $rs1=mysqli_query($con,$qr1);
  $row=mysqli_fetch_array($rs1);
  $hiam=$row['amount'];
  $value =$hiam;
  $cuid=$row['cu_id'];
 
  $date=date('Y-m-d');

  $qr1="select auction_id from auction where fa_id=$faid and product='$pname'";
  $rs1=mysqli_query($con,$qr1);
  $row=mysqli_fetch_array($rs1);
  $auid=$row['auction_id'];
  $qr2="update auction set cu_id=$cuid,blocked_amt=$hiam,date='$date',weight=$w8 where auction_id=$auid";
  $rs2=mysqli_query($con,$qr2);


//wallet information code start here...// 
  $qra1="SELECT * FROM wallet WHERE uid=$cuid AND type='CU'";
  $quera1=mysqli_query($con,$qra1)or die("error in insertion Finalwork_wallet_TTable #1");
  $row3=mysqli_fetch_array($quera1); 
  $wallet_number = $row3['wallet_id'];
  $Wallet_amount = $row3['Wallet_Amount'];
//wallet information code end here...//


// transaction code start...//
  $quer="insert into Wallet_tt values('',$cuid,'CU',$wallet_number,$value,$Wallet_amount,'Debit Auction Amount','$Date','-');";
  $res=mysqli_query($con,$quer)or die("error in insertion Finalwork_wallet_TTable #2");
//transaction code end...//


// upadate the AP_history database code start here
  $quer1234="insert into Ap_history values($auid,$value,'No','Yes');";
  echo $quer1234;
  $res1234=mysqli_query($con,$quer1234)or die("error in insertion Ap_history  #1");
// upadate the AP_history database code End here
      
      // Data delete codee........
  $qr4="delete from listing where uid=$faid and p_id=$pid";
  $rs4=mysqli_query($con,$qr4);

  $qr5="delete from expert where uid=$faid and product='$pname'";
  $rs5=mysqli_query($con,$qr5);
  sendto('cindexfa.php');

?>