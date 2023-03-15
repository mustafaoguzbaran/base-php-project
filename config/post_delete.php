<?php
require_once "../database/conn.php";
$sil = $conn -> prepare("DELETE FROM posts where post_id = :post_id");
$kontrol = $sil ->execute(array(
    'post_id' => $_GET['post_id']
)
);
if($kontrol){
    Header("Location: http://localhost:8888/PHP-myBLOG/src/backoffice/contentlist.php");
    exit;
}
?>