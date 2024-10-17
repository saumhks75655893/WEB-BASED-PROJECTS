<?php
$hname = 'localhost:5222';
$uname = 'root';
$pass = '';
$db = 'crud';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Cannot connect to database" . mysqli_connect_error());
}
