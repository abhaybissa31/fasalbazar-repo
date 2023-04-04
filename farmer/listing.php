<?php session_start();
 include('fn.php');

if(!isset($_SESSION["unique_id"])){
msg("Please Login in order to continue");
sendto("login.html");
}
else{
$uid = $_SESSION["unique_id"];
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
  <link rel='stylesheet' type='text/css' href='listing.css'>
	<title></title>
</head>
<body>

<?php include('incnav.html');?>

<div class='container'><!-- container class starts -->

  <div class='content'><!-- content starts -->

    <hr style='border:0.1em solid black;'>
    <center><h2><b>Product Listing Page</b></h2></center>
    <hr style='border:0.1em solid black;'>
</div>

    <!-- card starts -->
<?php 
 
// php starts for printing cards

    $quer="select * from msp";
    $res=mysqli_query($con,$quer);
    $count=mysqli_num_rows($res);
    if ($count) {
        for ($i=0; $i <$count ; $i++) {
            $row=mysqli_fetch_array($res);
            $pna=$row['p_name'];
            $hpna=$row['p_hindiname'];
            $id=$row['p_id'];
            $img=$row['p_pic'];
            $msp=$row['msp'];
            $mspkg=$row['mspkg'];


            echo "<div class='card'>
                  <div>
    
                    <img src=$img class='card-img-left h-150' alt='...' id='cimg'>
        
                    <div class='col-sm-12'>
            
                    <div class='card-body'>
               
                    <div class='heads'>
                        <center><h4 class='card-title'>$pna($hpna)</h4></center>
                        <center><hr style='width:13em;border:0.12em solid white;margin-top: -0.2em;'></center>
                    </div>

                    <div class='form1'>
                    <form method='get'>
                    
                         <h5 class='rhead'>Measurement</h5>
                    
                    <div class='radio'>
                    
                        <label for='measure' style='font-weight: bold;color: black;' id='qu'>Quin</label>
                        <input type='radio' name='measure' id='rd1' value='quin' checked>
                        <label for='measure' style='font-weight: bold;color: black;' id='kg'>Kg</label>
                        <input type='radio' name='measure' id='rd' value='kg'>
                   
                    </div><!-- radio class ending -->

                    <div class='weight'>
                        
                        <td><h5 class='whead'>Total weight</h5></td>
                        <div class='box1'>
                        <td><input type='number' name='weig' class='wi' required id='weig'>
                        </td>
                        </div>                      
                    
                    </div><!-- weight class ends -->
                     
                    <div class='pri'>
                    
                        <td><h5>Your price</h5></td>
                        <div class='box2'>
                        <td><i class='fa fa-inr' id='fa'></i><input type='number' name='price' id='price' required></td>
                        </div>
                     
                    </div><!-- pri class ends -->

                     <div  class='msp'>
                    
                         <td><h5>MSP in quin:</h5></td>
                         <div class='box3'>
                         <td><i class='fa fa-inr' id='fa'></i><label style='background-color: white;color: black;padding:1px;width:3em'>$msp</label></td>
                          </div>

                     </div><!-- MSP class ending -->

                     <div  class='mspkg'>
                    
                         <td><h5>MSP in kg:</h5></td>
                         <div class='box4'>
                         <td><i class='fa fa-inr' id='fa'></i><label style='background-color: white;color: black;padding:1px;width:3em'>$mspkg</label></td>
                          </div>

                     </div><!-- MSPkg class ending -->

                     <div class='btn1'>
                    
                      <button type='submit' class='btn-primary' style='border:none;text-decoration: none;' value='$id' name='aa'>list </button> 
                     </div>


                   </form> 
                </div>
                  <!--  class='btn btn-primary stretched-link'>View Profile</a> -->
            </div>
        </div>
    </div>
</div>


    <!-- card ends -->
    <br>";
        }
        echo "</div><!-- container class ends -->";

    }
    // taking name of farmer using his uid
    
    // taking value from fields
    if (isset($_GET['aa']))
    {   $quer1="select name from farmersignup where uid=$uid";
        $res1=mysqli_query($con,$quer1);
        $row=mysqli_fetch_array($res1);
        $na=$row['name'];
        $wid=$_GET['aa'];
        $tw=$_GET['weig'];
        $yp=$_GET['price'];
        $rb=$_GET['measure'];
        $trs=$yp*$tw;
        
        
        // check if product is already listed
        $quer2="select p_id from listing where uid=$uid and p_id='$wid' and measurement='$rb'";
        $res2=mysqli_query($con,$quer2);
        $row=mysqli_fetch_array($res2);
        $count=mysqli_num_rows($res2);
        if ($count) {
            msg('product already added');
        }
        else if ($tw<=0 or $tw>1000) {
            msg('Weight cannot be more than 1000 or less than 0');
        }
        else {
        $quer3="INSERT INTO listing(uid,name,p_id,farmersprice,measurement,weight,totalrs,auctioning,verified) VALUES($uid,'$na','$wid',$yp,'$rb',$tw,$trs,'no','no')";
        $res3=mysqli_query($con,$quer3);
        msg('Value sucessfully listed');
        }
    }
   
     
?>

</body>
</html>