<?php
//https://www.w3schools.com/php/func_mail_mail.asp
//出解説されていた、すごく簡単な方法。ちゃんと流れる。

$to = "iPhone.Concier@gmail.com";
$subject = "My subject";
$headers = "From: tanbo-camera@kawagoesatoyama.jp" . "\r\n";
//  . "CC: haya@mac.com";

// the message
$msg = "1行目です\nコンニチワ、2行目です";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($to,$subject,$msg,$headers);

?>