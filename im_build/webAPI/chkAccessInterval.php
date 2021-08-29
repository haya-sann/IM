<?php
echo "Today is " . date("Y/m/d") . "\n";
echo "Today is " . date("Y.m.d") . "\n";
echo "Today is " . date("Y-m-d") . "\n";
echo "Today is " . date("l") . "\n";
echo "The time is " . date("h:i:sa") . "\n";
#ファイルから前回アクセス時刻を読み取る
$myfile = fopen("prevTime.txt", "r") or die("Unable to open file!");
$prevAccessTime =  fgets($myfile);
fclose($myfile);

$TimeRug = strtotime(date("h:i:sa") - $prevAccessTime );

echo "前回アクセスからの時間差： " . date("Y-m-d h:i:sa", $TimeRug) . "\n";
?>
