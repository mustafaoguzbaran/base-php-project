<?php

namespace System;

use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeFileLoader;
use Windwalker\Edge\Loader\EdgeStringLoader;
use Windwalker\Edge\Extension\EdgeExtensionInterface;

class Controller
{
    public function __construct()
    {
        //
    }

    public function view($view, $data = [])
    {
        $paths = array("app/views");
        $edge = new Edge(new EdgeFileLoader($paths));
        echo $edge->render($view, $data);
    }

    public function response($status = true, $message = '', $data = [])
    {
        Header('Content-Type: application/json');
        return json_encode(['status' => $status, 'message' => $message, 'data' => $data]);
    }
}
