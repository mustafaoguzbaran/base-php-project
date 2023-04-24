<?php

namespace Controllers;

use Core\Acl\Acl;
use Models\Category;
use Models\Posts;
use Models\Settings;
use Pecee\SimpleRouter\Route\Route;
use Pecee\SimpleRouter\SimpleRouter as Router;
use System\Controller;

class home extends Controller
{
    protected $middleware;
    protected $postProcess;
    protected $categoryProcess;

    public function __construct()
    {
        $this->middleware = new Acl();
        $this->middleware->apiUserisLoged();
        $this->postProcess = new Posts();
        $this->categoryProcess = new Category();
    }

    public function fetchPostsApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [1])) {
            $data = $this->postProcess->all("ORDER BY post_id DESC");
            return $this->response(true, "Başarılı", $data);
        } else {
            return $this->response("false", "Access Denied!", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function fetchPostApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [1])) {
            $data = $this->postProcess->fetch("WHERE post_id = " . Router::request()->getLoadedRoute()->getParameters()['id']);
            return $this->response(true, "Başarılı", $data);
        } else {
            return $this->response("false", "Access Denied", header('HTTP/1.0 401 Unauthorized'));
        }

    }

    public function deletePostApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [4])) {
            $delete = $this->postProcess->delete(Router::request()->getLoadedRoute()->getParameters()['id']);
            return $this->response(true, "Başarılı", $delete);
        } else {
            return $this->response("false", "Access Denied", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function postInsertApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [2])) {
            $insertData = json_decode(file_get_contents('php://input'), true);
            $_POST['post_title'] = $insertData['post_title'];
            $_POST['post_desc'] = $insertData['post_desc'];
            $_POST['post_img'] = $insertData['post_img'];
            $_POST['post_category'] = $insertData['post_category'];
            $_POST['post_content'] = $insertData['post_content'];
            $returnArray = array();
            $returnArray = $insertData;
            $this->postProcess->postInsert();
            return $this->response(true, "Başarılı", $returnArray);
        } else {
            return $this->response("false", "Access Denied", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public
    function postUpdateApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [5])) {
            $updateData = json_decode(file_get_contents("php://input"), true);
            $id = $updateData['id'];
            $_POST['post_title'] = $updateData['post_title'];
            $_POST['post_desc'] = $updateData['post_desc'];
            $_POST['post_img'] = $updateData['post_img'];
            $_POST['post_category'] = $updateData['post_category'];
            $_POST['post_content'] = $updateData['post_content'];
            $returnArray = array();
            $returnArray = $updateData;
            $this->postProcess->updatePost($id);
            return $this->response(true, "Başarılı", $returnArray);
        } else {
            return $this->response("false", "Access Denied", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public
    function index()
    {
        $this->view('web.mainpage', ['posts' => $this->postProcess->all("ORDER BY post_id DESC")]);
    }

    public
    function postDetail()
    {
        $this->view('web.postdetail', ['post' => $this->postProcess->fetch("WHERE post_id = " . intval(Router::request()->getLoadedRoute()->getParameters()['id'])), 'categoryFetch' => $this->categoryProcess->fetch("WHERE id = " . intval(Router::request()->getLoadedRoute()->getParameters()['id']))]);
    }

    public
    function testGet()
    {
        $this->view('web.test');
    }

}