<?php
//http://mi-progress-ooo.hatenablog.com/entry/2016/08/03/090642
//このページを参考にした
require_once('config.php');
require_once('functions.php');

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>折れ線グラフ</title>
<style>
h1 {
color: #696969;
}
</style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
google.load('visualization', '1', {packages:['corechart']});
google.setOnLoadCallback(drawChart);

// データ読み込み

function drawChart() {
var data = google.visualization.arrayToDataTable([
['日付時刻', '気温', '湿度'],
<?php
$dbh = connectDb();
// SQL文
$sql = 'SELECT * FROM atmos ORDER BY date DESC LIMIT 10';
// クエリ
$stmt = $dbh->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 行の長さ取得
$length = $stmt->rowCount();
// カウント
$no = 0;
foreach ($result as $value) {
//echo '[\''.$value["date"].'\', '.$value["temp"].', '.$value["pressure"].', '.$value["humid"].']';
echo '[\''.$value["date"].'\', '.$value["temp"].', '.$value["humid"].']';
$no++;
if ($no !== $length) {
echo ",\n";
}
}
?>
]);
var options = {
width:900,
height:600,
chartArea: {
top:80,
left:200
},
fontName: 'メイリオ',
backgroundColor:'#EFF4F5',
isStacked: true,
colors: ['#2E8EF6', '#DA3A29', '#8EC43C'],
bar: {groupWidth: 20},
hAxis:{
title:'日付(時刻）',
titleTextStyle: {
fontName: 'メイリオ',
fontSize: 16,
italic: false,
bold: false,
color: '#696969'
},
textStyle: {
fontSize:12,
color: '#696969',
fontName: 'メイリオ'
},
slantedText: true
},
vAxis:{
title: '変化',
titleTextStyle: {
fontName: 'メイリオ',
fontSize: 16,
italic: false,
bold: false,
color: '#696969'
},
textStyle: {
fontSize:12,
color: '#696969',
fontName: 'メイリオ'
}
},
legend:{
position: 'top',
textStyle:{
fontName: 'メイリオ',
color: '#696969',
fontSize: 16
}
}
};
//var chart = new google.visualization.ColumnChart(document.getElementById('graph1'));
var chart = new google.visualization.LineChart(document.getElementById('graph1'));
chart.draw(data, options);
}
</script>
</head>
<body>
<h1>サンプル折れ線グラフ</h1>
<div id="graph1"></div>
</body>
</html>