<?php
$accessTime = date("Y-m-d H:i:s");     
print "現在時刻：".$accessTime;


$prevTime = fopen ("prevTime.txt","w+");
$prevTimeValue = fgets($prevTime);
$fwrite = fwrite ($prevTime, $accessTime);

print "\n前回アクセス時刻：".$prevTimeValue;
$datetime1 = new DateTime($prevTimeValue);
$datetime2 = new DateTime($accessTime);
$diffTime = $datetime1->diff($datetime2);
print $diffTime->format('%H:%I:%S');
$lValue .= "\n前回アクセスからの経過時間：".$diffTime->format('%H:%I:%S');
print ($lvalue);
?>

