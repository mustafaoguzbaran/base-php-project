<?php

namespace Controllers;

use Core\Acl\Acl;
use http\Header;
use Models\Users;
use Pecee\SimpleRouter\SimpleRouter as Router;
use System\Controller;

class User extends Controller
{
    public $userProcess;
    public $middleware;

    public function __construct()
    {
        $this->userProcess = new Users();
        $this->middleware = new Acl();
    }

    public function index()
    {
        $this->view('web.login', []);
    }

    public function isLogged()
    {
        $fetchUserData = new Users();
        if (isset($_POST['login'])) {
            $check = $_POST['username_login'];
            $test = $fetchUserData->fetch("WHERE username LIKE '%$check%'");
            if ($test == null) {
                echo "Böyle bir kullanıcı bulunamadı";
            } else {
                echo "Kullanıcı Mevcut" . $test['username'] . $test['password'];
                if ($test['username'] == $_POST['username_login'] && $test['password'] == md5($_POST['password_login'])) {
                    $_SESSION['username'] = $test['username'];
                    $_SESSION['user_id'] = $test['id'];
                    return Header('Location: anasayfa');

                } else {
                    echo "Bilgiler Yanlış";
                }
            }
        }
    }


    public static function destroy()
    {
        session_destroy();
        return Header('Location: anasayfa');
    }

    public function fetchUsersApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [3])) {
            return $this->response("true", "Başarılı!", $this->userProcess->all());
        } else {
            return $this->response("false", "Access Denied!", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function fetchUserApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [6])) {
            return $this->response('true', "Başarılı", $this->userProcess->fetch('WHERE id =' . Router::request()->getLoadedRoute()->getParameters()['id']));
        } else {
            return $this->response("false", "Access Denied!", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function registerGet()
    {
        $this->view("web.register");
    }

    public function registerPost()
    {
        $this->userProcess->register();
        return Header("Location: /login");
    }

    public function postUserApi()
    {
        if ($this->middleware->middleware($_SESSION['user_id'], [7])) {
            $insertData = json_decode(file_get_contents("php://input"), true);
            $_POST['username_register'] = $insertData['username'];
            $_POST['password_register'] = md5($insertData['password']);
            $_POST['email_register'] = $insertData['email'];
            $returnArray = array();
            $returnArray = $insertData;
            $this->userProcess->register();
            return $this->response(true, "Başarılı", $returnArray);
        } else {
            return $this->response("false", "Access Denied!", header('HTTP/1.0 401 Unauthorized'));
        }

    }

    public function detail()
    {
        $data = [];
        $data = ['name' => 'Oğuz'];
        return $this->response(true, 'Başarılı!', $data);
    }
}