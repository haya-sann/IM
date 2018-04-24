<?php
$accessTime = date("Y-m-d H:i:s");     
$prevTime = fopen ("prevTime.txt","w+");
$prevTimeValue = fgets($prevTime);
$fwrite = fwrite ($prevTime, $accessTime);

$prevTimeValue = "2018-04-24 13:17:14.904665";
print $prevTimeValue;
$accessTime = "2018-04-24 13:30:39.805943";
$datetime1 = new DateTime($prevTimeValue);
$datetime2 = new DateTime($accessTime);
$diffTime = $datetime1->diff($datetime2);
print $diffTime->format('%H:%I:%S');
$lValue .= "\n前回アクセスからの経過時間：".$diffTime->format('%H:%I:%S');
print ($lvalue);
?>

