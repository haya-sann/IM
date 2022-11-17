<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require 'connect.php';

// SQL文を準備します。「:id」がプレースホルダーです。
$sql = 'CREATE OR REPLACE VIEW average_temp AS SELECT from_days(to_days(date)) 日付, avg(temp) 平均気温 FROM atmos GROUP BY from_days(to_days(date));
CREATE OR REPLACE VIEW before_temp AS SELECT A.日付, A.平均気温, B.日付 C, B.平均気温 D FROM average_temp A, average_temp B WHERE B.日付 <= A.日付;
CREATE OR REPLACE VIEW cumulative_temp AS SELECT 日付, 平均気温, sum(D) as 登熟温度 FROM before_temp WHERE 日付 >= (SELECT day_bloom FROM bloom LIMIT 1) AND C >= (SELECT day_bloom FROM bloom LIMIT 1) GROUP BY 日付;
select * from cumulative_temp where 登熟温度 < 1300;';
// $sql = 'SELECT date, temp FROM atmos WHERE id > :id limit 10';
// PDOStatementクラスのインスタンスを生成します。
$prepare = $pdo->prepare($sql);

// PDO::PARAM_INTは、SQL INTEGER データ型を表します。
// SQL文の「:id」を「3」に置き換えます。つまりは指定したidから10レコードを取得します。
// $prepare->bindValue(':id', 10000, PDO::PARAM_INT);

// プリペアドステートメントを実行する
$prepare->execute();

// PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

// 結果を出力
var_dump($result);
?>
