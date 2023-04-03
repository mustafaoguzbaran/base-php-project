<?php

use Mobar\Models\Posts;

$data = new Posts();
if($_SERVER['HTTP_USER_TOKEN'] == "06032023") {
    $returnArray = array();
    $returnArray['type'] = "Success";
    $returnArray['code'] = 200;
    http_response_code(200);
    $returnArray['count'] = count($data->fetchPostAllData());
    $returnArray['data'] = $data->fetchPostAllData();
    $sonVeri = json_encode($returnArray, 1);
    echo($sonVeri);
    }else{
    $returnArray = array();
    $returnArray['type'] = "Error";
    $returnArray['code'] = 401;
    http_response_code(401);
    $sonVeri = json_encode($returnArray, 1);
    echo($sonVeri);
}
?>