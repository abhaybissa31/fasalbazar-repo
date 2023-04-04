<?php 
   session_start();
   $type= $_SESSION['type'];
   
if ($type=="fa" or $type=="FA"){
echo"
<nav class='navbar navbar-expand-sm bg-dark navbar-dark fixed-top navbar-brand-center'>
  	<h1 class='navbar-brand' style='font-size:1.8em;position:relative;left:1.2em;'>FASAL BAZAR</h1>
  <ul class='navbar-nav ml-auto' id='topul'>
    <li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/farmer/indexfa.php'>Home</a> </li>
  	<li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/payment/wallet.php'>Wallet</a> </li>
    <li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/payment/history.php'>Transaction</a> </li>
  	<li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/farmer/profile.php'>Profile</a> </li>
  	<li class='nav-item'> <a class='nav-link' href='/logout.php'>Logout</a></li>
  </ul>
</nav>";
}else{
    echo"
<nav class='navbar navbar-expand-sm bg-dark navbar-dark fixed-top navbar-brand-center'>
  	<h1 class='navbar-brand' style='font-size:1.8em;position:relative;left:1.2em;'>FASAL BAZAR</h1>
  <ul class='navbar-nav ml-auto' id='topul'>
    <li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/customer/cindexfa.php'>Home</a> </li>
  	<li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/payment/wallet.php'>Wallet</a> </li>
    <li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/payment/history.php'>Transaction</a> </li>
  	<li class='nav-item'> <a class='nav-link' href='http://krishi.rf.gd/customer/profile.php'>Profile</a> </li>
  	<li class='nav-item'> <a class='nav-link' href='/logout.php'>Logout</a></li>
  </ul>
</nav>";
}
  ?>
