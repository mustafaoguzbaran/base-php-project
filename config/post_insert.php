<?php
require_once "../database/conn.php";
$dirname = dirname($_SERVER['SCRIPT_NAME']);
$dizin = str_replace("/config/post_insert.php", null, $_SERVER['REQUEST_URI']);
$dosyaYolu = "http://".$_SERVER['HTTP_HOST'].$dizin . "/upload/";
$dosyaAdiAl = $_FILES["post_img"]["name"];
move_uploaded_file($_FILES["post_img"]["tmp_name"], "../upload/" . $_FILES['post_img']['name']);
$_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
if(isset($_POST['insert-post'])) {
$post = $conn->prepare("INSERT INTO posts set
post_title = :post_title,
post_desc = :post_desc,
post_img = :post_img,
post_content = :post_content
");
$insertPost = $post ->execute(array(
'post_title' => $_POST['post_title'],
'post_desc' => $_POST['post_desc'],
'post_content' => $_POST['post_content'],
'post_img' => $_POST['post_img']
));
}
if($insertPost){
Header("Location: http://localhost:8888/PHP-myBLOG/");
}

?>