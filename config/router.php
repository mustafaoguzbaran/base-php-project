<?php
$basename = basename($_SERVER['SCRIPT_NAME']);
$dirname = dirname($_SERVER['SCRIPT_NAME']);
$request_uri = str_replace(array($dirname, $basename), null, $_SERVER['REQUEST_URI']);

?>