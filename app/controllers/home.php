<?php
namespace Controllers;
use Models\Category;
use Models\Posts;
use Models\Settings;
use Pecee\SimpleRouter\SimpleRouter as Router;
use System\Controller;

class home extends Controller
{
    protected $postProcess;
    protected $categoryProcess;
    public function __construct()
    {
       $this->postProcess = new Posts();
       $this->categoryProcess = new Category();
    }

    public function fetchPostsApi() {
    $data = $this->postProcess->all("ORDER BY post_id DESC");
    return $this->response(true, "Başarılı", $data);
    }
public function index(){
    $this->view('web.mainpage', ['posts'=>$this->postProcess->all("ORDER BY post_id DESC")]);
}
public function postDetail(){
    $this->view('web.postdetail', ['post'=>$this->postProcess->fetch("WHERE post_id = " . intval(Router::request()->getLoadedRoute()->getParameters()['id'])), 'categoryFetch' => $this->categoryProcess->fetch("WHERE id = " . intval(Router::request()->getLoadedRoute()->getParameters()['id']))]);
}

}