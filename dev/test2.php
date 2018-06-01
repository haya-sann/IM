<?php
$os = array("Mac", "NT", "Irix", "Linux", "Already up to date.");
var_dump($os);
$res = in_array("Already", $os);
var_dump($res);
if (in_array("Irix", $os)) {
    echo "Got Irix\n";
}
if (in_array("Already up to date.", $os)) {
    echo "最新のプログラムです";
}
?>
