<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 12/10/2018
 * Time: 9:54 AM
 */
class user
{
    private $name;
    private $user_id;
    private $permission;
    private $password;

    public function getName()
    {
        return $this->name;
    }
    public function getPass()
    {
        return $this->password;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getPermission()
    {
        return $this->permission;
    }
    function __construct($id, $pass, $name, $per)
    {
        $this->user_id = $id;
        $this->password = $pass;
        $this->name = $name;
        $this->permission = $per;
    }
    public function isAdmin() {
        if ($this->permission == 1) {
            return True;
        }
        return False;
    }
}


class dBase {
    private $connection;

    public function connect() {
        $this->connection = new PDO("mysql:host=localhost;dbname=onlinefood", "root", NULL);
    }
    public function getUser($user) {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE user_id=:userid");
        $statement->execute(['userid' => $user]);
        return $statement->fetchAll();
    }
    public function addUser($data) { //data is an array of variables which is gonna store in DB
        $statement = $this->connection->prepare("INSERT INTO users(user_id, name, password, permission) 
                                                 VALUES (:id, :name, :pass, :per)");
        $statement->execute($data);
    }
    function __construct()
    {
        $this->connect();
    }

}



?>