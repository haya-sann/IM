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
$switchSandbox = $_GET["deploy"]; //this is not a data for store database.
//this is just used for switch deply sisitem and sandBox

$prevTime = fopen ("prevTime.txt","r+");
$prevTimeValue = fgets($prevTime);
rewind($prevTime);
fwrite ($prevTime, $accessTime);
fclose($prevTime);

$datetime1 = new DateTime($prevTimeValue);
$datetime2 = new DateTime($accessTime);
$diffTime = $datetime1->diff($datetime2);

$log = $_GET["log"]; //IoTデバイスから送られてきたlogを読み取り、次の２データを追加
$log .= "\n前回のアクセス記録：".$prevTimeValue ."　　今回のアクセス時刻：".$accessTime;
$log .= "\n前回アクセスからの経過時間：".$diffTime->format('%H:%I:%S');

if ($accessTime < 1) {
     echo json_encode(array("ERROR" => "Invalid Number."));
     exit();
}
if ($switchSandbox == "sandBox") {
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
if (isset($_GET["temp"])) {
    $dbInstance->dbSettings->addValueWithField("temp", $_GET["temp"]);
   }
if (isset($_GET["pressure"])) {
    $dbInstance->dbSettings->addValueWithField("pressure", $_GET["pressure"]);
   }
$fieldName = "humid";
if (isset($_GET[str($fieldName)])) {
    $dbInstance->dbSettings->addValueWithField(str($fieldName), $_GET[str($fieldName)]);
   }
if (isset($_GET["outer_temp"])) {
    $dbInstance->dbSettings->addValueWithField("outer_temp", $_GET["outer_temp"]);
   }
if (isset($_GET["outer_pressure"])) {
    $dbInstance->dbSettings->addValueWithField("outer_pressure", $_GET["outer_pressure"]);
   }
if (isset($_GET["outer_humid"])) {
    $dbInstance->dbSettings->addValueWithField("outer_humid", $_GET["outer_humid"]);
   }
if (isset($_GET["lux"])) {
    $dbInstance->dbSettings->addValueWithField("lux", $_GET["lux"]);
   }
if (isset($_GET["v0"])) {
    $dbInstance->dbSettings->addValueWithField("v0", $_GET["v0"]);
   }
if (isset($_GET["v1"])) {
    $dbInstance->dbSettings->addValueWithField("v1", $_GET["v1"]);
   }
if (isset($_GET["cpu_temp"])) {
    $dbInstance->dbSettings->addValueWithField("cpu_temp", $_GET["cpu_temp"]);
   }

if (isset($_GET["photo_url"])) {
    $dbInstance->dbSettings->addValueWithField("photo_url", $_GET["photo_url"]);
   }

if (isset($_GET["remark"])) {
    $dbInstance->dbSettings->addValueWithField("remark", $_GET["remark"]);
   }

$dbInstance->dbSettings->addValueWithField("log", $log);
$dbInstance->processingRequest("create");
$pInfo = $dbInstance->getDatabaseResult();
$logInfo = $dbInstance->logger->getMessagesForJS();
echo json_encode(array("data"=>$pInfo,"log"=>$logInfo));
var_export($logInfo, false);
?>
