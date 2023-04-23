<?php

namespace Core\Model;

use http\Header;
use Models\Database;
use System\Controller;

class Model extends Database
{
    protected string $tableName;
    protected string $cond;

    public function all($cond = null)
    {
        if ($cond == null) {
            $fetchData = $this->conn->prepare("SELECT * FROM $this->tableName");
            $fetchData->execute();
            return $fetchData->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $fetchData = $this->conn->prepare("SELECT * FROM $this->tableName $cond");
            $fetchData->execute();
            return $fetchData->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function fetch($cond = null)
    {
        if ($cond == null) {
            $fetchData = $this->conn->prepare("SELECT * FROM $this->tableName");
            $fetchData->execute();
            return $fetchData->fetch(\PDO::FETCH_ASSOC);
        } else {
            $fetchData = $this->conn->prepare("SELECT * FROM $this->tableName $cond");
            $fetchData->execute();
            return $fetchData->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public function updateSettings()
    {
        $updateSettings = $this->conn->prepare("UPDATE $this->tableName SET logo = :logo, header_title = :header_title, header_desc = :header_desc, side_title = :side_title, side_desc = :side_desc where id = 1");
        $updateSettings->bindParam(':logo', $_POST['logo']);
        $updateSettings->bindParam(':header_title', $_POST['site_header_title']);
        $updateSettings->bindParam(':header_desc', $_POST['site_header_desc']);
        $updateSettings->bindParam(':side_title', $_POST['side_title']);
        $updateSettings->bindParam(':side_desc', $_POST['side_desc']);
        $updateSettings->execute();
        return Header("Location: /backoffice");
    }

    public function updatePost($id)
    {
        $updatePost = $this->conn->prepare("UPDATE $this->tableName SET post_title = :post_title, post_desc = :post_desc, post_img = :post_img, post_category = :post_category, post_content = :post_content WHERE post_id = $id");
        $updatePost->bindParam(':post_title', $_POST['post_title']);
        $updatePost->bindParam(':post_desc', $_POST['post_desc']);
        $updatePost->bindParam(':post_img', $_POST['post_img']);
        $updatePost->bindParam(':post_category', $_POST['post_category']);
        $updatePost->bindParam(':post_content', $_POST['post_content']);
        $updatePost->execute();
    }

    public function postInsert()
    {
        $postInsert = $this->conn->prepare("INSERT INTO $this->tableName SET post_title = :post_title, post_desc = :post_desc, post_img = :post_img, post_category = :post_category, post_content = :post_content
");
        $postInsert->bindParam(':post_title', $_POST['post_title']);
        $postInsert->bindParam(':post_desc', $_POST['post_desc']);
        $postInsert->bindParam(':post_img', $_POST['post_img']);
        $postInsert->bindParam(':post_category', $_POST['post_category']);
        $postInsert->bindParam(':post_content', $_POST['post_content']);
        $postInsert->execute();

    }

    public function categoryInsert()
    {
        $categoryInsert = $this->conn->prepare("INSERT INTO $this->tableName SET category_name = :category_name");
        $categoryInsert->bindParam(":category_name", $_POST['add_category']);
        $categoryInsert->execute();
        return Header("Location: addcategory");
    }

    public function delete($id)
    {
        $delete = $this->conn->prepare("DELETE FROM $this->tableName WHERE post_id = :id");
        $delete->bindParam(":id", $id);
        $delete->execute();
        return Header("Location: /backoffice/editpost");
    }

    public function register()
    {
        $checkusername = $_POST['username_register'];
        $checkemail = $_POST['email_register'];
        $passwordHash = md5(($_POST['password_register']));
        if (filter_var($checkemail, FILTER_VALIDATE_EMAIL) !== false) {

            $checkUser = $this->conn->prepare("SELECT * FROM $this->tableName WHERE username = :username OR  email = :email");
            $checkUser->bindParam(':username', $checkusername);
            $checkUser->bindParam(':email', $checkemail);
            $checkUser->execute();
            $fetchCheckUser = $checkUser->fetch(\PDO::FETCH_ASSOC);


            if (isset($fetchCheckUser) && $fetchCheckUser != null) {
                echo "Böyle bir kullanıcı adı veya email mevcut";
            } else {
                $insertUser = $this->conn->prepare("INSERT INTO $this->tableName SET username = :user_nickname, email = :user_email, password = :user_password");
                $insertUser->bindParam(':user_nickname', $_POST['username_register']);
                $insertUser->bindParam(":user_email", $_POST['email_register']);
                $insertUser->bindParam(":user_password", $passwordHash);
                $insertUser->execute();

            }
        }
    }
}