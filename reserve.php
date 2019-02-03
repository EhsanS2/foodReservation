<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 1/29/2019
 * Time: 10:22 AM
 */

session_start();
include_once 'library.php';
autoload1();

$user = $_SESSION['user-id'];
$db = new dBase();
$tmpUser = callFromDb($db, $user);





?>
<html>
<head>
    <link href="style/css.css" rel="stylesheet">
    <link href="style/calendar.css" rel="stylesheet">
    <title></title>
</head>
<body>

<?php
$calender = new Calendar();
echo $calender->show();

?>

</body>
</html>
