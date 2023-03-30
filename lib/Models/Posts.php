<?php

namespace Mobar\Models;

use http\Header;
use Mobar\Database\Connection;

class Posts extends Connection
{
    public function PostInsert()
    {
        if (isset($_POST['insert-post'])) {
            $dizin = str_replace("/postinsert", null, $_SERVER['REQUEST_URI']);
            $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
            $dosyaAdiAl = $_FILES["post_img"]["name"];
            move_uploaded_file($_FILES["post_img"]["tmp_name"], "upload/" . $_FILES['post_img']['name']);
            $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;


            $post = $this->conn->prepare("INSERT INTO posts set
                post_title = :post_title,
                post_desc = :post_desc,
                post_img = :post_img,
                post_category = :post_category,
                post_content = :post_content
");
            $post->bindParam(':post_title', $_POST['post_title']);
            $post->bindParam(':post_desc', $_POST['post_desc']);
            $post->bindParam(':post_img', $_POST['post_img']);
            $post->bindParam(':post_category', $_POST['post_category']);
            $post->bindParam(':post_content', $_POST['post_content']);
            $post->execute();
        }
    }
    public function postInstertApi($postTitle, $postDesc, $postImg, $postCategory, $postContent){
        $postApi = $this->conn->prepare("INSERT INTO posts SET 
                post_title = :post_title,
                post_desc = :post_desc,
                post_img = :post_img,
                post_category = :post_category,
                post_content = :post_content");
        $postApi->bindParam(':post_title', $postTitle);
        $postApi->bindParam(':post_desc', $postDesc);
        $postApi->bindParam(':post_img', $postImg);
        $postApi->bindParam(':post_category', $postCategory);
        $postApi->bindParam(':post_content', $postContent);
        $postApi->execute();
    }


    public function fetchPostAllData()
    {
        $fetch = $this->conn->prepare("SELECT * FROM posts ORDER BY post_id DESC");
        $fetch->execute();
        return $fetch->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function counter(){
        $test = $this->conn->prepare("SELECT * FROM posts");
        $test->execute();
        return ceil($test->rowCount() / 5);
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
        if (isset($_POST['post_update'])) {
            $dizin = str_replace("/postupdateprocess?post_id=" . $_GET['post_id'], null, $_SERVER['REQUEST_URI']);
            $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
            $dosyaAdiAl = $_FILES["post_img"]["name"];
            move_uploaded_file($_FILES["post_img"]["tmp_name"], "upload/" . $_FILES['post_img']['name']);
            $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
            echo $dizin;
            $postUpdate = $this->conn->prepare("UPDATE posts set
            post_title = :post_title,
            post_desc = :post_desc,
            post_img = :post_img,
            post_category = :post_category,
            post_content = :post_content
            where post_id = :id
         ");
            $postUpdate->bindParam(':post_title', $_POST['post_title']);
            $postUpdate->bindParam(':post_desc', $_POST['post_desc']);
            $postUpdate->bindParam(':post_img', $_POST['post_img']);
            $postUpdate->bindParam(':post_category', $_POST['post_category']);
            $postUpdate->bindParam(':post_content', $_POST['post_content']);
            $postUpdate->bindParam(':id', $_POST['post_id']);
            $postUpdateData = $postUpdate->execute();
            if(isset($postUpdateData)){
                Header("Location: anasayfa");
            }
        }

    }

    public function fetchPostContentData($fetchDataCheck)
    {
        $fetchData = $this->conn->prepare("SELECT * FROM posts WHERE post_id = :id");
        $fetchData->bindParam(':id', $_GET['post_id']);
        $fetchData->execute();
        $fetchContentData = $fetchData->fetch(\PDO::FETCH_ASSOC);
        return $fetchContentData[$fetchDataCheck];
    }
    public function postSearch()
    {
        $key = $_POST['search'];
        if (isset($_POST['searchbutton'])) {
            $searchPost = $this->conn->query("SELECT * FROM posts WHERE post_title LIKE '%$key%'", \PDO::FETCH_ASSOC);
            $searchPost->execute();
            $searchPostData = $searchPost->fetchAll(\PDO::FETCH_ASSOC);
            if(!empty($searchPostData)){
                return $searchPostData;

            }else{
                echo "<center>Veri Bulunamadı</center>";
                exit();
            }
        }
    }
}