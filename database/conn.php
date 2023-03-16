<?php
require dirname(__DIR__) . '/vendor/composer/autoload_psr4.php';
try{
    $conn = new PDO("mysql::host=localhost; dbname=phpmyblog; charset=utf8", "root", "root");
    echo "Bağlantı Başarılı";
}catch(PDOException $e){
    echo "Başarısız Oldu!" . $e -> getMessage();
}
?>