<?php
// メールを送信する
$mail_from = 'tanbo-camera@kawagoesatoyama.jp';       // 送信元メールアドレス
$smtp_addr = 'smtp.lolipop.jp';   // SMTP サーバ
$details   = array('port'     => 465,
                   'username' => 'tanbo-camera@kawagoesatoyama.ciao.jp',
                   'password' => 'q6--osTJlPXkI1PB3biBDsn',
                   'auth'     => 'crammd5',   // ポイント
             );
 
$smtp = new Zend_Mail_Transport_Smtp($smtp_addr, $details);
Zend_Mail::setDefaultTransport($smtp);
 
// 文字コードを指定する
$zMail = new Zend_Mail('utf-8');
 
// 送信元アドレス
$zMail->setFrom($mail_from, '送信元'); 
// 宛先アドレス
$zMail->addTo('dst@exsample.com', '宛先'); 
 
// タイトル
$zMail->setSubject('田んぼカメラ通信'); 
 
$body = "田んぼカメラが異常です\n●●分にわたってデータ入荷がありません";
     
// 本文
$zMail->setBodyText($body); 
     
// 送信
$zMail->send();
?>
