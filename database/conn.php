<?php
try{
    $conn = new PDO("mysql::host=localhost; dbname=phpmyblog; charset=utf8", "root", "root");
    //echo "Bağlantı Başarılı";
}catch(PDOException $e){
    echo "Başarısız Oldu!" . $e -> getMessage();
}
?>