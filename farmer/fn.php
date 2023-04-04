<?php 
function msg($msg)
  {
    echo "<script>alert('$msg')</script>";
  }
function sendto($loca)
{
  echo "<script>location='$loca'</script>";

}
 $con=mysqli_connect('sql113.epizy.com','epiz_31531759','krishi1289','epiz_31531759_krishi') or die("Error in connection");
?>