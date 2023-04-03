<?php
declare(strict_types=1);
use Mobar\Core\Router;
define("ROOTFOLDER", dirname($_SERVER['SCRIPT_NAME']));

require_once "vendor/autoload.php";

Router::get('/', function() {
    require "public/index.php";
});
Router::get('/anasayfa', function (){
    require "public/index.php";
});
Router::get('/backoffice', function (){
    require "views/backoffice/backoffice.php";
});
Router::post('/siteupdate', function (){
    require "views/backoffice/backoffice.php";
});
Router::get("/login", function (){
   require "views/web/login.php";
});
Router::post('/logincheck', function (){
    require "views/web/login.php";
});
Router::get('/register', function (){
   require "views/web/register.php";
});
Router::post('/userregister', function (){
    require "views/web/register.php";
});
Router::get('/addcategory', function (){
    require "views/backoffice/addcategory.php";
});
Router::post('/addcategoryinsert', function (){
    require "views/backoffice/addcategory.php";
});

Router::get('/contentlist', function (){
    require "views/backoffice/contentlist.php";
});
Router::get('/add', function (){
   require "views/backoffice/add.php";
});
Router::post('/postinsert', function (){
   require "views/backoffice/add.php";
});
Router::get('/upload', function (){
    require "upload/";
});
Router::get('/postdetail', function (){
    require "views/web/single.php";
});
Router::get('/postupdate', function (){
    require "views/backoffice/post_update.php";
});
Router::post('/postupdateprocess', function (){
    require "views/backoffice/post_update.php";
});
Router::get('/search', function (){
    require "views/web/search.php";
});
Router::post('/searchdata', function (){
    require "views/web/search.php";
});
Router::post('/postdetail', function (){
    require "views/web/single.php";
});
Router::get('/apiGet', function (){
    require "lib/api/apiGet.php";
});
Router::post('/apiPost', function (){
    require "lib/api/apiPost.php";
});
Router::put('/apiUpdate', function (){
    require "lib/api/apiUpdate.php";
});
Router::delete('/apiDelete', function (){
    require "lib/api/apiDelete.php";
});
// Rota kontrol metotunu çağırır.
Router::dispatch();
?>