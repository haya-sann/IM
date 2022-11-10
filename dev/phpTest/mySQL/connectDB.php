<?php
try {
$dbh = new PDO('mysql:host=mysql700.db.sakura.ne.jp;dbname=mochimugi_monitor;charset=utf8','mochimugi','matsutanaka3',
array(PDO::ATTR_EMULATE_PREPARES => false));
print('接続に成功しました。<br>');
// SELECT文を変数に格納
$sql = "SELECT * FROM test1";
 
// SQLステートメントを実行し、結果を変数に格納
$stmt = $dbh->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {
 
  // データベースのフィールド名で出力
  echo $row['date'].'：'.$row['pressure'].'hPa';
 
  // 改行を入れる
  echo '<br>';
}
} 
catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}
?>
