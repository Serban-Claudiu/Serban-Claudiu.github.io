<?php

// Define your email address - where to send messages - here
define("MAIL_TARGET","contact@webhosting-ieftin.ro");

// Here you can redefine error messages
define("errorName","Invalid name! It must be at least 2 characters long");
define("errorEmail","Invalid email address!");
define("errorMsg","Invalid message! It must be at least 10 characters long");

function createForm($name="",$email="",$message="",$error1="",$error2="",$error3=""){
?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
          <tr><td>Name: </td><td class="error"><?php echo $error1; ?></td></tr>
          <tr><td colspan="2"><input class="text" type="text" name="name" value="<?php echo $name; ?>"></td></tr>
          <tr><td>Email:</td><td class="error"><?php echo $error2; ?></td></tr>
          <tr><td colspan="2"><input class="text" type="text" name="email" value="<?php echo $email; ?>"></td></tr>
          <tr><td>Message:</td><td class="error"><?php echo $error3; ?></td></tr>
          <tr><td colspan="2"><textarea cols="40" rows="6" name="message"><?php echo $message; ?></textarea></td></tr>
          <tr><td colspan="2"><br/><input class="text" type="submit" name="submitBtn" value="Send"></td></tr>
        </table>
      </form>
<?php
}
   
function isValidEmail($email){
   $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
     
   if (eregi($pattern, $email)){
      return true;
   }
   else {
      return false;
   }   
}

function sendMail($name,$email,$message){
    
    $subject = "Message from website";
    $from    = "From: $name <$email>\r\nReply-To: $email\r\n"; 
    $header  = "MIME-Version: 1.0\r\n"."Content-type: text/html; charset=iso-8859-1\r\n";
    $content = htmlspecialchars($message);
    
    $content = wordwrap($content,70);
    mail(MAIL_TARGET,$subject,$content,$from.$header);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro Contact Form</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div id="caption">Contact us</div>
      <div id="icon">&nbsp;</div>
<?php if (!isset($_POST['submitBtn']))  { 
    createForm();
} else  { 
      $name    = isset($_POST['name']) ? $_POST['name'] : "";
      $email   = isset($_POST['email']) ? $_POST['email'] : "";
      $message = isset($_POST['message']) ? $_POST['message'] : "";
      
      $error = false;
      
      if (strlen($name)<2) {
          $error = true;
          $error1 = errorName;
      }
      if (!isValidEmail($email)) {
          $error = true;
          $error2 = errorEmail;
      }
      if (strlen($message)<10) {
          $error = true;
          $error3 = errorMsg;
      }
    
      if ($error){
         createForm($name,$email,$message,$error1,$error2,$error3); 
      }
      else {
          sendMail($name,$email,$message);
    ?>
      
      <div id="result">
        <table width="100%">
          <tr><td>
            Thanks for your message!
          </td></tr>
        </table>
     </div>
<?php            
    }
}
?>
    <div>
</body>   