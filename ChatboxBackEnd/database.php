<?php
/*/**
 * Created by PhpStorm.
 * User: gimmy
 * Date: 25-1-18
 * Time: 6:47
 */



class Database{


    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "api_db";
    private $username = "root";
    private $password = "";
    public $conn;

    // get the database connection
    public function getConnection()
    {

        $this->conn = null;

        try {

            $this->conn = new PDO("mysql:host=127.0.0.1;dbname=api_db", "root", "");

            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

}
?>
