<?php
require('connection.php');
error_reporting(0);
$rollno = $_GET['rn'];
$query = "delete from student where ROLLNO = '$rollno'";
$data = mysqli_query($con, $query);

if ($data) {
    echo "<script>alert('Record deleted successfully')</script>";
?>
    <META http-equiv="REFRESH" content="0; url=http://localhost/WEB-BASED-PROJECTS/CRUD_STUDENT/display.php">
<?php
} else {
    echo "<font color='red'> Sorry, delete process failed!!!! ";
}
?>