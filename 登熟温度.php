<main>
  <h2>登熟温度の表示</h2>
<?php
// MySQLへの接続
require_once('connect.php');
echo "<br>";

// 対象テーブルを選択しSELECT文を変数tableへ格納
$sql_final = "SELECT 日付, format(平均気温,6) as 平均気温, format(sum(D),6) as 登熟温度 FROM before_temp WHERE 日付 >= '2022-08-08' AND C >= '2022-08-08' GROUP BY 日付;";
$sql_final2 = "select * from cumulative_temp where 登熟温度 < 1300;";
//Web表示
echo "発行したSQL Statement:<br>" . $sql_final2 . "<br>";  //just for debug
$stmt = $pdo->prepare($sql_final2);
$stmt -> execute();
// ヘッダー行
echo '<table>';
echo '<tr>';
echo '<th>' . '日付', '</th>';
echo '<th>' . '平均気温', '</th>';
echo '<th>' . '登熟温度', '</th>';
echo '</tr>';
// foreach文で繰り返し配列の中身を一行ずつ出力
foreach ($stmt as $row) {
// データベースのフィールド名で出力
  echo '<tr>';
  echo '<td width="120">' . $row ['日付'] . '</td>';
  echo '<td width="120">' . $row ['平均気温'] . '</td>';
  echo '<td width="120">' . $row ['登熟温度']. '</td>';
  echo '</tr>';
}
echo '</table>';
?>
</main>

