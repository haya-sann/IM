<?php
// データーベースへ接続
try {
  $db = new PDO('mysql:dbname=LAA0710594-satoyama_test;host=mysql116.phy.lolipop.lan;charset=utf8','LAA0710594','GzM6GnGk');
  echo "データベース接続しました！";
} catch (PDOException $e) {
  // 接続できなかったらエラー表示
  echo 'DB接続エラー！: ' . $e->getMessage();
}
?>
