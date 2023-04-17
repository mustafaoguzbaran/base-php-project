<?php

namespace Models;

use PDO;

class Database
{
    protected $conn;
    protected $host = "127.0.0.1";
    protected $port = "8889";
    protected $dbname = "phpmyblog";
    protected $charset;
    protected $username = "root";
    protected $password = "root";

    function __construct()
    {
        $this->conn = $this->connect();
    }

    private function connect()
    {
        try {
            $connect = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname . ";charset=utf8mb4";
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC];
            return $this->conn = new PDO($connect, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            return die('Database Connection Error: ' . $e->getMessage() . ' (check database connection variables on the app.php)');
        }
    }

}