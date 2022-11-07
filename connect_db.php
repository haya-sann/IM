<?php
try{
    $conf = include ('defAtmos.php');
    $DB_DATABASE = 'LAA0710594-satoyama';
    $DB_USERNAME = $conf['user'];
    print ($DB_USERNAME); //Just for test
    $DB_PASSWORD = $conf['password'];
    $DB_OPTION = 'charset=utf8';
    $PDO_DSN = $conf['dsn'];
    $db = new PDO($PDO_DSN, $DB_USERNAME, $DB_PASSWORD,
 [   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
 ]);
 echo 'DB接続成功';
 } catch(PDOException $e){
 echo 'DB接続失敗';
}
?>
