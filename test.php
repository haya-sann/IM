<?php
$cmd = "git pull"; 
exec($cmd, $arr, $res); 
var_dump($arr); 
var_dump($res); 
$checkSrting = "Already up to date.";
$res_2=in_array($checkString,$arr,true); //第3因数にtrueを渡さないとうまく比較できない
var_dump($res_2);
?>

