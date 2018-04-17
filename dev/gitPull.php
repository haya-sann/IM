<?php
echo "\n# system関数\n";
//var_dump( system('eval "$(ssh-agent -s)"', $ret) );
//var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );

system('cd ~/www/IM/dev/');
var_dump(system('git pull 2>&1', $ret));
?>
