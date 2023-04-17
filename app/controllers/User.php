<?php

namespace Controllers;

use http\Header;
use Models\Users;
use Pecee\SimpleRouter\SimpleRouter as Router;
use System\Controller;

class User extends Controller
{
    protected $userProcess;
    public function __construct()
    {
        $this->userProcess = new Users();
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
    public function fetchUsersApi(){
        return $this->response("true", "Başarılı!", $this->userProcess->all());
    }
    public function fetchUserApi(){
        return $this->response('true', "Başarılı", $this->userProcess->fetch('WHERE id ='));
    }
    public function registerGet(){
        $this->view("web.register");
    }
    public function registerPost(){
        $this->userProcess->register();
    }
    public function postUserApi(){
        return $this->response("true", "Başarılı!", $this->userProcess->register());
    }

    public function detail()
    {
        $data = [];
        $data = ['name' => 'Oğuz'];
        return $this->response(true, 'Başarılı!', $data);
    }
}