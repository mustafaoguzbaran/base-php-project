<?php

namespace Controllers;

use Core\Acl\Acl;
use Core\API\ApiValidation;
use Core\API\WebhookService;
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
    protected $tokenId;
    protected $webhookService;

    public function __construct()
    {
        $this->tokenId = new ApiValidation();
        $this->middleware = new Acl();
        $this->middleware->apiUserisLogged();
        $this->postProcess = new Posts();
        $this->categoryProcess = new Category();
        $this->webhookService = new WebhookService();

    }

    public function fetchPostsApi()
    {
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [1])) {
            $data = $this->postProcess->all("ORDER BY post_id DESC");
            return $this->response(true, "Başarılı", $data);
        } else {
            return $this->response("false", "Access Denied!", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function fetchPostApi()
    {
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [1])) {
            $data = $this->postProcess->fetch("WHERE post_id = " . Router::request()->getLoadedRoute()->getParameters()['id']);
            return $this->response(true, "Başarılı", $data);
        } else {
            return $this->response("false", "Access Denied", header('HTTP/1.0 401 Unauthorized'));
        }

    }

    public function deletePostApi()
    {
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [4])) {
            $delete = $this->postProcess->delete(Router::request()->getLoadedRoute()->getParameters()['id']);
            return $this->response(true, "Başarılı", $delete);
        } else {
            return $this->response("false", "Access Denied", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function postInsertApi()
    {
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [2])) {
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
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [5])) {
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
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $url = "http://localhost:8080/webhookresponse";
            $data = array("name" => "Mustafa Oğuz", "Surname"=>"Baran");
            $options = array(
                "http" => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
        }else{
            header('Content-Type: application/json');
            $response_array = array('status' => 'false', 'message' => 'Webhook İşlenmedi');
            return json_encode($response_array);
        }
    }
    public function testPost(){
        $this->webhookService->webhookPost();
    }
public function apidoc(){
        $this->view("web.apidoc");
}

}