<?php

use Mobar\Models\Posts;

$apiUpdate = new Posts();
$data = json_decode(file_get_contents("php://input"), true);
if($_SERVER['HTTP_USER_TOKEN'] == "06032023") {
    $postId = $data['post_id'];
    $postTitle = $data['post_title'];
    $postDesc = $data['post_desc'];
    $postImg = $data['post_img'];
    $postContent = $data['post_content'];
    $returnArray = array();
    $returnArray['status'] = "Success";
    $returnArray['code'] = 200;
    $returnArray['data'] = $data;
    $returnArray = json_encode($returnArray);
    echo $returnArray;
    $apiUpdate->postUpdateApi($postTitle, $postDesc, $postImg, $postContent, $postId);
    }else{
    $returnArray['status'] = "Error";
    $returnArray['code'] = 401;
    http_response_code(401);
    $returnArray = json_encode($returnArray);
    echo $returnArray;
}
?>