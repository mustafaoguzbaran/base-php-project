<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', "Controllers\home@index");
Router::get('/anasayfa', "Controllers\home@index");
Router::get('/login', "Controllers\User@index");
Router::post('/login', "Controllers\User@isLogged");
Router::get("/register", "Controllers\User@registerGet");
Router::post("/register", "Controllers\User@registerPost");
Router::get('/cikis', "Controllers\User@destroy");
Router::get('/postdetail/{id}', "Controllers\home@postDetail");

Router::group(['prefix' => "/backoffice"], function () {
    Router::get('/', "Controllers\Backoffice@index");
    Router::post('/updatesettings', "Controllers\Backoffice@updateSettings");
    Router::get('/addpost', "Controllers\Backoffice@addPostGet");
    Router::post('/addpost', "Controllers\Backoffice@addPostPost");
    Router::get('/addcategory', "Controllers\Backoffice@addCategoryGet");
    Router::post('/addcategory', "Controllers\Backoffice@addCategoryPost");
    Router::get('/editpost', "Controllers\Backoffice@editPost");
    Router::get('/postupdate/{id}', 'Controllers\Backoffice@postUpdateGet');
    Router::post('/postupdate/{id}', "Controllers\Backoffice@postUpdatePost");
    Router::get('/deletepost/{id}', "Controllers\Backoffice@postDelete");

});


Router::group(['prefix' => "/api/v1"], function () {
    Router::get('/detail', "Controllers\User@detail");
    Router::get('/posts', "Controllers\home@fetchPostsApi");
    Router::get('/post/{id}', "Controllers\home@fetchPostApi");
    Router::delete('/postdelete/{id}', "Controllers\home@deletePostApi");
    Router::put('/postupdate', "");
    Router::post('/postinsert', "");
    Router::get("/users", "Controllers\User@fetchUsersApi");
    Router::get("/user/{id}", "Controllers\User@fetchUserApi");
    Router::post("/postuser", "Controllers\User@postUserApi");
});

Router::start();
?>