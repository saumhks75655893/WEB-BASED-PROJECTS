<?php
error_reporting(0); 

session_start();  // to start a session 
$_SESSION['username'] = 'Himanshu kumar sinha';
$_SESSION['CLASS'] = 'MCA'; 

echo $_SESSION['username'];
echo $_SESSION['CLASS'];

//session_unset(); // to stop/ abort a session
//echo $_SESSION['username'];

session_unset(); 
