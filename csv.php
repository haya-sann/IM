<?php
$today = date("YmdHis");

// 出力情報の設定
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$today.".csv");
header("Content-Transfer-Encoding: binary");

//DB接続
$user = 'web';//データベースユーザ名
$password = 'password';//データベースパスワード
$dbName = "test_db";//データベース名
$host = "db";//ホスト
$stm = null;    // 接続を閉じる

try {
// MySQLへの接続
   $dsn = "mysql:host={$host};dbname={$dbName};charser=utf8mb4";
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
   $sql = "SELECT * from asset";
   $stm = $pdo->prepare($sql);
   $stm->execute();
   $result = $stm->fetchAll(PDO::FETCH_ASSOC);
   $stm = null;   // 接続を閉じる
   } 
   catch (PDOException $e) { // PDOExceptionをキャッチする
   print $e->getMessage() . "<br/gt;";
   die();
}

$row = '"備品ID","製品名","目的","日付"' . "\n"; // タイトル行を作成
foreach ($result as $value ){
   $row .= '"' . $value['asset_id'] . '","' . $value['name'] . '","' . $value['category'] . '","' . $value['purchase'] . '"' . "\n";
}
print $row;
return;
?>
