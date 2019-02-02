<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 12/11/2018
 * Time: 11:16 AM
 */

require_once "library.php";
autoload1();

$_VALID = True;
$text = ""; //for showing a message to user
if(isset($_POST['user'])) {
    $db = new dBase();
    $db->connect();
    $userName = $_POST['name'];
    $userId = $_POST['user'];
    $userPass = $_POST['pass'];
    $userConfPass = $_POST['confPass'];
    $userEmail = $_POST['email'];
    $result = $db->getUser($userId);
    If(!empty($result)) {
        $text = $text . "This user is not available, please try something else </br>";
        $_VALID = False;
    }
    if($userPass !== $userConfPass) {
        $text = $text . "Passwords are not same</br>";
        $_VALID = False;
    }
    if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $text = $text . "Email address is not valid</br>";
        $_VALID = False;
    }
    if($_VALID) {
        $data = [
                'id' => $userId,
                'name'=> $userName,
                'pass'=> $userPass,
                'per'=>0,
            ];
        $db->addUser($data);
        $text = "You have successfully registered!";
        header("refresh:3, url:login.php");
    }

}

?>

<html>
<head>
    <link href="style/css.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="register">
        <p>Sign Up</p>
        <form method="post">
            <p>Full Name : <input type="text" name="name"></p>
            <p>Username : <input type="text" name="user" ></p>
            <p>Password : <input type="password" name="pass" ></p>
            <p>Confirm Password : <input type="password" name="confPass"></p>
            <p>Email : <input type="email" name="email"></p>
            <p><input type="submit" ></p>
            <p><?php echo $text; ?></p>
        </form>
    </div>
</div>
</body>
</html>
