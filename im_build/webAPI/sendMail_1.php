<?php
// the message
$msg = "1行目です\nコンニチワ、2行目です";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("haya@mac.com","HPHでメール送信",$msg);
?>
