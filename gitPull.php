<?php
echo "\n# プログラムの新規アップデータを探します。\n新しいものがあれば、差し替えます\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

system('cd /IM/');
system('git pull 2>&1');
?>
