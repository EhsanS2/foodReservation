<?php
session_start();
$flg=0;
if(isset($_SESSION['user-id'])) {
    $flg = 1;
    $user = $_SESSION['user-id'];
    require_once 'classes.php';
    require_once 'library.php';
    $db = new dBase();
    $tmpUser = callFromDb($db, $user);
} else {
    echo "You have not logged in yet";
    header("refresh:3, url=login.php");
    exit;
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