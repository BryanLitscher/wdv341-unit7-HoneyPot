<?php

$name = $phonenumber = $email= $registrationtype = $clip = $fridaydinner = $saturdaylunch = $sundayawardbrunch = $specialrequests = "" ;
$honeypot = "";
$token="";

if($_SERVER["REQUEST_METHOD"]=="POST"){ 
	//print_r( $_POST );
	$name =  fixInput(array_key_exists("name", $_POST)?$_POST["name"]:"");
	$phonenumber = fixInput(array_key_exists("phonenumber", $_POST)?$_POST["phonenumber"]:"");
	$email= fixInput(array_key_exists("email", $_POST)?$_POST["email"]:"");
	$registrationtype = fixInput(array_key_exists("registrationtype", $_POST)?$_POST["registrationtype"]:"");
	$clip = fixInput(array_key_exists("clip", $_POST)?$_POST["clip"]:"");
	$fridaydinner = fixInput(array_key_exists("fridaydinner", $_POST)?$_POST["fridaydinner"]:"");
	$saturdaylunch = fixInput(array_key_exists("saturdaylunch", $_POST)?$_POST["saturdaylunch"]:"");
	$sundayawardbrunch = fixInput(array_key_exists("sundayawardbrunch", $_POST)?$_POST["sundayawardbrunch"]:"");
	$specialrequests = fixInput(array_key_exists("specialrequests", $_POST)?$_POST["specialrequests"]:"");
	$honeypot = array_key_exists("name123", $_POST)?$_POST["name123"]:"";
	$honeypot .= array_key_exists("phonenumber123", $_POST)?$_POST["phonenumber123"]:"";

}
	
function fixInput($s){
	$s = trim($s);
	$s = stripslashes($s);
	$s = htmlspecialchars($s);
	return $s;
}
	
//}

?>


<!DOCTYPE html>
<html >
<!-- http://localhost/wdv341/unit5/customerRegistrationForm.php -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>

#orderArea	{
	width:600px;
	border:thin solid black;
	margin: auto auto;
	padding-left: 20px;
}

#orderArea h3	{
	text-align:center;	
}
.error	{
	color:red;
	font-style:italic;	
}
.ohnoyoudont{
	opacity: 0;
	position: absolute;
	top: 0;
	left: 0;
	height: 0;
	width: 0;
	z-index: -1;
}

</style>




</head>

<body onload="setToken()">
<h1>WDV341 Intro PHP</h1>
<h2>Unit-5 and Unit-6 Self Posting - Form Validation Assignment


</h2>
<p>&nbsp;</p>


<div id="orderArea">
<form id="registration_form" name="form3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])//customerRegistrationForm.php ?>" >

  <h3>Customer Registration Form</h3>
      <p>
        <label for="textfield">Name:</label>
        <input type="text" name="name" id="textfield" value="<?php echo $name ?>">
      </p>
      <p>
        <label for="textfield2">Phone Number:</label>
        <input type="text" name="phonenumber" id="textfield2" value="<?php echo $phonenumber ?>">
      </p>
      <p>
        <label for="textfield3">Email Address: </label>
        <input type="text" name="email" id="email" value="<?php echo $email ?>">
      </p>
      <p>
        <label for="select">Registration: </label>
        <select name="registrationtype" id="select" >
          <option value="none" name="none" <?php echo $registrationtype==="none"?"selected":""; ?>>Choose Type</option>
          <option value="attendee" name="attendee" <?php echo $registrationtype==="attendee"?"selected":""; ?>>Attendee</option>
          <option value="presenter" name="presenter" <?php echo $registrationtype==="presenter"?"selected":""; ?>>Presenter</option>
          <option value="volunteer" name="volunteer" <?php echo $registrationtype==="volunteer"?"selected":""; ?>>Volunteer</option>
          <option value="guest" name="guest" <?php echo $registrationtype==="guest"?"selected":""; ?>>Guest</option>
        </select>
      </p>
      <p>Badge Holder:</p>
      <p>
        <input type="radio" name="clip" id="radio" value="clip" <?php echo $clip==="clip"?"checked":""; ?>>
        <label for="radio">Clip</label> <br>
        <input type="radio" name="clip" id="radio2" value="lanyard" <?php echo $clip==="lanyard"?"checked":""; ?>>
        <label for="radio2">Lanyard</label> <br>
        <input type="radio" name="clip" id="radio3" value="magnet" <?php echo $clip==="magnet"?"checked":""; ?> >
        <label for="radio3">Magnet</label>
      </p>
      <p>Provided Meals (Select all that apply):</p>
      <p>
        <input type="checkbox" name="fridaydinner" id="checkbox" <?php echo $fridaydinner?"checked":""; ?>>
        <label for="checkbox">Friday Dinner</label><br>
        <input type="checkbox" name="saturdaylunch" id="checkbox2" <?php echo $saturdaylunch?"checked":""; ?>>
        <label for="checkbox2">Saturday Lunch</label><br>
        <input type="checkbox" name="sundayawardbrunch" id="checkbox3" <?php echo $sundayawardbrunch?"checked":""; ?>>
        <label for="checkbox3">Sunday Award Brunch</label>
      </p>
      <p>
        <label for="textarea">Special Requests/Requirements: (Limit 200 characters)<br>
        </label>
        <textarea name="specialrequests" cols="40" rows="5" id="comment" ><?php echo $specialrequests ?></textarea>
      </p>
   
  <p>
  	<input class="ohnoyoudont" type="text" name="name123"  value="">
	<input class="ohnoyoudont" type="text" name="phonenumber123" value="">
    <input type="submit" name="submit" id="submit" value="Submit">
    <input type="reset" name="reset" id="reset" value="reset">
  </p>
</form>




<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	echo "<h3>Results of submisstion</h3>" . "\n" ;
	echo "<h4>Submitted Data</h4> ". "\n" ;
	foreach($_POST as $x => $x_value) {
		echo $x . " = " . $x_value  ;
		echo "<br>" . "\n";
	}
	echo "<h4>Honey Pot Data</h4> ". "\n" ;
	echo "name123 + phonenumber123 = " ;
	echo empty($honeypot)? "Empty": $honeypot;
}
?>

</div>



</body>
</html>