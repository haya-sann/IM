<?php
echo "\n# system関数\n";
var_dump( system('cd ~/www/IM', $ret) );
var_dump( system('git pull', $ret) );
var_dump( $ret );
?>
