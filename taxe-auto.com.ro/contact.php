<?php 
$your_email ='serban@bistriceanu.eu';// <<=== update to your email address

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
		$errors .= "\n Numele si email-ul sunt necesare. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Email invalid!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n Codul captcha nu este corect!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="Mesaj din cadrul site-ului taxe-auto.com.ro";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "Salut /n /n Ai primit un mesaj din partea lui $name \n\n".
		"Numele: $name \n\n".
		"Email: $visitor_email \n\n".
		"Mesajul: \n\n ".
		"$user_message \n\n".
		"Adresa IP: $ip\n\n";	
		
		$headers = "De la: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		header('Location: taxe-auto.com.ro/contact.php');
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


<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Cumpara online rovinieta si asigurarea RCA</title>
	<base href="http://www.taxe-auto.com.ro"/>
	<meta http-equiv="content-type" content="text/html">
	<meta http-equiv="X-UA-Compatible" content="IE=9;chrome=16" />
	<meta name="description" content="Cel mai ieftin rca in 2015. Gasesti cel mai bun pret pentru asigurarea rca. Cumperi online polita de asigurare rca si ai livrare gratuita. Cea mai ieftina rovinieta in 2015. Cumperi online rovinieta si o primesti imediat pe e-mail.">
	<meta name="keywords" content="rca, tarife rca, asigurari rca, rca ieftin, preturi rca, rca 2015, rca 2015, rca dacie, rca auto, rca motociclete, rca remorca, rca unita, rca bcr, rca broker, rca asigurari, asigurari auto, rovinieta, roviniete, rovigneta, rovinietă 2015, rovinietă 2015, roviniete, rovinetă, calcul rovinietă, rovignete, taxa drum, taxa de drum 2015, rovinietă 2015 preț, rovignietă, cât costă rovinieta, calculator rovinietă">
	<meta name="abstract" content="rovinieta, roviniete, rovigneta, rca, asigurari rca, tarife rca">
	<meta name="page-topic" content="rovinieta, roviniete, rovigneta, rca, asigurari rca, tarife rca">
	<meta http-equiv="content-language" content="ro">
	<meta name="language" content="romanian,ro,romana">
	<meta name="rating" content="General">
	<meta name="audience" content="All">
	<meta name="robots" content="index, follow">
	<meta name="publisher" content="taxe-auto.com.ro">
	<meta name="distribution" content="global">
	<link rel="SHORTCUT ICON" href="favicon.png">
	<link href="taxeauto.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/JavaScript" src="funcs.js"></script>

<!-- define some style elements-->
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
}
</style>	
<!-- a helper script for vaidating the form-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>



</head>

<body>

<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
?>
<div id='contact_form_errorloc' class='err'></div>

	<div id="top_container">
		<div id="header">
			<div id="logo"></div>
			<div id="slogan">Cumpară online rovinieta și asigurarea RCA</div>
			<div class="clearboth"></div>
			<div id="menu">
				<ul>	
					<li class="menu_mar"></li>
					<li>
						<a href="index.html" class="menu">Acasă</a>
					</li>
					<li class="menu_sep"></li>
						<li>
							<a href="rovinieta.html" class="menu">Rovinieta</a>
						</li>
					<li class="menu_sep"></li>
						<li>
							<a href="rca.html" class="menu">RCA</a>
						</li>
					<li class="menu_sep"></li>
						<li>
							<a href="contact.html" class="menu">Contact</a>
						</li>
					<li class="menu_sep"></li>
				</ul>
			</div>
		<div id="submenu">
			<div id="url">www.taxe-auto.com.ro</div>
		</div>
	</div>


	<div id="middle_container">
		<div id="content" style="width:560px">
			<div id="content_title">Contact</div>
			<div id="cont1">
			<div id="header1"></div>
				<div class="text txt">
<form method="POST" name="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
						<table border="0" align="center" cellpadding="2" cellspacing="5">
		                <tbody>
							<tr>
								<td align="right" class="text"><strong>* Nume / Prenume:</strong></td>
					            <td><input type="text" name="name" value='<?php echo htmlentities($name) ?>' size="35" align="left"></td>
						    </tr>
							<br />
							<tr>
							    <td align="right" class="text"><strong>* Email:</strong></td>
								<td><input type="text" name="email" value='<?php echo htmlentities($visitor_email) ?>' size="35" align="left"></td>
							</tr>
							<br />
				            <tr>
					            <td align="right" class="text"><strong>Telefon:</strong></td>
						        <td><input type="text" name="phone" value="" size="35" align="left"></td>
							</tr>
							<br />
		                    <tr>
				                <td align="right" valign="top" class="text"><strong>* Mesaj:</strong></td>
						        <td><textarea name="msg" cols="40" rows="6"><?php echo htmlentities($user_message) ?></textarea></td>
							</tr>
							<br />
				            <tr>
								<td align="right" valign="top" class="text"><br /><strong>* Imagine captcha:</strong></td>
								<td align="left" class="text"><strong><img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ></strong></td>
								<br />
						    </tr>
							<tr>
								<td></td>
								<td><label for='message'>Introduceti codul mai jos :</label></td>
								<br />
							</tr>
							<tr>
								<td align="right" valign="top" class="text"><strong>* Cod captcha:</strong></td>
								<td><input id="6_letters_code" name="6_letters_code" type="text"></td>
								<br />
							</tr>
							<tr>
								<td></td>
								<td><small>Nu vedeti imaginea? Apasati <a href='javascript: refreshCaptcha();'>aici</a> pentru a reincarca imaginea</small></td>
							</tr>
							<br />
					        <tr>
							    <td></td>
								<td>
									<input type="submit" name="Submit" value="Trimite" class="btn">
									<div class="btn_sh"></div>					
								</td>
				            </tr>
							<br />
					        <tr>
						        <td height="40"></td>
							    <td class="text">Campurile marcate cu * sunt obligatorii ! </td>
							</tr>
		                </tbody>
						</table>
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />

			        </form>



						<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Introduceti numele"); 
frmvalidator.addValidation("email","req","Introduceti adresa de email"); 
frmvalidator.addValidation("email","email","Introduceti o adresa de email valida"); 
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>








				</div>
			</div>
		</div>
	</div>































	<div id="rightmenu" style="width:435px">
		<div style="text-align:center">
			<a href='http://bit.ly/ro_vinieta_link' target='_blank' rel='nofollow'><img src='http://bit.ly/ro_vinieta_img' alt='Rovinieta' title='Cumpara Rovinieta online' border='0' width="150" height="150"/></a>
			<br />
			<a href='http://bit.ly/ro_rca2' target='_blank' rel='nofollow'><img src='http://bit.ly/ro_rca2_img' alt='RCA-Ieftin' title='Cumpara Asigurarea RCA online' border='0' width="150" height="150"/></a>
			<br />
			<a href='http://bit.ly/cartusel' target='_blank' rel='nofollow'><img src='http://bit.ly/cartusel_img' alt='Cartusel' title='Cumpara cartuse pentru imprimanta ta' border='0' width="150" height="150"/></a>
			<br />
			<a href='http://bit.ly/best_kids_link' target='_blank' rel='nofollow'><img src='http://bit.ly/best_kids_img' alt='Best Kids' title='Cumpara jucarii la lichidari de sezon' border='0' width="150" height="150"/></a>
			<br />
			<a href='http://bit.ly/libris_link' target='_blank' rel='nofollow'><img src='http://bit.ly/libris_img' alt='Libris' title='Cumpara carti online cu transport gratuit prin curier' border='0' width="150" height="150"/></a>
			<br />
			<br />
		</div>		 
	</div>



</body>

</html>