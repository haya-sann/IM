<?PHP
$_BODY{
'error' => 'invalid json';

}
$_SERVER['_BODY'] = $_BODY;
}
$obj = [
'_COOKIE' => $_COOKIE,
'_SERVER' => $_SERVER,
'_GET' => $_GET,
'_POST' => $_POST,
'_BODY' => $_BODY,
];


echo json_encode( $obj );
?>
