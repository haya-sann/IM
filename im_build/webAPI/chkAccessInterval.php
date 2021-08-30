<?php
#https://www.w3schools.com/php/func_date_microtime.asp
#にライブ解説がある。
include 'sendMail_1.php';
date_default_timezone_set("Asia/Tokyo");

#ファイルから前回アクセス時刻を読み取る
$myfile = fopen("prevTime.txt", "r") or die("Unable to open file!");
$prevAccessTime =  fgets($myfile);
fclose($myfile);
echo "前回アクセス時刻：" . $prevAccessTime . "<br>";
$previousTime = date_create($prevAccessTime);
$time_Now = date_create("now");
echo "現在時刻＝" . date_format ($time_Now, "H:i:s");
$delayedTime = date_diff($previousTime,  $time_Now);

echo "　　前回アクセスからの時間差： " . $delayedTime->format('%H:%i:%s') . "<br>";
$NoAccessPeriod = ($delayedTime->format("%h"))*60 + $delayedTime->format("%i");

if ($NoAccessPeriod > 60 ) {
    echo "１時間以上アクセスがありません:". $NoAccessPeriod . "分" ;
    alartMail($NoAccessPeriod);    
}
?>
