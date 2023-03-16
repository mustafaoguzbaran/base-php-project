<?php

namespace Mobar\Models;

use Mobar\Database\Connection;

class Posts extends Connection
{
    public function PostInsert()
    {
        $dizin = str_replace("/src/backoffice/add.php", null, $_SERVER['REQUEST_URI']);
        $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
        $dosyaAdiAl = $_FILES["post_img"]["name"];
        move_uploaded_file($_FILES["post_img"]["tmp_name"], "../upload/" . $_FILES['post_img']['name']);
        $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
        echo $dosyaYolu;
        if (isset($_POST['insert-post'])) {
            $post = $conn->prepare("INSERT INTO posts set
post_title = :post_title,
post_desc = :post_desc,
post_img = :post_img,
post_category = :post_category,
post_content = :post_content
");
            $insertPost = $post->execute(array(
                'post_title' => $_POST['post_title'],
                'post_desc' => $_POST['post_desc'],
                'post_content' => $_POST['post_content'],
                'post_img' => $_POST['post_img'],
                'post_category' => $_POST['post_category']
            ));
        }
        if ($insertPost) {
            Header("Location: http://localhost:8888/PHP-myBLOG/");
        }

    }

    public function fetchPostData($fetchData)
    {
        $fetch = $this->conn->prepare("SELECT * FROM posts ORDER BY post_id DESC");
        $fetch->execute();
        $fetchDataPost = $fetch->fetch(\PDO::FETCH_ASSOC);
        return $fetchDataPost[$fetchData];
    }

    public function fetchPostAllData()
    {
        $fetch = $this->conn->prepare("SELECT * FROM posts ORDER BY post_id DESC");
        $fetch->execute();
        return $fetch->fetchAll(\PDO::FETCH_ASSOC);

    }


    public function getPostDataById(int $postId)
    {

    }
}