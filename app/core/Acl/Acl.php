<?php

namespace Core\Acl;

use Controllers\User;
use Models\Database;
use PDO;

class Acl extends Database
{
    public $permission = [];

    public function in_array_any($values, $arr)
    {
        return !empty(array_intersect($values, $arr));
    }

    public function apiUserisLoged()
    {

        $fetchUserData = new User();
        $check = $_SERVER['PHP_AUTH_USER'];

        $fetch = $fetchUserData->userProcess->fetch("WHERE username LIKE '%$check%'");
        if ($fetch['username'] == $_SERVER['PHP_AUTH_USER'] && $fetch['password'] == md5($_SERVER['PHP_AUTH_PW'])) {
            session_destroy();
            $_SESSION['user_id'] = $fetch['id'];
        }


    }

    public function middleware($userId, $permission)
    {
        $this->permission = $permission;
        $returnArr = array();
        $stmt = $this->conn->prepare("SELECT * FROM userroles WHERE user_id = :id ");
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $fetchRolesId = $stmt->fetch(\PDO::FETCH_ASSOC);
        $stmt = $this->conn->prepare("SELECT * FROM rolepermissions WHERE role_id = :id ");
        $stmt->bindParam(":id", $fetchRolesId['roles_id']);
        $stmt->execute();
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $value) {
            array_push($returnArr, $value['permission_id']);
        }
        $check = $this->in_array_any($permission, $returnArr);
        return $check;
    }

}
