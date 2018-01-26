<?php
/**
 * Created by PhpStorm.
 * User: gimmy
 * Date: 25-1-18
 * Time: 16:19
 */

include_once '../database.php';

class Api
{

    // database connection and table name
    private $conn;
    private $table_name = "Message";

    // object properties
    public $id;
    public $username;
    public $mykey;
    public $value;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }


    function read(){
        // select all query
        $query = "SELECT * FROM Message WHERE id > :id AND mykey = :mykey";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id & mykey of message to be updated
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":mykey", $this->mykey);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function create(){

        // query to insert record
        $query = "INSERT INTO Message (mykey , value)
                  VALUES ('$this->mykey', '$this->value')";

        // prepare query
        $stmt = $this->conn->prepare($query);
        $stmt->execute();


        $query2 = "SELECT * FROM `Message` ORDER BY Message.id DESC LIMIT 1;";
        $stmt2 = $this->conn->prepare($query2);

        // execute query
        if($stmt->execute()){
            $stmt2->execute();
            $row = $stmt2->fetch(PDO::FETCH_ASSOC);
            $this->id = ($row['id']);


            return true;
        }

        return false;

    }

}