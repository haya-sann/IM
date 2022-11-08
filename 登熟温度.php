<main>
  <h2>登熟温度の表示</h2>
<?php
// MySQLへの接続
require_once('connect.php');
echo "<br>";
//対象のテーブルを変数に格納
$data = "atmos";
$new_table = "average_temp";
// 対象テーブルを選択しSELECT文を変数tableへ格納
$sql = "CREATE TEMPORARY TABLE $new_table AS select from_days(to_days(date)) 日付, avg(temp) 平均気温 from $data where date between '2022-08-08' and '2022-09-15' group by from_days(to_days(date)); set @amount_temp=0.0; SELECT 日付, 平均気温, format(@amount_temp := @amount_temp + 平均気温, 6) as 登熟温度 FROM $new_table;";
$sql_1 = "CREATE TEMPORARY TABLE $new_table AS select from_days(to_days(date)) 日付, avg(temp) 平均気温 from $data where date between '2022-08-08' and '2022-09-15' group by from_days(to_days(date));";
$sql_2 = "set @amount_temp=0.0; SELECT 日付, 平均気温, format(@amount_temp := @amount_temp + 平均気温, 6) as 登熟温度 FROM $new_table;";
echo $sql . "<br>";  //just for debug
// echo $sql_1 . "<br>";  //just for debug
// echo $sql_2 . "<br>";  //just for debug
// queryを実行し、結果を変数に格納
$stmt = $pdo->query($sql);
// $stmt = $pdo->query($sql_1);
// $stmt2 = $pdo->query($sql_2);

// ヘッダー行
echo '<table>';
echo '<tr>';
echo '<th>' . '日付', '</th>';
echo '<th>' . '平均気温', '</th>';
echo '<td>' . '登熟温度', '</td>';
echo '</tr>';

// foreach文で繰り返し配列の中身を一行ずつ出力
foreach ($stmt as $row) {
// データベースのフィールド名で出力
  // echo $new_table . "のデータ：" . $row['日付'] . 'と' . $row['登熟温度'].'です'.'<br>';
  echo '<tr><td>' . $row ['日付'] . '</td>';
  echo '<td>' . $row ['平均気温'] . '</td>';
  echo '<td>' . $row ['登熟温度']. '</td></tr>';
}
echo '</table>';
?>
</main>
