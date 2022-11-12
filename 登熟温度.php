<main>
  <h2>登熟温度の表示（今年の実績値。1300度までリスト）</h2>
  <?php
  // MySQLへの接続
  require_once('connect.php');
  echo "<br>";

  $sql_final = "SELECT 日付, format(平均気温,6) AS 平均気温, format(登熟温度,6) AS 登熟温度 FROM cumulative_temp WHERE 登熟温度 < 1300;";
  //Web表示
  echo "発行したSQL Statement:<br>" . $sql_final . "<br>";  //just for debug
  $stmt = $pdo->prepare($sql_final);
  $stmt->execute();
  // ヘッダー行
  echo '<table border="1" style="border-collapse: collapse">';
  echo '<tr>';
  echo '<th>' . '日付', '</th>';
  echo '<th>' . '平均気温', '</th>';
  echo '<th>' . '登熟温度', '</th>';
  echo '</tr>';
  // foreach文で繰り返し配列の中身を一行ずつ出力
  foreach ($stmt as $row) {
    // データベースのフィールド名で出力
    echo '<tr>';
    echo '<td width="120" style="padding:0px 20px">' . $row['日付'] . '</td>';
    echo '<td width="120" style="padding:0px 20px">' . $row['平均気温'] . '</td>';
    echo '<td width="120" style="padding:0px 20px">' . $row['登熟温度'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
  ?>
</main>
