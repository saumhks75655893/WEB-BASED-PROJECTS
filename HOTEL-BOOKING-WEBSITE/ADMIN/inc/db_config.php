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
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);

        $data[$key] = $value;
    }
    return $data;
}

//selection(view function) function 

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

// UPdate Function 
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

// insert function
function insert($query, $values, $datatype)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, $datatype, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            return $res;
        } else {
            die("Query cannot be executed !! - update ");
        }
        mysqli_stmt_close($stmt);
    } else {
        die("Query cannot be Prepared !! - update ");
    }
}
