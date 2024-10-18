<!-- how to select/view/display data from database -->

<style>
    table,
    th,
    td {
        border: 2px solid white;
        padding: 10px;
    }

    th,
    td {
        text-align: center;
    }

    thead {
        background-color: springgreen;
        color: black;
        font-weight: bold;
        font-size: 16px;
    }

    table {
        border-collapse: collapse;
        color: aquamarine;
        background-color: black;
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
                        <td><a href='delete.php?rn=$result[rollno]&&sn=$result[name]&&sc=$result[class]'  onclick='return checkdelete()'>Delete</a></td>
                        </tr>";
    }
} else {
    echo "record not found";
}
    ?>

    </table>

    <script>
        function checkdelete() {
            return confirm("Are you sure? Want to delete this record !! ");
        }
    </script>