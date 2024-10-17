<!-- how to select/view/display data from database -->

<style>
    table,
    th,
    td {
        border: 2px solid black;
        padding: 10px;
    }

    th, td{
        text-align: center;
    }
    table {
        border-collapse: collapse;
    }
</style>
<?php

require('connection.php');
error_reporting(0);

$query = "select * from student";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
?>

    <table>

        <thead>
            <th>Roll No</th>
            <th>Name </th>
            <th>Class</th>
            <th colspan="2">Operations</th>
        </thead>


    <?php

    while ($result = mysqli_fetch_assoc($data)) {
        echo  "<tr>
                        <td> " . $result['rollno'] . "</td>
                        <td>" . $result['name'] . "</td>
                        <td>" . $result['class'] . "</td>
                        <td><a href='update.php?rn=$result[rollno]&&sn=$result[name]&&sc=$result[class]'> Edit </a></td>
                        <td>Delete </td>
                        </tr>";
    }
} else {
    echo "record not found";
}
    ?>

    </table>