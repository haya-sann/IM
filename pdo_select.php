<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require 'connect.php';

// SQL文を準備します。「:id」がプレースホルダーです。
// $sql = 'SELECT * FROM atmos limit 10';
$sql = 'SELECT * FROM atmos WHERE id between :id and :id+10';
// PDOStatementクラスのインスタンスを生成します。
$prepare = $pdo->prepare($sql);

// PDO::PARAM_INTは、SQL INTEGER データ型を表します。
// SQL文の「:id」を「3」に置き換えます。つまりはidが10より小さいレコードを取得します。
$prepare->bindValue(':id', 10000, PDO::PARAM_INT);

// プリペアドステートメントを実行する
$prepare->execute();

// PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

// 結果を出力
var_dump($result);
?>