<?php 
$your_email ='ag@katanalondon.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$user_message = $_POST['message'];
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="New form submission";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user  $name submitted the contact form:\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		header('Location: thanks.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    

  	<!--
	===================================
	Designed & built by Katana
	E-mail: info@katanalondon.com
	Web: http://www.katanalondon.com
	===================================

	--> 


	


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<link type="text/css" rel="stylesheet" href="css/responsive.css" />
<link type="text/css" rel="stylesheet" href="css/styles.css" />
<!--[if lte IE 8]>  
  <link type="text/css" rel="stylesheet" href="css/iefix.css">
<![endif]-->
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript">
$(document).ready(function () {	
	
	$('.nav li').hover(
		function () {
			//show its submenu
			$('ul', this).stop().slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).stop().slideUp(100);			
		}
	);
	
});
	</script>
<script src="js/jquery-1.9.1.min.js"></script>
<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>	
<title>contact | Bluebottle Technologies</title>
<style>
label,a, body 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}
.err
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: red;
	padding: 20px;
}
</style>
</head>

<body>
<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
?>
<div class="wrap">
    <div class="masthead">
        <img src="images/menuend.png" width="50" height="130" />
        <a href="index.html"><img src="images/bluebottle.png" width="201" height="46" class="logo" /></a>
        <img src="images/eye.png" width="24" height="30" class="eye" />
        <div class="login">
        	<img src="images/login-shaddow.jpg" width="13" height="130" />
            <input name="" type="text" placeholder=" USERNAME" />
            <input name="" type="password" placeholder=" PASSWORD" />
            <div class="loginbuton"><center>LOGIN</center></div>
            <a href="#">REGISTER</a>|<a href="#">Forgot Password</a>
        </div><!--/login-->
        <a href="http://www.facebook.com" target="_blank"><img src="images/facebook.jpg" width="35" height="35" class="socialtop fb" /></a>
        <a href="http://www.twitter.com" target="_blank"><img src="images/twitter.jpg" width="35" height="35" class="socialtop tw" /></a>
    </div><!--/masthead-->
    <div class="nav">
            <ul>
                <li id="ml1"><a href="index.html">home</a></li>
        		<li id="ml2"><a href="about.html">about</a></li>
                <li id="ml3"><a href="sectors.html">sectors</a>
                	<div id="mdl3" class="menudownlist">
                    	<div class="mdl"><a href="government.html">GOVERNMENT</a></div>
                        <div class="mdl"><a href="commercial.html">COMMERCIAL</a></div>
                    </div>
                </li>
                <li id="ml4"><a href="solutions.html">solutions</a>
                	<div id="mdl4" class="menudownlist" style="width:250px;">
                    	<div class="mdl"><a href="private-secure-networks.html">PRIVATE SECURITY NETWORKS</a></div>
                      <div class="mdl"><a href="compound-perimeter-border.html">COMPOUND PERIMETER &amp; BORDER</a></div>
                      <div class="mdl"><a href="retail.html">RETAIL</a></div>
                      <div class="mdl"><a href="emergency-response.html">EMERGENCY RESPONSE (ERIC)</a></div>
                  </div>
                </li>
                <li id="ml5"><a href="products.html">products</a>
                	<div id="mdl5" class="menudownlist">
                    	<div class="mdl"><a href="gsm.html">GSM</a></div>
                        <div class="mdl"><a href="i4g.html">I4G</a></div>
                        <div class="mdl"><a href="ip-networks.html">IP NETWORKS</a></div>
                        <div class="mdl"><a href="mobile-commerse.html">MOBILE COMMERCE</a></div>
                        <!--<div class="mdl"><a href="premier-cell.html">PREMIER CELL</a></div>-->
                        <div class="mdl"><a href="billing-platform.html">BILLING PLATFORM</a></div>
                        <div class="mdl"><a href="cyber-security.html">CYBER SECURITY</a></div>
                        <div class="mdl"><a href="back-haul.html">BACK HAUL</a></div>
                        <div class="mdl"><a href="geospatial-imagery.html">GEOSPATIAL IMAGERY</a></div>
                        <div class="mdl"><a href="asset-risk-management.html">ASSET RISK MANAGEMENT</a></div>
                    </div>
                </li>
                <li id="ml6"><a href="news.html">news</a></li>
                <li id="ml7"><a href="contact.php" style="color:#2c7cfa;">contact</a></li>
            </ul>
        </div><!--/nav-->
    <div class="page">
    	<h1><strong>CONTACT</strong></h1>
        	<div class="block">
                <form method="POST" name="contact_form" 
                action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
                <p>
                <label for='name'>Name: </label><input type="text" name="name" value='<?php echo htmlentities($name) ?>' style="float:right; width:260px;">
                </p>
                <p>
                <label for='email'>Email: </label><input type="text" name="email" value='<?php echo htmlentities($visitor_email) ?>' style="float:right; width:260px;">
                </p>
                <p>
                <label for='message'>Message:</label><textarea name="message" rows=8 cols=30 style="float:right;"><?php echo htmlentities($user_message) ?></textarea>
                </p>
                <div class="clear"></div>
                <p>
                <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
                <label for='message'>Enter the code above here :</label><br>
                <input id="6_letters_code" name="6_letters_code" type="text"><br>
                <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
                </p>
                <input type="submit" value="Submit" name='submit'>
                </form>
            </div><!--/block-->
            <div class="block">
            	<div id='contact_form_errorloc' class='err'></div>
            </div><!--/block-->            
        <div class="clear"></div>
    </div><!--/page-->
    <div class="footer">
        Copyright © 2012 Bluebottle Technologies. All Rights Reserved |<a href="sitemap.html">Site Map</a>|<a href="terms.html">Terms & Conditions</a>|<a href="privacy.html">Privacy Policy</a>|<a href="http://www.clean-revolution.com/" target="_blank">Site Credits</a>
    </div><!--/footer-->
</div><!--/wrap-->
<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</body>
</html>
