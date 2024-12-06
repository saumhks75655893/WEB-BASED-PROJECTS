<?php
require('inc/essentials.php');
require('inc/db_config.php');
error_reporting(E_ALL); // Enable error reporting for debugging
ini_set('display_errors', 1);
adminLogin();

// Mark as Read
if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);
    if ($frm_data['seen'] === 'all') {
        $query = "UPDATE `contact_us` SET `seen`=?";
        $value = [1];
        $res = update($query, $value, 'i');
        if ($res) {
            alert('success', 'Marked ALL as read!');
        } else {
            alert('error', 'Operation failed!');
        }
    } elseif (is_numeric($frm_data['seen'])) {
        $query = "UPDATE `contact_us` SET `seen`=? WHERE `sr_no`=?";
        $value = [1, $frm_data['seen']];
        $res = update($query, $value, 'ii');
        if ($res) {
            alert('success', 'Marked as read!');
        } else {
            alert('error', 'Operation failed!');
        }
    }
}

// Delete
if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['del'] === 'all') {
        $query = "DELETE FROM `contact_us`";
        if (mysqli_query($conn, $query)) {
            alert('success', 'All records deleted!');
        } else {
            alert('error', 'Operation failed!');
        }
    } elseif (is_numeric($frm_data['del'])) {
        $query = "DELETE FROM `contact_us` WHERE `sr_no`=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $frm_data['del']);
        $res = $stmt->execute();
        if ($res) {
            alert('success', 'Record deleted successfully!');
        } else {
            alert('error', 'Operation failed!');
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User Queries</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="col-lg-10 p-4 ms-auto">
        <h3 class="mb-4">User Queries</h3>

        <div class="text-end mb-4">
            <a href="?seen=all" class="btn btn-sm bg-warning rounded-pill fw-bold shadow-none">
                <i class="bi bi-check2-all me-1"></i>Mark All Read
            </a>
            <a href="?del=all" class="btn btn-sm bg-danger text-white rounded-pill fw-bold">
                <i class="bi bi-trash3 me-1"></i>Delete All
            </a>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="table-responsive-md border-top border-3" style="height: 420px; overflow-y:scroll;">
                    <table class="table table-hover border-5">
                        <thead class="sticky-top">
                            <tr class="bg-dark text-light">
                                <th scope="col">#</th>
                                <th scope="col" style="width: 15%;">Name</th>
                                <th scope="col" style="width: 15%;">Email</th>
                                <th scope="col" style="width: 15%;">Subject</th>
                                <th scope="col" style="width: 24%;">Message</th>
                                <th scope="col" style="width: 15%;">Date</th>
                                <th scope="col" style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `contact_us` ORDER BY `sr_no` DESC";
                            $data = mysqli_query($conn, $query);
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($data)) {
                                $row['name'] = htmlspecialchars($row['name']);
                                $row['email'] = htmlspecialchars($row['email']);
                                $row['subject'] = htmlspecialchars($row['subject']);
                                $row['message'] = htmlspecialchars($row['message']);
                                $seen = '';

                                if ($row['seen'] != 1) {
                                    $seen .= "<a href='?seen={$row['sr_no']}' class='btn btn-warning rounded-pill btn-sm'>Mark as Read</a>";
                                }
                                $seen .= "<a href='?del={$row['sr_no']}' class='btn btn-danger mt-2 rounded-pill btn-sm'>Delete</a>";

                                echo <<<HTML
                                <tr>
                                    <td>{$i}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['subject']}</td>
                                    <td>{$row['message']}</td>
                                    <td>{$row['date']}</td>
                                    <td>{$seen}</td>
                                </tr>
                                HTML;
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>

</html>
