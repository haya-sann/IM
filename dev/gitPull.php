<?php
echo "\n# system関数\n";
var_dump( system('git pull', $ret) );
var_dump( $ret );
?>