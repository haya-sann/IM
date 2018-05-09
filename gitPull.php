<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

exec('cd /IM/');//サイトのWeb rootに置いたIMディレクトリーに移動する。
//system('git pull 2>&1');
exec('git pull', $result, $response);
$result = implode ( $result );
if (preg_match('Already up-to-date.',$result)) { //正規表現にした
    print '\n調べましたが，新しいアップデータはありません';
} else {
    print '\n上記のように，更新しました';//$responseを印刷するのやめた
    print ($result);
    print $response;
}
?>
