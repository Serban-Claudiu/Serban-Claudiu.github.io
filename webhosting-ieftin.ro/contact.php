<?php


$to =  'contact@webhosting-ieftin.ro';
$subject = 'Mesaj de pe www.webhosting-ieftin.ro';
$message = $_POST['name'] . ' a adresat urmatoarea intrebare: ' . $_POST['message'];
$headers = 'From: ' . $_POST['email'] . "\r\n" .
        'Reply-To: ' . $_POST['email'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

$result = mail($to, $subject, $message, $headers);


echo '<META HTTP-EQUIV="Refresh" Content="1; URL=http://www.webhosting-ieftin.ro">';

if($result) {
    echo 'Mesajul a fost trimis. Multumim!';
} else {
    echo 'Mesajul nu a fost trimis. Va rugam sa incercati mai tarziu.';
}


?>
