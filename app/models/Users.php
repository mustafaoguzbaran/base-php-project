<?php

namespace Models;

use Controllers\User;
use Core\Model\Model;

class Users extends Model
{
    protected string $tableName = "users";

    public function isLogged()
    {

    }
}