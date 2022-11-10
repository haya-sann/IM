<?php

function connectDb( ) {
try {
//php 5.5以降ならこのようにしなくても;charset=utf8をdsn煮含められるのでいらない
// #array(PDO::MYSQL_ATTR_READ_DEFAULT_FILE => '/etc/my.cnf',
// #array(PDO::MYSQL_ATTR_READ_DEFAULT_FILE => '/usr/local/mysql/5.5/etc/my.cnf',
// array(PDO::MYSQL_ATTR_READ_DEFAULT_FILE => 'my.cnf',
// #さくらインターネットサーバーのmy.confの場所
// PDO::MYSQL_ATTR_READ_DEFAULT_GROUP => 'php',
// );
// echo "文字設定を読込んだよ";
return new PDO(DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
echo $e->getMessage();
exit;
}
}
?>
