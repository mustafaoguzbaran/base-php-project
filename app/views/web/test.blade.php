<?php
$test = new \Core\Acl\Acl();
var_dump($test->middleware($_SESSION['user_id'], [1]));
print_r($_SERVER);
var_dump($_SESSION['user_id']);

?>