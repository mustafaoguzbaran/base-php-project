<?php

namespace Mobar\Models;

use http\Header;
use Mobar\Database\Connection;

class Posts extends Connection
{
    public function PostInsert()
    {
        if (isset($_POST['insert-post'])) {
            $dizin = str_replace("/src/backoffice/add.php", null, $_SERVER['REQUEST_URI']);
            $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
            $dosyaAdiAl = $_FILES["post_img"]["name"];
            move_uploaded_file($_FILES["post_img"]["tmp_name"], "../../upload/" . $_FILES['post_img']['name']);
            $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;


            $post = $this->conn->prepare("INSERT INTO posts set
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

    }


    public function fetchPostAllData()
    {
        $fetch = $this->conn->prepare("SELECT * FROM posts ORDER BY post_id DESC");
        $fetch->execute();
        return $fetch->fetchAll(\PDO::FETCH_ASSOC);

    }


    public function deletePostData()
    {
        if (isset($_GET['post_id'])) {
            $sil = $this->conn->prepare("DELETE FROM posts where post_id = :post_id");
            $kontrol = $sil->execute(array(
                    'post_id' => $_GET['post_id']
                )
            );
        }
    }

    public function updatePostData()
    {
        $dizin = str_replace("/src/backoffice/add.php", null, $_SERVER['REQUEST_URI']);
        $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
        $dosyaAdiAl = $_FILES["post_img"]["name"];
        move_uploaded_file($_FILES["post_img"]["tmp_name"], "../../upload/" . $_FILES['post_img']['name']);
        $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
        echo $dizin;
        $sorgu = $this->conn->prepare("UPDATE posts set
            post_title = :post_title,
            post_desc = :post_desc,
            post_img = :post_img,
            post_category = :post_category,
            post_content = :post_content
            where post_id= :id
         ");
        $insert = $sorgu->execute(array(
                "post_title" => $_POST['post_title'],
                "post_desc" => $_POST['post_desc'],
                "post_img" => $_POST['post_img'],
                "post_category" => $_POST['post_category'],
                "post_content" => $_POST['post_content'],
                "id" => $_GET['post_id']
            )
        );
        if ($insert) {
            Header("Location: http://localhost:8888/PHP-myBLOG/");
            exit;
        }
    }

    public function fetchPostContentData($fetchDataCheck)
    {
        $fetchData = $this->conn->prepare("SELECT * FROM posts WHERE post_id = :id");
        $fetchData->execute(array(
            "id" => $_GET['post_id']
        ));
        $fetchContentData = $fetchData->fetch(\PDO::FETCH_ASSOC);
        return $fetchContentData[$fetchDataCheck];
    }
}