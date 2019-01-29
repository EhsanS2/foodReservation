<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 1/29/2019
 * Time: 10:37 AM
 */

function callFromDb ($obj, $user) {
    $result = $obj->getUser($user);
    if(!empty($result)) {
        foreach ($result as $e) {
            $tmpUser = new user($e['user_id'], $e['password'], $e['name'], $e['permission']);
        }
    }
    return $tmpUser;
}






?>