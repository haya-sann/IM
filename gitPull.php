<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

exec('cd /IM/');//サイトのWeb rootに置いたIMディレクトリーに移動する。
//system('git pull 2>&1');
exec('git pull', $result, $response);
$strResult = implode ( $result );
if (preg_match('Already', $strResult)) { //正規表現にした
    echo '\n調べましたが，新しいアップデータはありません';
} else {
    echo "\n上記のように，更新しました\n";//改行を出力するには""で囲む必要がある。'はだめ
    echo "\$responseは： $result";
    print $response;
}
?>
