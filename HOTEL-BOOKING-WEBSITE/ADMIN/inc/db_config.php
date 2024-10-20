<?php
$hname = 'localhost:5222';
$uname = 'root';
$pass = '';
$db = 'wb_hbs';

$conn = mysqli_connect($hname, $uname, $pass, $db);

if (!$conn) {
    die("Cannot connect to Database" . mysqli_connect_error());
}


// filteration function 

function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripcslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}
//Insertion function 

function select($query, $values, $datatype)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, $datatype, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed !! - select ");
        }
    } else {
        die("Query cannot be Prepared !! - select ");
    }
}

// UPdate funtion 

function update($query, $values, $datatype)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, $datatype, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed !! - update ");
        }
    } else {
        die("Query cannot be Prepared !! - update ");
    }
}
