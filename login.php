<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 12/11/2018
 * Time: 11:16 AM
 */
session_start();

require_once "library.php";
autoload1();

$text = ""; //for showing a message to user
if(isset($_POST['user'])) {
    $db = new dBase();
    $userId = $_POST['user'];
    $userPass = $_POST['pass'];
    $tmpUser = callFromDb($db, $userId);
    if($tmpUser) {
        if ($userPass == $tmpUser->getPass()) { //password is correct
            $text = "You are successfully logged in";
            $_SESSION['user-id'] = $tmpUser->getUser_id();
            $_SESSION['name'] = $tmpUser->getName();
            $_SESSION['permission'] = $tmpUser->getPermission();
            $text = $text . " " . $_SESSION['name'];
            header("refresh:3, url=reserve.php"); //redirect to index.php after 3 seconds
            exit;
        } else { // password is incorrect
            $text = "Incorrect password";
        }
    }
    else { //query has no result
        $text = "This user has already not registered";
    }
}

?>

<html>
<head>
    <link href="style/css.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="login">
        <p>Login</p>
        <form method="post">
            <p>Username : <input type="text" name="user" ></p>
            <p>Password : <input type="password" name="pass" ></p>
            <p><input type="submit" ></p>
            <p><?php echo $text; ?></p>
        </form>
    </div>
</div>
</body>
</html>
