<?php session_start();
 include('fn.php');

if(!isset($_SESSION["unique_id"])){
msg("Please Login in order to continue");
sendto("cindexfa.php");
}
else{
$uid = $_SESSION["unique_id"];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="indexfa.css">
  <title></title>
</head>
<body>
<?php include('incnav.html');?>
<!-- About us starting -->
<div class="jumbotron" id="jimg"> 
  <div id="jb" >
    <div class="jtext">
    <div class="container">
    <div class="jheading"><h1>ABOUT US</h1></div>
            Online trading of agricultural commodities is a step towards blooming of farmers and their livelihood where they can get a justified worth of their commodities. E-Krishi Mandi has came out with the notion to provide price discovery to the farmers or to make offline mandi operation smooth and secure via online portal and payment settlement. It introduces a concept of direct selling of farmer produce through e commerce resulting in to time saving and digitalization of all records. Better Price discovery of agri commodities for farmers/ traders/ corporates. Conveyance to farmer community through availability of storage, commodity grading, lodging and boarding facilities for farmers at the locations. Reliable & Modest platform to get fair price of agri produce. Live commodity rates are available to evaluate market demand
</div>
</p>
</div>
</div>
</div>
<div class="container">
<hr style="border:0.1em solid black;">
<center><h2>Your Listed Items</h2></center>
<hr style="border:0.1em solid black;">
<!-- About us ends -->
<!-- Tables starting -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Grain</th>
      <th scope="col">Rating</th>
      <th scope="col">your price</th>
      <th scope="col">in</th>
      <th scope="col">weightage</th>
      <th scope="col">Total Price</th>
      <th scope="col">Verification status</th>
      <th scope="col">Report</th>
      <th scope="col">Send for auction</th>
      <th scope="col">Remove from Listing</th>
    </tr>
  </thead>
  <tbody>


<!-- php code -->
<?php
 
  $qr="SELECT p_id,rating,farmersprice,measurement,weight,verified,auctioning,totalrs FROM listing WHERE uid=$uid;";
  $quer=mysqli_query($con,$qr)or die("error in insertion");
  $count=mysqli_num_rows($quer);

  if (($count))
   {
  
  for ($i=0; $i <$count; $i++)
  {
    // Taking data row by row
          $row=mysqli_fetch_array($quer);
          $grain=$row['p_id'];
          $rating=$row['rating'];   
          $fprice=$row['farmersprice'];
          $mst=$row['measurement'];
          $w8=$row['weight'];
          $veri=$row['verified']; 
          $auct=$row['auctioning'];
          $ttp=$row['totalrs'];
          $tempga;
          
          for ($j=0; $j <$count ; $j++) { 
            $qr="select p_name from msp where p_id='$grain'";
            $re=mysqli_query($con,$qr);
            $rw=mysqli_fetch_array($re);
            $tempga = $rw['p_name'];
          }
          //Showing data in table row by row
             echo "<tr>
              <th scope='row'>$i</th>
              <td id='gra'>$tempga</td>
              <td>$rating</td>
              <td>$fprice</td>
              <td>$mst</td>
              <td>$w8</td>
              <td>$ttp</td>
              <td>$veri</td>
              <td><a href='/customer/report.php?uid=$uid&pname=$tempga&type=farmer'>Check report</a></td>
              <form method='get'>
              
              <td><a href='indexfa.php?x=$grain&z=$mst&pname=$tempga'><input type='button' class='btn btn-info' value='send'></a></td>
              <td><a href='indexfa.php?y=$grain&z=$mst&pname=$tempga'><input type='button' class='btn btn-info' value='Remove'></a></td>
              </form>
            </tr>";

  }         
         
          
          
                    //updating auctioning column
          if (isset($_GET['x']))
          {             
            $mea=$_GET['z'];
            $gra=$_GET['x'];
            $q1="select verified from listing where p_id='$gra' and measurement='$mea' and uid=$uid";
            $r1=mysqli_query($con,$q1);
            $s1=mysqli_fetch_array($r1);
            $a1=$s1['verified'];
                      
            if ($a1=='no')
             {
                msg('Your product is not yet verified hence cannot be sent for auction.\nplease wait for few hours and then try again');
             }
             else
              {
                $mea=$_GET['z'];
                $qre="UPDATE listing set auctioning='yes' where uid=$uid and p_id='$gra' and measurement='$mea'";
                $quer=mysqli_query($con,$qre)or die("error in insertion");
                msg('sent for auctioning sucessfully');
                $tempga2=$_GET['pname'];

                if ($mea=='quin') 
                {   

                $query2="insert into auction(product,fa_id) values('$tempga2','$uid')";
                $rs=mysqli_query($con,$query2);
                
                }

              }
            
          } 
            if (isset($_GET['y']))
             {   
                $pname1=$_GET['pname'];
                $mea=$_GET['z'];
                $gra=$_GET['y'];
                $q1="select auctioning from listing where p_id='$gra' and measurement='$mea'";
                $r1=mysqli_query($con,$q1);
                $s1=mysqli_fetch_array($r1);
                $a1=$s1['auctioning'];

                $qre2="delete from expert where uid=$uid and product='$pname1'";
                echo $qre2;
                $rs2=mysqli_query($con,$qre2);

                $qre="delete from listing where uid=$uid and p_id='$gra' and measurement='$mea'";
                $quer=mysqli_query($con,$qre)or die("error in insertion");

                msg('Removed from listing sucessfully');
                echo "<script>location='indexfa.php'</script>";
                echo $qre;
              
          }     
}      
           
          // body for second table
            echo "
          </tbody>
            </table>

              <hr style='border:0.1em solid black;'>
              <center><h2>Your Auctioned Items</h2></center>
              <hr style='border:0.1em solid black;'>
             <!-- About us ends -->
              <!--  Tables starting--> 
              <table class='table'>
                <thead class='thead-dark'>
                  <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Grain</th>
                    <th scope='col'>rating by expert</th>
                    <th scope='col'>your price</th>
                    <th scope='col'>in</th>
                    <th scope='col'>weightage</th>
                    <th scope='col'>Total Price</th>
                    <th scope='col'>Remove from auction</th>
                    
                  </tr>
                </thead>
                <tbody>
              ";

 
  $qr="SELECT p_id,rating,farmersprice,measurement,weight,totalrs FROM listing WHERE uid=$uid and auctioning='yes'" ;
  $quer=mysqli_query($con,$qr)or die("error in insertion");
  $count=mysqli_num_rows($quer);

  if (($count))
   {
  
    for ($i=0; $i <$count; $i++)
   {
    // Taking data row by row
          $row=mysqli_fetch_array($quer);
          $grain=$row['p_id'];
          $rating=$row['rating'];   
          $fprice=$row['farmersprice'];
          $mst=$row['measurement'];
          $w8=$row['weight'];
          $ttp=$row['totalrs'];
          $tempga;
          
          for ($j=0; $j <$count ; $j++) { 
            $qr="select p_name from msp where p_id='$grain'";
            $re=mysqli_query($con,$qr);
            $rw=mysqli_fetch_array($re);
            $tempga = $rw['p_name'];
          }
          //Showing data in table row by row
             echo "<tr>
              <th scope='row'>$i</th>
              <td id='gra'>$tempga</td>
              <td>$rating</td>
              <td>$fprice</td>
              <td>$mst</td>
              <td>$w8</td>
              <td>$ttp</td>
              <form method='post' method='?'>
              <td><a href='indexfa.php?a=$grain&b=$mst'><input type='button' class='btn btn-info' value='Remove'></a></td>
              </form>
            </tr>";

  }     
     if (isset($_GET['a']))
          {   
            
              $mea=$_GET['b'];
              $gra=$_GET['a'];
              $q1="select auctioning from listing where p_id='$gra' and measurement='$mea'";
              $r1=mysqli_query($con,$q1);
              $s1=mysqli_fetch_array($r1);
              $a1=$s1['auctioning'];
              if ($a1=='no')
              {
                msg('product is not send for auctioning hence cannot remove from auction.\nTo send for auction press the send for auction key');
              }
              else
              {
              $qre="UPDATE listing set auctioning='no' where uid=$uid and p_id='$gra' and measurement='$mea'";
              $quer=mysqli_query($con,$qre)or die("error in insertion");
              msg('Removed from auction sucessfully');  
              echo "<script>location='indexfa.php'</script>";
              }
          }         
   }        
          
?>


<!-- php code ending -->
  </tbody>
</table>


<hr style="border:0.1em solid black;">
<center><h2>Your Bidded Items</h2></center>
<hr style="border:0.1em solid black;">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Customer id</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
  </tr>
  </thead>
  <tbody>

    <?php 
       $qr="SELECT * FROM auction WHERE fa_id=$uid and blocked_amt>0" ;
       $quer=mysqli_query($con,$qr)or die("error in insertion");
       $count=mysqli_num_rows($quer);

       for ($i=0; $i<$count; $i++) { 
         $row=mysqli_fetch_array($quer);
         $pro=$row['product'];
         $cid=$row['cu_id'];
         $ba=$row['blocked_amt'];
         $date=$row['date'];

          echo "<tr>
              <th scope='row'>$i</th>
              <td id='gra'>$pro</td>
              <td>$cid</td>
              <td>$ba</td>
              <td>$date</td>
              </tr>";
       }
    ?>


</tbody>
</table>

</div>
</body>
</html>