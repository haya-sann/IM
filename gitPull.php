<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

exec('cd /IM/');//サイトのWeb rootに置いたIMディレクトリーに移動する。
//system('git pull 2>&1');
exec('git pull', $result, $response);
var_dump($result);
$strResult = implode ( $result );
if (in_array('Already', $result)) { //正規表現にした
    echo '\n調べましたが，新しいアップデータはありません';
} else {
    echo "\n下記のように，更新しました\n";//改行を出力するには""で囲む必要がある。'はだめ
    var_dump ($result);
    echo "変数\$resultは： $strResult";//この出力が出ない
    print $response;
}
?>
