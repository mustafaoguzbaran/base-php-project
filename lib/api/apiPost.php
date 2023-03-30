<?php

use Mobar\Models\Posts;

$apiInsert = new Posts();
$data = json_decode(file_get_contents('php://input'), true);
if($_SERVER['HTTP_USER_TOKEN'] == "06032023") {
    $postTitle = $data['post_title'];
    $postDesc = $data['post_desc'];
    $postImg = $data['post_img'];
    $postCategory = $data['post_category'];
    $postContent = $data['post_content'];
    $returnArray = array();
    $returnArray['type'] = "Success";
    $returnArray['data'] = $data;
    $returnArray = json_encode($returnArray);
    echo $returnArray;
    $apiInsert->postInstertApi($postTitle, $postDesc, $postImg, $postCategory, $postContent);
}else{
    $returnArray['type'] = "Error";
    $returnArray = json_encode($returnArray);
    echo $returnArray;
}

?>