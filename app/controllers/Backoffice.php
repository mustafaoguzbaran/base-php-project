<?php

namespace Controllers;
use Models\Category;
use Models\Posts;
use Models\Settings;
use Pecee\SimpleRouter\SimpleRouter as Router;
use System\Controller;

class Backoffice extends Controller
{
    protected object $siteSettings;
    protected object $postProcess;
    protected object $categoryProcess;

    public function __construct()
    {
        $this->siteSettings = new Settings();
        $this->postProcess = new Posts();
        $this->categoryProcess = new Category();
    }

    public function index()
    {
        $this->view("backoffice.backoffice", ['settings' => $this->siteSettings->fetch()]);
    }

    public function updateSettings()
    {
        $this->siteSettings->updateSettings();
    }

    public function addPostGet()
    {
        $this->view('backoffice.addpost', ["categoryFetch" => $this->categoryProcess->all("ORDER BY id DESC")]);
    }

    public function addPostPost()
    {
        $dizin = str_replace("/backoffice/addpost", "", $_SERVER['REQUEST_URI']);
        $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
        $dosyaAdiAl = $_FILES["post_img"]["name"];
        move_uploaded_file($_FILES["post_img"]["tmp_name"], "upload/" . $_FILES['post_img']['name']);
        $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
        $this->postProcess->postInsert();

    }

    public function addCategoryGet()
    {
        $this->view("backoffice.addcategory", ['fetchCategory' => $this->categoryProcess->all("ORDER BY id DESC")]);
    }

    public function addCategoryPost()
    {
        $this->categoryProcess->categoryInsert();
    }

    public function editPost()
    {
        $this->postProcess->all("ORDER BY post_id DESC");
        $this->view("backoffice.editpost", ['editPost' => $this->postProcess->all("ORDER BY post_id DESC")]);
    }
    public function postUpdateGet(){
        $this->view('backoffice.postupdate', ['postUpdate' => $this->postProcess->fetch('WHERE post_id = ' . Router::request()->getLoadedRoute()->getParameters()['id']), 'categoryFetch' => $this->categoryProcess->all("ORDER BY id DESC")]);

    }
    public function postUpdatePost(){
        $dizin = str_replace("/backoffice/addpost", "", $_SERVER['REQUEST_URI']);
        $dosyaYolu = "http://" . $_SERVER['HTTP_HOST'] . $dizin . "/upload/";
        $dosyaAdiAl = $_FILES["post_img"]["name"];
        move_uploaded_file($_FILES["post_img"]["tmp_name"], "upload/" . $_FILES['post_img']['name']);
        $_POST['post_img'] = $dosyaYolu . $dosyaAdiAl;
        $this->postProcess->updatePost(Router::request()->getLoadedRoute()->getParameters()['id']);
    }
    public function postDelete(){
        $this->postProcess->delete((intval(Router::request()->getLoadedRoute()->getParameters()['id'])));
    }

}