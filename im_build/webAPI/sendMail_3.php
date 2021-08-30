<?php
//https://pg-happy.jp/mb-send-mail-rentalserver.html
//（PHP）mb_send_mailをレンタルサーバーで使ってメール送信する方法
//lolipopで動く。
//しかし、文字化け、迷惑メール扱いされる。

const MAILTO = "haya@mac.com";  //宛先メールアドレス
const SUBJECT = "サンキューメール";
$content = "レンタルサーバーでのメール送信テストです。\n";
$content .= "このメールを受け取ったということはちゃんと送信されていますね。";
 
$headers = <<<HEAD
From : tanbo-camera@kawagoesatoyama.jp //送信元メールアドレス
Return-Path: tanbo-camera@kawagoesatoyama.jp //送信元メールアドレス
Content-Type: text/plain;charset=ISO-2022-JP //おまじない（無くてもいいっぽい）
HEAD;
 
$is_success = mb_send_mail(MAILTO, SUBJECT, $content, $headers);
 
if(!$is_success) {
    echo "失敗";
    die('メール送信失敗');
}
echo "終わったよ"; 
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>メール送信完了画面</title>
</head>
<body>
<p>メール送信が完了しました。</p>
</body>
</html>