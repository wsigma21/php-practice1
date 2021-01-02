<?php
// MySQLに接続する
try {
  $db = new PDO('mysql:dbname=practice;host=127.0.0.1;charset=utf8','root','root');
} catch(PDOException $e) {
  echo 'DB接続エラー：' . $e->getMessage();
}
?>