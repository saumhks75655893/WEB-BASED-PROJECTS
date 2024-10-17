<?php

require('connection.php');

// insertion of data into the database table(student)

$query = "INSERT INTO STUDENT VALUES('3', 'Raj malhotra', 'MCA')";
mysqli_query($con, $query);
