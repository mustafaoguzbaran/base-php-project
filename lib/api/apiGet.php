<?php

use Mobar\Models\Posts;

$data = new Posts();
$token = "06032023";
if($_GET['token'] == $token) {
    $returnArray = array();
    $returnArray['type'] = "Success";
    $returnArray['count'] = count($data->fetchPostAllData());
    $returnArray['data'] = $data->fetchPostAllData();
    $sonVeri = json_encode($returnArray, 1);
    echo($sonVeri);
    }else{
    $returnArray = array();
    $returnArray['type'] = "Error";
    $sonVeri = json_encode($returnArray, 1);
    echo($sonVeri);
}
?>