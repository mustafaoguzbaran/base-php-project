<?php

namespace Mobar\Core;

class Router
{
    public static $routes = [];
    public static $methods = [];
    public static $callbacks = [];

    public static function __callstatic($method, $params)
    {
        array_push(self::$routes, $params[0]);
        // Http yöntemlerini saklar. GET, POST, PUT ...
        array_push(self::$methods, strtoupper($method));
        //Geri çağırım dizisi, sınıf isimlerini ve anonim fonksiyon parametrelerini saklar.
        array_push(self::$callbacks, $params[1]);
    }

    public static function dispatch()
    {
        $req_uri = $_SERVER['REQUEST_URI'];
        if (substr($req_uri, 0, strlen(\ROOTFOLDER)+1) === \ROOTFOLDER.'/') {
            $path = substr($req_uri, strlen(\ROOTFOLDER));
        } else {
            $path = $req_uri;
        }

        $uri = urldecode(parse_url($path, PHP_URL_PATH));

        foreach (self::$routes as $routeKey => $route) {

            $found_route = false;
            if ( preg_match('~^'.$route.'$~', $uri, $matched) && self::$methods[$routeKey] == $_SERVER['REQUEST_METHOD']) {
                $found_route = true;
                $routingDefinition =  self::$callbacks[$routeKey];
                $parts = explode('/',$matched[0]);
                array_shift($parts);
                call_user_func_array($routingDefinition, $parts);
                break;

            }

        }

        if ($found_route == false) {
            echo "404 - Page Not Found";
        }


    }
}