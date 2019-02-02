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
?>