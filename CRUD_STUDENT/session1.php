<?php

error_reporting(0); 

session_start(); 
echo $_SESSION['username']; 
echo $_SESSION['CLASS']; 

session_unset(); 
?>