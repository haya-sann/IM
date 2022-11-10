<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
  //POST以外ははじく
  header("HTTP/1.0 404 Not Found");
  return;
}
header("Content-Type: text/html; charset=UTF-8");

//Proposal for "Services_JSON"を使ってJSONを処理する、以下からダウンロード可能
//http://pear.php.net/pepr/pepr-proposal-show.php?id=198
require_once "json.php"; 
// データはUTF-8で取得される。
// 他のエンコードに変える場合は変換が必要
$x = $_POST['x'];
$x = mb_convert_encoding($x,"EUC-JP","UTF-8");
$y = $_POST['y'];
$y = mb_convert_encoding($y,"EUC-JP","UTF-8");
$r = $x+$y;
$answer = "答えは{$r}";

// 非同期で動いていることを強調するために1秒停止
sleep(1); 

// 結果は必ずUTF-8で返すこと
$answer = mb_convert_encoding($answer,"UTF-8","auto");
//JSON形式にすることで複数の値を返すことも可能
$arr = array(
  "answer" => $answer
);
$json = new Services_JSON;
$encode = $json->encode($arr); //JSONに変換
echo $encode;	//JSONを出力
?>
