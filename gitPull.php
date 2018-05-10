<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

exec('cd /IM/');//サイトのWeb rootに置いたIMディレクトリーに移動する。
exec('ls');
//system('git pull 2>&1');
exec('git pull', $result, $response);
var_dump($result);
$strResult = implode ( $result );
if (in_array("Already up-to-date.", $result, true)) { //正規表現にした
    echo '\n調べました。現在既に最新の状態です';
} else {
    echo "\n下記のように，更新しました\n";//改行を出力するには""で囲む必要がある。'はだめ
    var_dump ($result);
    print "変数\$resultは：";
    print_r ($strResult);
    print_r ($response);
}
?>
