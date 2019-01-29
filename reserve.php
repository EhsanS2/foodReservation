<?php
/**
 * Created by PhpStorm.
 * User: e_hatefi
 * Date: 1/29/2019
 * Time: 10:22 AM
 */

session_start();
$user = $SESSION['user-id'];
$db = new dBase();
$tmpUser = callFromDb($db, $user);





?>
<html>
<head>
    <link href="style/css.css" rel="stylesheet">
    <title></title>
</head>
<body>
<div id="header-nav"></div>
<div style="width: 100%">
    <div style="width: 20%"></div>
    <div style="width: 60%">
        <div id="date"></div>
        <div class="day"></div>
        <div class="day"></div>
        <div class="day"></div>
        <div class="day"></div>
        <div class="day"></div>
        <div class="day"></div>
        <div class="day"></div>
    </div>
    <div style="width: 20%"></div>
</div>
</body>
</html>
