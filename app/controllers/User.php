<?php

namespace Controllers;

use Core\Acl\Acl;
use Core\API\ApiValidation;
use DateTimeImmutable;
use http\Header;
use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Token\Builder;
use Models\Users;
use Pecee\SimpleRouter\SimpleRouter as Router;
use System\Controller;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class User extends Controller
{
    public $userProcess;
    public $middleware;
    public $tokenId;

    public function __construct()
    {
        $this->tokenId = new ApiValidation();
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
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [3])) {
            return $this->response("true", "Başarılı!", $this->userProcess->all());
        } else {
            return $this->response("false", "Access Denied!", header('HTTP/1.0 401 Unauthorized'));
        }
    }

    public function fetchUserApi()
    {
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [6])) {
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
        if ($this->middleware->middleware($this->tokenId->apiAuth(), [7])) {
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
