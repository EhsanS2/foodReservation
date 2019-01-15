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
    public function setName($name) {$this->name = $name;}
    public function setPass($pass) {$this->password = $pass;}
    public function setUser_id($id) {$this->name = $id;}
    public function setPermission($permission) {$this->permission = $permission;}
    public function getName() {return $this->name;}
    public function getPass() {return $this->password;}
    public function getUser_id() {return $this->user_id;}
    public function getPermission() {return $this->permission;}
    
}





?>