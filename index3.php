<?php
try {
  $db = new PDO('mysql:dbname=LAA0710594-satoyama;host=mysql116.phy.lolipop.lan;charset=utf8','LAA0710594','GzM6GnGk');
  echo "接続OK！" . "n";
} catch (PDOException $e) {
  echo 'DB接続エラー！: ' . $e->getMessage();
}
//対象のテーブルを変数に格納
$data = "atmos";
// 対象テーブルを選択しSELECT文を変数tableへ格納
$table = "SELECT * FROM $data";
// queryを実行し、結果を変数に格納
$sql = $db->query($table);
// foreach文で繰り返し配列の中身を一行ずつ出力
foreach ($sql as $row) {
// データベースのフィールド名で出力
echo $data . "のデータ：" . $row['型番'] . 'は' . $row['在庫数'].'個です'.'<br>';
}
?>
