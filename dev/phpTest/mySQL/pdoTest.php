<html>
<head><title>PHP TEST Read from ATMOSPHERE DATA</title></head>
<body>

<?php

$dsn = 'mysql:dbname=mochimugi_field;host=mysql700.db.sakura.ne.jp';
$user = 'mochimugi';
$password = 'matsutanaka3';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');

//    $dbh->query('SET NAMES sjis');

    $sql = 'select * from atmos';
    foreach ($dbh->query($sql) as $row) {
        print($row['date']);
        print($row['temp']);
        print($row['pressure'].'<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>

</body>
</html>