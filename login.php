<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 12/11/2018
 * Time: 11:16 AM
 */
//require_once "config.php";
require_once "classes.php";

$dbase = new db("onlinefood", "localhost", "root", "");
$con=$dbase.dbConnect();
$text = ""; //for showing a message to user
if(isset($_POST['user'])) {
    $userId = $_POST['user'];
    $userPass = $_POST['pass'];
    $query = "SELECT * from users where user_id=" . $userId;
    $rs=$dbase.queryExecute($query, $con);
    //$statement = $conn->prepare("SELECT * from users where user_id=:userid");
    //$statement->execute(['userid' => $userId]);
    //$result = $statement->fetchAll();
    if(!empty($rs)) { //query returns a result
        foreach ($rs as $e) {
            $tmpUser = new user($e['user_id'], $e['password'], $e['name'], $e['permission']);
        }
        if ($userPass == $tmpUser->getPass()) { //password is correct
            $text = "You are successfully logged in";
            session_start();
            $_SESSION['user-id'] = $tmpUser->getUser_id();
            $_SESSION['name'] = $tmpUser->getName();
            $_SESSION['permission'] = $tmpUser->getPermission();
            $text = $text . " " . $_SESSION['name'];
            header("refresh:3, url=index.php"); //redirect to index.php after 3 seconds
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
            <p><?php echo $text ?></p>
        </form>
    </div>
</div>
</body>
</html>
