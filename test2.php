<?php
$os = array("Mac", "NT", "Irix", "Linux");
var_dump($os);
$res = in_array("Irix", $os);
var_dump($res);
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}
?>
