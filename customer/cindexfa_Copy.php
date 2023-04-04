<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="cindexfa.css">
	<title></title>
</head>
<body>
<?php include('Main_index.html');?>
<!-- About us starting -->
<div class="jumbotron" id="jimg">	
	<div id="jb" >
		<div class="jtext">
		<div class="container">
		<div class="jheading"><h1>ABOUT US</h1></div>
						Online trading of agricultural commodities is a step towards blooming of farmers and their livelihood where they can get a justified worth of their commodities. Fasal Bazar has came out with the notion to provide price discovery to the farmers or to make offline mandi operation smooth and secure via online portal and payment settlement. It introduces a concept of direct selling of farmer produce through e commerce resulting in to time saving and digitalization of all records. Better Price discovery of agri commodities for farmers/ traders/ corporates. Conveyance to farmer community through availability of storage, commodity grading, lodging and boarding facilities for farmers at the locations. Reliable & Modest platform to get fair price of agri produce. Live commodity rates are available to evaluate market demand
</div>
</p>
</div>
</div>
</div>

<div class="container">
	<hr style="border:0.1em solid black;">
	<center><h2>Items for auctioning</h2></center>
	<hr style="border:0.1em solid black;">

	<!-- Table starting -->
	<table class='table table-striped table-hover  table-bordered'>
  <thead class='bg-dark text-white'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Image</th>
      <th scope='col'>Product_name</th>
      <th scope='col'>uid</th>
      <th scope='col'>name</th>
      <th scope='col'>rating</th>
      <th scope='col' id='fa'>Farmer's price</th>
      <th scope='col'>msp</th>
      <th scope='col'>weight</th>
      <th scope='col'>total rs</th>
      <th scope='col'>Product report</th>
      <th scope='col' id='act'>Bidd</th>
    </tr>
  </thead>

  <?php
  	include('fn.php');

   date_default_timezone_set('Asia/Kolkata');
    $date=date('H');


  	// Fetching from listing table
  	$qr1="select sno,uid,name,rating,farmersprice,measurement,weight,totalrs,p_id from listing where auctioning='yes' and measurement='quin'";
  	$res1=mysqli_query($con,$qr1);
  	$count1=mysqli_num_rows($res1);

  	for ($i=0; $i <$count1 ; $i++) 
  	{ 	
  		$row=mysqli_fetch_array($res1);
  		$uid=$row['uid'];
  		$name=$row['name'];
  		$rating=$row['rating'];
  		$fp=$row['farmersprice'];
  		$w8=$row['weight'];
  		$tts=$row['totalrs'];
  		$pid=$row['p_id'];
  		$sno=$row['sno'];
  		// accesing msp table
  		for ($j=0; $j <$count1 ; $j++) { 
  			$qr="select p_name, p_hindiname,msp,p_pic from msp where p_id='$pid'";
            $re=mysqli_query($con,$qr);
            $rw=mysqli_fetch_array($re);
            $tempga = $rw['p_name'];
            $tempga=strtoupper($tempga);
            $phi= $rw['p_hindiname'];
            $msp= $rw['msp'];
            $img= $rw['p_pic'];
            $phi=strtoupper($phi);
  		}
  		echo"<tr>
      	<th scope='row'>$i</th>
      	<td><center><img src='$img' class='imgsr'><center></td>
      	<td>$tempga($phi)</td>
      	<td>$uid</td>
      	<td>$name</td>
      	<td>$rating</td>
      	<td>$fp</td>
      	<td>$msp</td>
      	<td>$w8</td>
      	<td>$tts</td>
         <td><a href='report.php?pname=$tempga&uid=$uid'>Check report</td>
        ";
        if ($date=="06 PM") {
        // $date=="06 PM"
         echo "<td><a href='bid.php?x=$sno'><input type='button' class='btn btn-info' value='bid' name='sub'></a></td>";

       
        }
        else
          echo"<td><a href='bid.php?x=$sno'><input type='button' class='btn btn-info' value='bid' disabled></a></td>";

      
	 echo"</tr>";
	 }//for loop ending



?>
</table>
</div>	<!-- container ending -->
</body>
</html>