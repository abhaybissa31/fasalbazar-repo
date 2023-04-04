<?php
//perfect working>
    session_start(); 

$un=$_POST['uid'];
$pw=$_POST['vid'];
$FAcheck = false;
$CUcheck = false;
$_SESSION['verifyid'] = $pw;
//function start

 $temp= substr(strtoupper($un),0,2);
$number = substr($un,2);
 $_SESSION['unique_number'] = $number;
 $_SESSION['TYPE'] = $temp;
//function End here


//connect table
$con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error"); 
 
  $qr1="SELECT uid, pan_card_no FROM customersignup WHERE uid='$number' and pan_card_no ='$pw'";
    $quer1=mysqli_query($con,$qr1)or die("error in insertion");
    $CUcount=mysqli_num_rows($quer1);

      $qr="SELECT uid, krishi_id_no FROM farmersignup WHERE uid='$number' and krishi_id_no ='$pw'";

// check data in krishi table
    $quer=mysqli_query($con,$qr)or die("error in insertion");
    $FAcount=mysqli_num_rows($quer);
    
    if (($temp == "FA") And ($FAcount)){
      $FAcheck = true;
        $CUcheck = false;
        $_SESSION['Farmer_check'] = $FAcheck;
        $_SESSION['Customer_check'] = $CUcheck;
         echo '<p><script type="text/javascript"> alert("FA exist!!");
            location="confirm.html"
            </script></a></p>'; 

        }

      
        elseif (($temp == "CU") And ($CUcount)){ 
             //check data  in customer table

    $CUcheck = true;
    $FAcheck = false;
    $_SESSION['Customer_check'] = $CUcheck;
     $_SESSION['Farmer_check'] = $FAcheck;
            echo '<p><script type="text/javascript">alert("CU exist!!");
            location="confirm.html"
            </script></a></p>';
        }

    else{
            echo '<p><script type="text/javascript"> alert("user Not exist!!");
            location="forget.html"
            </script></a></p>'; 
    }
//perfect working>      
?>