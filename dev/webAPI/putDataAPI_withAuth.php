<?php
date_default_timezone_set('Asia/Tokyo');//タイムゾーンはTokyoにします
require_once(dirname(__FILE__) . '/../INTER-Mediator/INTER-Mediator.php');
spl_autoload_register('loadClass');

if (!isset($_GET["c"])) {
    echo json_encode(array("ERROR" => "No authentication code."));
    exit();
}
$authCode = "TsaJt1fR5SyN";//this is the key auth
if (isset($_GET["c"]) && $_GET["c"] != $authCode) {
    echo json_encode(array("ERROR" => "Invalid authentication code."));
    exit();
}

$accessTime = mb_eregi_replace("/[^0-9]/", "", $_GET["date"]);//こういう形で変数を取得する必要があるのかどうか、よく分からない。
//$accessTime = $_GET["date"];
$temp = $_GET["temp"];
$outer_temp = $_GET["outer_temp"]; //data "temp" is cpu teperature
$pressure = $_GET["pressure"];
$outer_pressure = $_GET["outer_pressure"];
$humid = $_GET["humid"];
$outer_humid = $_GET["outer_humid"];
$lux = $_GET["lux"];
$cpu_temp = $_GET["cpu_temp"];

//$gValue = $_GET["v0"];
//$hValue = $_GET["v1"];
//$iValue = $_GET["photo_url"];
$jValue = $_GET["deploy"]; //this is not a data for store database.
//this is just used for switch deply sisitem and sandBox
//$kValue = $_GET["remark"];
$lValue = $_GET["log"]; //get log data sended from IoT device

$prevTime = fopen ("prevTime.txt","r+");
$prevTimeValue = fgets($prevTime);
rewind($prevTime);
fwrite ($prevTime, $accessTime);
fclose($prevTime);

$datetime1 = new DateTime($prevTimeValue);
$datetime2 = new DateTime($accessTime);
$diffTime = $datetime1->diff($datetime2);

$lValue .= "\n前回のアクセス記録：".$prevTimeValue ."　　今回のアクセス時刻：".$accessTime;
$lValue .= "\n前回アクセスからの経過時間：".$diffTime->format('%H:%I:%S');

if ($accessTime < 1) {
     echo json_encode(array("ERROR" => "Invalid Number."));
     exit();
}
if ($jValue == "sandBox") {
	$tableName = "atmos_test";
} else { #support regacy 
	$tableName = "atmos";
}
$dbInstance = new DB_Proxy();
$dbInstance->ignoringPost();
$dbInstance->initialize(
    array(array('name' => $tableName, 'key' => 'id',),), 
    array(), array("db-class" => "PDO"), 2, $tableName);
$dbInstance->dbSettings->addValueWithField("date", $accessTime);
$dbInstance->dbSettings->addValueWithField("diff_time", $diffTime->format('%H:%I:%S'));
$dbInstance->dbSettings->addValueWithField("temp", $temp);
$dbInstance->dbSettings->addValueWithField("pressure", $pressure);
$dbInstance->dbSettings->addValueWithField("humid", $humid);
$dbInstance->dbSettings->addValueWithField("outer_temp", $outer_temp);
$dbInstance->dbSettings->addValueWithField("outer_pressure", $outer_pressure);
$dbInstance->dbSettings->addValueWithField("outer_humid", $outer_humid);
$dbInstance->dbSettings->addValueWithField("lux", $lux);
$dbInstance->dbSettings->addValueWithField("cpu_temp", $cpu_temp);
$dbInstance->dbSettings->addValueWithField("v0", $gValue);
$dbInstance->dbSettings->addValueWithField("v1", $hValue);
$dbInstance->dbSettings->addValueWithField("photo_url", $iValue);
$dbInstance->dbSettings->addValueWithField("remark", $kValue);
$dbInstance->dbSettings->addValueWithField("log", $lValue);
$dbInstance->processingRequest("create");
$pInfo = $dbInstance->getDatabaseResult();
$logInfo = $dbInstance->logger->getMessagesForJS();
echo json_encode(array("data"=>$pInfo,"log"=>$logInfo));
var_export($logInfo, false);
?>
