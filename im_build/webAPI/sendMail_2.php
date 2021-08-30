<?php
require_once("Mail.php");
$params = array(
  "host" => "smtp.lolipop.jpp",
  "port" => 465,
  "auth" => true,
  "username" => "tanbo-camera@kawagoesatoyama.ciao.jp",
  "password" => "q6--osTJlPXkI1PB3biBDsn"
);
$mailObject = Mail::factory("smtp", $params);
$recipients = "";
$headers = array(
  "To" => "haya@mac.com",
  "From" => "tanpo-camera@kawagoesatoyama.cial.jp",
  "Subject" => mb_encode_mimeheader("テストメール")
);
$body = "日本語メールのテストです。これはロリポップから配信しています。";
$body = mb_convert_encoding($body, "ISO-2022-JP", "auto");
$mailObject -> send($recipients, $headers, $body);
?>