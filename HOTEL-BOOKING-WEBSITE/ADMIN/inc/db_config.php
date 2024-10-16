<?php
$hname = 'localhost:5222';
$uname = 'root';
$pass = '';
$db = 'wb_hbs';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Cannot connect to Database" . mysqli_connect_error());
}
