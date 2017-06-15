<?php
require_once(dirname(__FILE__) . '/../INTER-Mediator/INTER-Mediator.php');
spl_autoload_register('loadClass');

$aValue = mb_eregi_replace("/[^0-9]/", "", $_GET["date"]);
//$aValue = $_GET["date"];
$bValue = $_GET["temperature"];
$cValue = $_GET["pressure"];
$dValue = $_GET["humid"];
$eValue = $_GET["lux"];
 if ($aValue < 1) {
     echo json_encode(array("ERROR" => "Invalid Number."));
     exit();
}
$dbInstance = new DB_Proxy();
$dbInstance->ignoringPost();
$dbInstance->initialize(
    array(array('name' => 'atmos', 'key' => 'id',),), 
    array(), array("db-class" => "PDO"), 2, "atmos");
$dbInstance->dbSettings->addValueWithField("date", $aValue);
$dbInstance->dbSettings->addValueWithField("temp", $bValue);
$dbInstance->dbSettings->addValueWithField("pressure", $cValue);
$dbInstance->dbSettings->addValueWithField("humid", $dValue);
$dbInstance->dbSettings->addValueWithField("lux", $eValue);
$dbInstance->processingRequest("create");
$pInfo = $dbInstance->getDatabaseResult();
$logInfo = $dbInstance->logger->getMessagesForJS();
echo json_encode(array("data"=>$pInfo,"log"=>$logInfo));
?>
