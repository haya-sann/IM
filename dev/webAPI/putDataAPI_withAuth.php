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

$fieldName = array("temp","cpu_temp","pressure","humid","outer_temp","outer_pressure","outer_humid","lux","v0","v1","photo_url","remark");

foreach($fieldName as $field){
    if (isset($_GET[$field])) {
        $dbInstance->dbSettings->addValueWithField($field, $_GET[$field]);
       }
}

$dbInstance->dbSettings->addValueWithField("log", $log);
$dbInstance->processingRequest("create");
$pInfo = $dbInstance->getDatabaseResult();
$logInfo = $dbInstance->logger->getMessagesForJS();
echo json_encode(array("data"=>$pInfo,"log"=>$logInfo));
var_export($logInfo, false);
?>
