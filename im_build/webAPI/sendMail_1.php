<?php
//https://www.w3schools.com/php/func_mail_mail.asp
//出解説されていた、すごく簡単な方法。ちゃんと流れる。

function alartMail($NoAccessPeriod ){
    $to = "haya.biz@gmail.com";
    $subject = "指定時間以内にアクセスがありません";
    $headers = "From: tanbo-camera@kawagoesatoyama.jp" . "\r\n";
    //  . "CC: haya@mac.com";
    
    // the message
    $alartMessage = $NoAccessPeriod . "分間過ぎても田んぼカメラから報告が上がってきません\nhttps://console.soracom.io/ にアクセスして確認してください。";
    
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($alartMessage,70);
    
    // send email
    mail($to,$subject,$alartMessage,$headers);
    echo "注意喚起のためにメールを送信しておきました";
    
}

?>
