<?php
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

$aValue = mb_eregi_replace("/[^0-9]/", "", $_GET["date"]);//こういう形で変数を取得する必要があるのかどうか、よく分からない。
//$aValue = $_GET["date"];
$bValue = $_GET["temperature"];
$cValue = $_GET["pressure"];
$dValue = $_GET["humid"];
//$eValue = $_GET["lux"];
$eValue = 13809;
$fValue = $_GET["temp"]; //data "temp" is cpu teperature
//$gValue = $_GET["v0"];
//$hValue = $_GET["v1"];
//$iValue = $_GET["photo_url"];
$jValue = $_GET["deploy"]; //this is not a data for store database.
//this is just used for switch deply sisitem and sandBox
//$kValue = $_GET["remark"];
$lValue = $_GET["log"];

$prevTime = fopen ("prevTime.txt","w+");
$prevTimeValue = fgets($prevTime);
$fwrite = fwrite ($prevTime, $aValue);
if ($fwrite == false){
    $lValue .= ":Error writing prevTime.txt";
} else {
    $lValue .= ":Writeout normal:  + $prevTimeValue)";
}


$datetime1 = new DateTime($prevTimeValue);
$datetime2 = new DateTime($aValue);
$diffTime = $datetime1->diff($datetime2);
$lValue .= $diffTime->format('%H:%I:%S');
echo $diffTime->format('%H:%I:%S');

if ($aValue < 1) {
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
$dbInstance->dbSettings->addValueWithField("date", $aValue);
$dbInstance->dbSettings->addValueWithField("diff_time", $diffTime->format('%H:%I:%S'));
$dbInstance->dbSettings->addValueWithField("temp", $bValue);
$dbInstance->dbSettings->addValueWithField("pressure", $cValue);
$dbInstance->dbSettings->addValueWithField("humid", $dValue);
$dbInstance->dbSettings->addValueWithField("lux", $eValue);
$dbInstance->dbSettings->addValueWithField("cpu", $fValue);
$dbInstance->dbSettings->addValueWithField("v0", $gValue);
$dbInstance->dbSettings->addValueWithField("v1", $hValue);
$dbInstance->dbSettings->addValueWithField("photo_url", $iValue);
$dbInstance->dbSettings->addValueWithField("remark", $kValue);
$dbInstance->dbSettings->addValueWithField("log", $lValue);
$dbInstance->processingRequest("create");
$pInfo = $dbInstance->getDatabaseResult();
$logInfo = $dbInstance->logger->getMessagesForJS();
//echo json_encode(array("data"=>$pInfo,"log"=>$logInfo));
var_export($logInfo, false);
?>
