<?php
try {
  $db = new PDO('mysql:dbname=LAA0710594-satoyama;host=mysql116.phy.lolipop.lan;charset=utf8','LAA0710594','GzM6GnGk');
  echo "接続OK！" . "\n";
} catch (PDOException $e) {
  echo 'DB接続エラー！: ' . $e->getMessage();
}
//対象のテーブルを変数に格納
$data = "atmos";
$new_table = "average_temp";
// 対象テーブルを選択しSELECT文を変数tableへ格納
$table = "CREATE TEMPORARY TABLE average_temp AS select from_days(to_days(date)) 日付, avg(temp) 平均気温 from atmos where date between '2022-08-08' and '2022-09-15' group by from_days(to_days(date));";
// queryを実行し、結果を変数に格納
$sql = $db->query($table);
$sql2 = $db->query("set @amount_temp=0.0; SELECT 日付, 平均気温, format(@amount_temp:=@amount_temp+ 平均気温, 6) as 登熟温度 FROM average_temp;")
// foreach文で繰り返し配列の中身を一行ずつ出力
foreach ($sql2 as $row) {
// データベースのフィールド名で出力
  // echo $new_table . "のデータ：" . $row['日付'] . 'と' . $row['登熟温度'].'です'.'<br>';
  echo '<tr>';
  echo '<td>' . $row ['日付'], '</td>';
  echo '<td>' . $row ['平均気温'], '</td>';
  echo '<td>' . $row ['登熟温度'], '</td>';
  echo '</tr>';
  echo "\n";
}
?>
