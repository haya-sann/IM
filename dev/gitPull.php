<?php
echo "\n# system関数\n";
var_dump( system('eval "$(ssh-agent -s)"', $ret) );
var_dump( system('ssh-add ~/.ssh/id_rsa_github', $ret) );
var_dump( system('cd ~/www/IM/dev/', $ret));
var_dump(system('git pull 2>&1', $ret));
echo ${ret};
?>
