<?php

use Mobar\Models\Posts;

$apiDelete = new Posts();
$data = json_decode(file_get_contents('php://input'), true);
if($_SERVER['HTTP_USER_TOKEN'] == "06032023"){
    $postId = $data['post_id'];
    $returnArray = array();
    $returnArray['status'] = "Success";
    $returnArray['code'] = 200;
    http_response_code(200);
    $returnArray['data'] = $data;
    $returnArray = json_encode($returnArray);
    echo $returnArray;
}else{
    $returnArray['status'] = "Error";
    $returnArray['code'] = 401;
    http_response_code(401);
    $returnArray = json_encode($returnArray);
    echo $returnArray;
}
$apiDelete->postDeleteApi($postId);

?>