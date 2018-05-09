<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

system('cd /IM/');//サイトのWeb rootに置いたIMディレクトリーに移動する。
//system('git pull 2>&1');
system('git pull', $response);
if (preg_match('Already up-to-date.',$response)) { //正規表現にした
    print '調べましたが，新しいアップデータはありません';
} else {
    print '上記のように，更新しました';//$responseを印刷するのやめた
}
?>
