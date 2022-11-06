<?php
// データーベースtestへ接続
$count = 126
try {
  $db = new PDO('mysql:dbname=LAA0710594-satoyama;host=mysql116.phy.lolipop.lan;charset=utf8','LAA0710594','GzM6GnGk');
  // 入力した値をデータベースへ登録
  //$count = $db->exec('INSERT INTO 部品登録 SET 部品名="'. $_POST['buhin'] .'",登録日 = NOW()');
  // 登録した件数を表示
  echo $count . "件のデータを登録しました！";
} catch (PDOException $e) {
  // 接続できなかったらエラー表示
  echo 'DB接続エラー！: ' . $e->getMessage();
}
echo 'つながった？？'
?>
