<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['addProduct'])) {
    echo "<h3>POST Data:</h3>";
    print_r($_POST);
    
    echo "<br><br>";

    echo "<h3>FILES Data:</h3>";
    print_r($_FILES['image']);
}
