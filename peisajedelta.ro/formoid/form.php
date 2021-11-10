<?php

define('EMAIL_FOR_REPORTS', 'contact@webhosting-ieftin.ro');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Va multumesc pentru interesul acordat! Va voi contacta in cel mai scurt timp posibil!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-flat-green.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-flat-green.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form class="formoid-flat-green" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Formular de contact</h2></div>
	<div class="element-name"  title="Completati prenumele si numele dumneavoastra" <?frmd_add_class("name")?>><label class="title">Numele<span class="required">*</span></label><span class="nameFirst"><input  type="text" size="8" name="name[first]" required="required"/><label class="subtitle">Prenumele</label></span><span class="nameLast"><input type="text" size="14" name="name[last]" required="required"/><label class="subtitle">Numele</label></span></div>
	<div class="element-email"  title="Completati adresa dumneavoastra de email" <?frmd_add_class("email")?>><label class="title">Email<span class="required">*</span></label><input class="large" type="email" name="email" value="" required="required"/></div>
	<div class="element-textarea"  title="Completati mesajul dumneavoastra" <?frmd_add_class("textarea")?>><label class="title">Mesajul<span class="required">*</span></label><textarea class="medium" name="textarea" cols="20" rows="5" required="required"></textarea></div>

<div class="submit"><input type="submit" value="Trimiteti"/></div></form>
<script type="text/javascript" src="<?=dirname($form_path)?>/formoid-flat-green.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>