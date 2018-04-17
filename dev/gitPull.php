<?php
echo "\n# プログラムのアップデータがあれば、更新します\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

system('cd ~/www/IM/dev/');
system('git pull 2>&1');
echo "\n# ＝＝＝＝＝　エラーがあるときには違いがあるか？　＝＝＝＝\n";
system('git pull');
//var_dump(system('git pull 2>&1', $ret));
?>
