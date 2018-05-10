<?php
$os = array("Mac", "NT", "Irix", "Linux", "Already up to date.");
var_dump($os);
$res = in_array("Already up to date.", $os);
var_dump($res);
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}
?>
