<?php
$cmd = "git pull"; 
exec($cmd, $arr, $res); 
var_dump($arr); 
var_dump($res); 
$res_2=in_array('Already',$arr); //なぜ，検出されない？
var_dump($res_2);
?>

