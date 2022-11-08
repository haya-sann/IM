<?php
// データーベースへ接続
try {
  $pdo = new PDO('mysql:dbname=LAA0710594-satoyama;host=mysql116.phy.lolipop.lan;charset=utf8','LAA0710594','GzM6GnGk');
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  echo "PHP Version:" . phpversion() . "。データベース接続しました！" . "\n";
} catch (PDOException $e) {
  // 接続できなかったらエラー表示
  echo 'DB接続エラー！: ' . $e->getMessage();
}
?>
