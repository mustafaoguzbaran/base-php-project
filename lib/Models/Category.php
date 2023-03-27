<?php

namespace Mobar\Models;

use Mobar\Database\Connection;

class Category extends Connection
{
    public function insertCategoryData()
    {
        if (isset($_POST['add_category'])) {
            $insert = $this->conn->prepare("INSERT INTO categories SET 
     category_name = :category_name                      ");
            $insert->execute(array(
                    'category_name' => $_POST['add_category']
                )
            );
        }
        if (isset($insert)) {
            Header("Location: addcategory");
        }
    }

    public function fetchCategoryData()
    {
        $fetch = $this->conn->prepare("SELECT * FROM categories ORDER BY id DESC");
        $fetch->execute();
        return $fetch->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchCategoryDataId($id)
    {
        $test = $id;
        $fetch = $this->conn->prepare("SELECT * FROM categories WHERE id = :id");
        $fetch->bindParam(':id', $test);
        $fetch->execute();
        $fetchCategory =  $fetch->fetch(\PDO::FETCH_ASSOC);
        return $fetchCategory['category_name'];
    }
}