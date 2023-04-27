<?php

namespace Core\API;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Validation\Validator;

class ApiValidation
{
    public function apiAuth()
    {
        $key = "test";
        $jwtString = $_SERVER['HTTP_AUTHORIZATION'];
        $test = str_replace('Bearer', "", $jwtString);
        $test = trim($test);
        $jwt = JWT::decode($test, new Key($key, 'HS256'));
        return $jwt->uid;



    }
}