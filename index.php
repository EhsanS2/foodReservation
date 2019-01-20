<?php
session_start();
$flg=0;
if(isset($_SESSION['user-id'])) {
    $flg = 1;
    $user = $_SESSION['user-id'];
    require_once 'config.php';
    require_once 'classes.php';
    $statement = $conn->prepare("SELECT * from users where user_id=:userid");
    $statement->execute(['userid' => $user]);
    $result = $statement->fetchAll();
    if(!empty($result)) {
        foreach ($result as $e) {
            $tmpUser = new user($e['user_id'], $e['password'], $e['name'], $e['permission']);
            echo "salam salam";
        }
    }
} else {
    header("refresh:3, url=login.php");
    echo "You have not logged in yet";
}
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style\css.css">
</head>
<body>
<div><?php if($flg==1) {echo $_SESSION["name"];} ?></div>
<div></div>
</body>
</html>