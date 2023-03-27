<?php

namespace Mobar\Models;

use http\Header;
use Mobar\Database\Connection;

class Comments extends Connection
{
    public function pushComment()
    {
        if (isset($_POST['push_comment'])) {
            $push = $this->conn->prepare("INSERT INTO comments SET
                        comment_detail = :comment_detail,
                        post_id = :post_comment_id
                     ");
            $push->bindParam(':comment_detail', $_POST['comment_detail']);
            $push->bindParam(":post_comment_id", $_GET['post_id']);
            $push->execute();
        }

    }
    public function fetchComment(){
        $fetch = $this->conn->prepare("SELECT * FROM comments WHERE post_id = :id");
        $fetch->bindParam(":id", $_GET['post_id']);
        $fetch->execute();
        return $fetch->fetchAll(\PDO::FETCH_ASSOC);
    }
}
