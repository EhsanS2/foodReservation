<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 12/10/2018
 * Time: 9:54 AM
 */
class user {
    private $name;
    private $user_id;
    private $permission;
    private $password;
    public function getName() {return $this->name;}
    public function getPass() {return $this->password;}
    public function getUser_id() {return $this->user_id;}
    public function getPermission() {return $this->permission;}
    function __construct($id, $pass, $name, $per)
    {
        $this->user_id = $id;
        $this->password = $pass;
        $this->name = $name;
        $this->permission = $per;
    }

}

class db {
    private $database;
    private $host;
    private $user;
    private $password;
    function __construct($db, $host, $user, $pass) {
        $this->database = $db;
        $this->host = $host;
        $this->user = $user;
        $this->password = $pass;
    }
 /*   public function dbConnect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
    public function queryExecute($query, $conn) {
        $st = $conn->prepare($query);
        $st->execute();
        $result = $st->fetchAll();
        return $result;

    }*/
}




?>