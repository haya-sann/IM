<?php
$prevTimeValue = "2018-04-24 13:17:14.904665";
$accessTime = "2018-04-24 13:30:39.805943";
$datetime1 = new DateTime($prevTimeValue);
$datetime2 = new DateTime($accessTime);
$diffTime = $datetime1->diff($datetime2);
$lValue .= "\n前回アクセスからの経過時間：".$diffTime->format('%H:%I:%S');
echo $lvalue;
?>
