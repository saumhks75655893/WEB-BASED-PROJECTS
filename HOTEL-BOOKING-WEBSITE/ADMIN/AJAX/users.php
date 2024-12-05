<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();



// fetch users
if (isset($_POST['get_users'])) {
    $query = "SELECT * FROM `user_cred` ORDER BY `id` DESC";
    $res = mysqli_query($conn, $query); 
    $data = "";
    $path = USER_IMG_PATH;
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger btn-sm my-2 px-10px'><i class='bi bi-trash'></i>";

        $varified = "<span class='badge bg-danger'><i class='bi bi-x-lg'></i></span>";
        if ($row['is_varified']) {
            $varified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
            $del_btn = "";
        }

        $status = "<button  onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'> active </button>";

        if (!$row['status']) {
            $status = "<button  onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'> inactive </button>";
        }

        $date = date('d-m-Y', strtotime($row['datentime']));



        // show data in the table format
        $data .= "
            <tr>
                <td> $i </td>
                <td> <img src='$path$row[profile]' width='40px' height='45px'> <br>
                $row[name] </td>
                <td> $row[email] </td>
                <td> $row[phonenum] </td>
                <td> $row[address] </td>
                <td> $row[dob] </td>
                <td> $varified</td>
                <td> $status </td>
                <td> $date</td>
                <td> $del_btn </td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}

// for toggle_status the active and inactive button
if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `user_cred` SET `status`=?  WHERE `id`=?";
    $value = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($query, $value, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

// Remove user
if (isset($_POST['remove_user'])) {
    $frm_data = filteration($_POST);

    $query = "DELETE FROM `user_cred` WHERE `id`='$frm_data[user_id]' AND `is_varified`='0'"; 
    $res1 = mysqli_query($conn,$query); 
    if ($res1) {
        echo 1;
    } else {
        echo 0;
    }
}


// search users
if (isset($_POST['search_user'])) {

    $frm_data = filteration($_POST); 

    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE '%$frm_data[name]%'";

    $res = mysqli_query($conn, $query); 
    $data = "";
    $path = USER_IMG_PATH;
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger btn-sm my-2 px-10px'><i class='bi bi-trash'></i>";

        $varified = "<span class='badge bg-danger'><i class='bi bi-x-lg'></i></span>";
        if ($row['is_varified']) {
            $varified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
            $del_btn = "";
        }

        $status = "<button  onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'> active </button>";

        if (!$row['status']) {
            $status = "<button  onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'> inactive </button>";
        }

        $date = date('d-m-Y', strtotime($row['datentime']));



        // show data in the table format
        $data .= "
            <tr>
                <td> $i </td>
                <td> <img src='$path$row[profile]' width='40px' height='45px'> <br>
                $row[name] </td>
                <td> $row[email] </td>
                <td> $row[phonenum] </td>
                <td> $row[address] </td>
                <td> $row[dob] </td>
                <td> $varified</td>
                <td> $status </td>
                <td> $date</td>
                <td> $del_btn </td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}
