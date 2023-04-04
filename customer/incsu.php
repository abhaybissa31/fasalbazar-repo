<!-- html code starting -->
<!DOCTYPE html>
<html>
<head>
	<title>Signup/साइन अप करें</title>
	<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

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
</head>


<link rel="stylesheet" type="text/css" href="csssu.css">


<body>

<div class="container"><!--Container class-->
<div class="head"><!--Heading section ending-->

  <hr>
	<h1 class="title">FASAL BAZAR</h1>
  <hr>  

</div><!--Heading section ending-->


<!--Signup Form Starting-->
<div class="form1">
<th><h2>Create New Account</h2></th>
  <form method="post" action="su.php">
    <table class="tb1" cellpadding="20%">
    
    <tr>
    <!--farmer name starting -->
    <td><label for="un">Name:</label><br>
    <input type="text" name="un" id="un" class="un" size="30" value="<?php echo $un;?>" placeholder="नाम" required  oninvalid="this.setCustomValidity('कृपया अपना नाम यहाँ रिक्त स्थान में भरें')"
  oninput="this.setCustomValidity('')"></td><br>
    <!--farmer name ending -->
    </tr>

    <tr>
      <!-- farmer mobile number starting -->
    <td><label for="pn">Phone</label><br>
    <input type="tel" id="pn" name="pn" placeholder="10 अंकों का मोबाइल नंबर" size="30" value="<?php echo $pn;?>" pattern="[0-9]{10}" required oninvalid="this.setCustomValidity('कृपया अपना मोबाइल नंबर यहाँ रिक्त स्थान में भरें')"
  oninput="this.setCustomValidity('')"><br></td>
    <!--  farmer monile number ending -->
    </tr>

    <tr>
    <!--  krishi id number starting -->
    <td><label for="kid">Krishi ID</label><br>
    <input type="text" name="kid" id="kid" size="30" value="<?php echo $kid;?>" placeholder="12 अंकों का कृषि नंबर" pattern="[0-9]{12}" required oninvalid="this.setCustomValidity('कृषि पहचान संख्या के साथ रिक्त स्थान को भरें')"
  oninput="this.setCustomValidity('')"></td><br>
  <!-- krishi id number endind -->
    </tr>

    <tr>
      <!--krishi id image starting -->
    <td><label for="idimg">Krishi ID Image</label></br>
    <input type="file" name="idimg" id="idimg" value="<?php echo $kidp;?>" required
    oninvalid="this.setCustomValidity('कृषि पहचान संख्या के प्रमाणीकरण हेतु कृषि पहचान पत्र की फोटो प्रदान करें')"
  oninput="this.setCustomValidity('')"><br></td>
    <!-- krishi id image ending -->
    </tr>
    
    </table>
    <table class="tb2" style="position: relative;top:-19.5em;left:40em;"> 

    <tr>
      <!-- password starting  -->
    <td><label for="pwd">Password</label><br>
    <input type="password" name="pwd" id="pwd" size="30"  placeholder="पासवर्ड" required oninvalid="this.setCustomValidity('उपयोगकर्ता की पुष्टि के लिए पासवर्ड भरना अनिवार्य है')"
  oninput="this.setCustomValidity('')"><br></td>
    <!-- password endind -->
    </tr>

    <tr>
      <!--confirm password starting -->
    <td><label for="cpwd">Confirm Password</label><br>
    <input type="password" name="cpwd" id="cpwd" size="30" placeholder="पासवर्ड की पुष्टि कीजिये" required oninvalid="this.setCustomValidity('उपरोक्त पासवर्ड की पुष्टि करने के लिए कृपया वही पासवर्ड दोबारा दर्ज करें')"
  oninput="this.setCustomValidity('')"><br></td>
     <!-- confirm password ending -->
    </tr>

    <tr>
      <!-- farmer's address starting  -->
    <td><label for="ad1">Address:</label><br>
    <input type="text" name="ad1" id="ad1" size="30" value="<?php echo $addr;?>" placeholder="पता '100' अक्षर में" required oninvalid="this.setCustomValidity('घर एवं कार्यस्थल का पता दर्ज करना अनिवार्य है')"
  oninput="this.setCustomValidity('')"><br></td>
  <!--  farmer's address ending -->
    </tr>

    <tr>
     <!-- profile picture starting-->
    <td><label for="pp">Profile Picture</label><br>
    <input type="file" name="pp" id="pp" value="<?php echo $pp;?>"><br></td>
    <!-- profile picture ending -->
    </tr>

    <tr>
    <input type="submit" name="sb" class="sb">
    </tr>
  </table>
  </form>
</div><!--Signup Form Ending-->


</div><!--Container class end-->

</body>
</html> 