<?php

namespace Mobar\Database;
use PDO;
class Connection
{
    protected $conn;
    protected $host;
    protected $dbname;
    protected $charset;
    protected $username;
    protected $password;
function __construct()
{
    $this -> conn = $this-> connect();
}

    private function connect(){
        $this->host = "localhost";
        $this->port = 8888;
        $this->name = "phpmyblog";
        $this->user = "root";
        $this->pass = "root";
        try {
            $connect = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->name . ";charset=utf8mb4";
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC];
            return $this->conn = new PDO($connect, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            return die('Database Connection Error: ' . $e->getMessage() . ' (check database connection variables on the app.php)');
        }
}

}