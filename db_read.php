<?php
$conf = include ('defAtmos.php');

$user = $conf['user'];
$password = $conf['password'];
$host = 'db';

try {
   // MySQLへの接続
   $dsn = $conf['dsn'];
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
   $sql = "SELECT * from atmos" limit 20;
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
           <th>製品名</th>
           <th>目的</th>
           <th>日付</th>
       </tr>
   </thead>
   <tbody>
       <?php
           foreach ($result as $row){
               print "<tr>";
               print "<td>".$row['asset_id']."</td>";
               print "<td>".$row['name']."</td>";
               print "<td>".$row['category']."</td>";
               print "<td>".$row['purchase']."</td>";
               print "</tr>";
           }
       ?>
   </tbody>    
</table>
<a href="csv.php">CSVダウンロード<a>
