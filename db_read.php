<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$conf = include ('defAtmos.php');

$user = $conf['user'];
$password = $conf['password'];
// $host = 'db';

print ($user); //Just for test

try {
   // MySQLへの接続
   $dsn = $conf['dsn'];
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
   $sql = "select date, temp, outer_temp, presure from atmos order by id desc limit 20;";
   $stm = $pdo->prepare($sql);
   $stm->execute();
   $result = $stm->fetchAll(PDO::FETCH_ASSOC);
      
   // 接続を閉じる
   $stm = null;
  
} catch (PDOException $e) { // PDOExceptionをキャッチする
   print $e->getMessage() . "<br/gt;";
   die();
}
?>
<style>
table, th, td {
  border: 2px solid green;
  padding: 5px;
  border-collapse: collapse;
}
</style>

<table>
   <thead>
       <tr>
           <th>ID</th>
           <th>日付</th>
           <th>温度</th>
           <th>外気温</th>
           <th>気圧</th>
       </tr>
   </thead>
   <tbody>
       <?php
           foreach ($result as $row){
               print "<tr>";
               print "<td>".$row['id']."</td>";
               print "<td>".$row['date']."</td>";
               print "<td>".$row['temp']."</td>";
               print "<td>".$row['outer_temp']."</td>";
               print "<td>".$row['pressure']."</td>";
               print "</tr>";
           }
       ?>
   </tbody>    
</table>
<a href="csv.php">CSVダウンロード<a>
