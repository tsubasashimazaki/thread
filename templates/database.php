<?php 
try {
    $db = new PDO('mysql:dbname=thread;host=localhost;charset=utf8', 'root','root');
    
}catch(PDOExeption $e) {
    echo('接続エラー：' . $e->getMessage());
}