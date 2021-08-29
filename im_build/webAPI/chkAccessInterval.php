<?php
echo "Today is " . date("Y/m/d") . "\n";
echo "Today is " . date("Y.m.d") . "\n";
echo "Today is " . date("Y-m-d") . "\n";
echo "Today is " . date("l") . "\n";
echo "The time is " . date("h:i:sa") . "\n";
$d=strtotime("10:30pm April 15 2014");
echo "前回アクセスの時間： " . date("Y-m-d h:i:sa", $d);
?>
