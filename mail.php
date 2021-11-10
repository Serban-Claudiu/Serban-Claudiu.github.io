<?php
if ($_POST) {
    $name = $_POST['name'];
    $email= $_POST['email'];
    $message = $_POST['text'];
    $to      = "serban@bistriceanu.ro";
    $subject = "Formular de contact de pe bistriceanu.ro";
    $formcontent="Mesaj primit prin formularul de contact de pe site-ul bistriceanu.ro \r\n\r\n\r\n".$name." v-a trimis urmatorul mesaj: \r\n".$message;

    $header  = "MIME-Version: 1.0" . PHP_EOL;
    $header .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
    //Additional headers
    $header .= "From: $name  <$email>" . PHP_EOL;
    $header .= "Content-type: text/html" . PHP_EOL;
    $header .= "Reply-To: $email" . PHP_EOL";


    //send email   
    mail($to, $subject, $formcontent, $header);
}



?>

