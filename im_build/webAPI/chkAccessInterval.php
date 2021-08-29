<?php
echo "Today is " . date("Y/m/d") . "\n";
echo "Today is " . date("Y.m.d") . "\n";
echo "Today is " . date("Y-m-d") . "\n";
echo "Today is " . date("l") . "\n";
echo "The time is " . date("h:i:sa") . "\n";
$d=strtotime("2021-08-29 17:00:02.722604");
echo "前回アクセスの時間： " . date("Y-m-d h:i:sa", $d);
?>
