<?php
$lvalue = "経過時間を測定するプログラム";
$accessTime = date("Y-m-d H:i:s");     
print "現在時刻：".$accessTime;


$prevTime = fopen ("prevTime.txt","r+");
$prevTimeValue = fgets($prevTime);
rewind ( $prevTime );
fwrite ($prevTime, $accessTime);
fclose ($prevTime);

print "\n前回アクセス時刻：".$prevTimeValue;
$datetime1 = new DateTime($prevTimeValue);
print "\n". $datetime1->format('%H:%I:%S');
$datetime2 = new DateTime($accessTime);
$diffTime = $datetime1->diff($datetime2);
print $diffTime->format('%H:%I:%S');
$lValue .= "\n前回アクセスからの経過時間：".$diffTime->format('%H:%I:%S');
print "最後のプリント：". $lvalue;
?>

