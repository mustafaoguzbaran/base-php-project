<?php

namespace Mobar\Models;

use http\Header;
use Mobar\Database\Connection;

class User extends Connection
{
    public function hashPasword($password)
    {
        $password = md5($password);
        return $password;
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $check = $_POST['username_login'];
            $sorgu = $this->conn->prepare("SELECT * FROM users WHERE username LIKE '%$check%'");
            $sorgu->execute();
            $fetchUserData = $sorgu->fetch(\PDO::FETCH_ASSOC);
            if ($fetchUserData == null) {
                echo "Böyle bir kullanıcı bulunamadı";
            } else {
                echo "Kullanıcı Mevcut" . $fetchUserData['username'] . $fetchUserData['password'];
                if ($fetchUserData['username'] == $_POST['username_login'] && $fetchUserData['password'] == md5($_POST['password_login'])) {
                    $_SESSION['username'] = $fetchUserData['username'];
                    return Header('Location: anasayfa');

                } else {
                    echo "Bilgiler Yanlış";
                }
            }
        }
    }


    public function register()
    {

        if (isset($_POST['register'])) {
            $checkusername = $_POST['username_register'];
            $checkemail = $_POST['email_register'];
            $passwordHash = $this->hashPasword($_POST['password_register']);
            if (filter_var($checkemail, FILTER_VALIDATE_EMAIL) !== false) {

                $checkUser = $this->conn->prepare("SELECT * FROM users WHERE username = :username OR  email = :email");
                $checkUser->bindParam(':username', $checkusername);
                $checkUser->bindParam(':email', $checkemail);
                $checkUser->execute();
                $fetchCheckUser = $checkUser->fetch(\PDO::FETCH_ASSOC);


                if (isset($fetchCheckUser) && $fetchCheckUser != null) {
                    echo "Böyle bir kullanıcı adı veya email mevcut";
                } else {
                    $insertUser = $this->conn->prepare("INSERT INTO users SET
                  username = :user_nickname,
                  email = :user_email,
                  password = :user_password");
                    $insertUser->bindParam(':user_nickname', $_POST['username_register']);
                    $insertUser->bindParam(":user_email", $_POST['email_register']);
                    $insertUser->bindParam(":user_password", $passwordHash);
                    $check = $insertUser->execute();
                    if (isset($check)) {
                        Header("Location: login");
                    }
                }


            }else{
                echo "Geçersiz E-Posta Girdiniz!";
            }

        }
    }
    public function logout()
    {
        if (isset($_GET['islem']) && $_GET['islem'] == "cikis") {
            session_destroy();
            return Header('Location: anasayfa');
        }
    }
}