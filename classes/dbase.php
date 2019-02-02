<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 2/2/2019
 * Time: 8:25 AM
 */

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