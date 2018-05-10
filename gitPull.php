<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

//exec('cd ./IM/');//これは不要
exec('ls');
exec('git pull', $result, $response);
//$strResult = implode ( $result );
if (in_array("Already up-to-date.", $result, true)) { //正規表現にした
    echo "\n現在既に最新の状態です";
} else {
    echo "\n下記のように更新しました\n";//改行を出力するには""で囲む必要がある。'はだめ
    echo "<pre>";
    print_r ($result); //print
    echo "</pre>";
    print "これはprint_rを使った";
#    print_r ($result);
//    print "変数\$resultは：";
//    print_r ($strResult);
//    print_r ($response);
}
?>
