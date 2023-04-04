<!-- Customer signup biden.php ending -->
<?php
include('fn.php');
// user value starting from page customer signup.html

$un=$_POST['un'];
$pn=$_POST['pn'];
$pid=$_POST['pid'];
$pidp=$_FILES['idimg'];
$pw=$_POST['pwd'];
$cpw=$_POST['cpwd'];
$addr=$_POST['ad1'];
$pp=$_FILES['pp'];


   	//for kid upload
    $filename=$pidp['name'];//file name
	$filep=$pidp['tmp_name'];//tmp file save path
	$fileer=$pidp['error'];//if error occurs it'll be bigger than 0 and hence that's how we know error


	$destf='cid_img/'.$filename;

		move_uploaded_file($filep,$destf);
	

        //for profile image upload
    $filename1=$pp['name'];//file name
	$filep1=$pp['tmp_name'];//tmp file save path
	$fileer1=$pp['error'];//if error occurs it'll be bigger than 0 and hence that's how we know error


	$destf1='profile/'.$filename1;

		move_uploaded_file($filep1,$destf1);
	


// user value ending form page customer signup.html

$cnaddr=strlen($addr); // find the length of the address

// connect to the  database
$con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error in connection");



if ($pw!=$cpw) {
  echo "<script>alert('Not same same')</script>";
  include_once('incsu.php');
}

	$qr="SELECT pan_card_no FROM customersignup WHERE pan_card_no='$pid'";
	$qr1="SELECT phone FROM customersignup WHERE phone='$pn'";

	$quer=mysqli_query($con,$qr)or die("error in insertion");
	//echo $quer."query result";
	$count=mysqli_num_rows($quer);

	if ($count>0)
{
	$row=mysqli_fetch_array($quer);
	$pn=$row['phone'];	 
  echo '<p><script type="text/javascript"> alert("phone number exist");
        
        </script>in</a>.</p>';
         include_once('incsu.php');
}



if ($count>0)
{
	$row=mysqli_fetch_array($quer);
	$pid=$row['pan_card_no']; 
  echo '<p><script type="text/javascript"> alert("PAN Already exist");
       
        </script>in</a>.</p>'; 
        include_once('incsu.php');	
}



//check the length of address is between the range (0-100)
if ($cnaddr>100 or $cnaddr<0) { 
	echo "<script>alert('कृपया पता 100 शब्दों तक रखें');</script>";
	include_once('incsu.php');
}

	# code...

//assign the data to database 
else{
   
$quer="insert into customersignup values('','CU','$un',$pn,'$pid','$destf',SHA1('$pw'),'$addr','$destf1');";
$res=mysqli_query($con,$quer);
$quer1="INSERT INTO wallet(uid,type,name) SELECT uid, type, name FROM customersignup where pan_card_no='$pid';";
$res1=mysqli_query($con,$quer1);
$quer3="select uid from customersignup where phone=$pn";
$res3=mysqli_query($con,$quer3);
$row3=mysqli_fetch_array($res3);
$cuid=$row3['uid'];
$msg="!!!!!Your UINQUE ID is CU".$cuid." Please save this id somewhere safe in order to login";
msg($msg);
sendto('loginbid.html');
}




?>
<!-- Customer signup biden.php ending -->