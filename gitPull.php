<?php
echo "\n# プログラムの新規アップデータを探して、\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

system('cd /IM/');//サイトのWeb rootに置いたIMディレクトリーに移動する。
//system('git pull 2>&1');
system('git pull', $response);
if (strpos($response,'Already up-to-date') === false) {
    print '新しいアップデータはありません';
} else {
    var_dump($response);//実行結果
}
?>
