<?php
require_once "../database/conn.php";
$dirname = dirname($_SERVER['SCRIPT_NAME']);
$dizin = str_replace("/config/post_update.php", null, $_SERVER['REQUEST_URI']);
$dosyaYolu = "http://".$_SERVER['HTTP_HOST'].$dizin . "/upload/";
$dosyaAdiAl = $_FILES["post_img"]["name"];
move_uploaded_file($_FILES["post_img"]["tmp_name"], "../upload/" . $_FILES['post_img']['name']);
$_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
$sorgu = $conn -> prepare("UPDATE posts set
post_title = :post_title,
post_desc = :post_desc,
post_img = :post_img,
post_category = :post_category,
post_content = :post_content
where post_id={$_POST['post_id']}
         ");
$insert = $sorgu -> execute(array(
    "post_title" => $_POST['post_title'],
        "post_desc" => $_POST['post_desc'],
        "post_img" => $_POST['post_img'],
        "post_category" => $_POST['post_category'],
        "post_content" => $_POST['post_content']
    )
);
if($insert){
    Header("Location: http://localhost:8888/PHP-myBLOG/");
    exit;
}
?>