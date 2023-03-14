<?php
require_once "../database/conn.php";
if(isset($_POST['insert-category'])) {
    $postCategory = $conn-> prepare("INSERT INTO categories SET 
    category_name = :category_name
    ");
    $insertCategory = $postCategory -> execute(array(
        'category_name' => $_POST['add_category']
    ));
    echo "İşlem başarılı";
}
if($insertCategory){
    Header("Location: http://localhost:8888/PHP-myBLOG/");
    exit;
}else{
    echo "İşlem Hatalı";
}


?>