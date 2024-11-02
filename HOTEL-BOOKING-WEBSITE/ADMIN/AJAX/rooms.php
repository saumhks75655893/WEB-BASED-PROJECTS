<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


// add room 
if (isset($_POST['addRoom'])) {
    $features = filteration(json_decode($_POST['features']));  // Correct handling for features
    $facilities = filteration(json_decode($_POST['facilities']));  // Correct handling for facilities
    $frm_data = filteration($_POST);

    $flag = 0;

    // Insert into rooms table
    $query1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adults`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adults'], $frm_data['children'], $frm_data['description']];

    if (insert($query1, $values, 'siiiiis')) {
        $flag = 1;
    }

    $room_id = mysqli_insert_id($conn);

    // Insert facilities
    $query2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $query2)) {
        foreach ($facilities as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        echo json_encode(['status' => 0, 'error' => 'Failed to insert facilities']);
        exit();
    }

    // Insert features
    $query3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $query3)) {
        foreach ($features as $f) {  // Using $features here
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        echo json_encode(['status' => 0, 'error' => 'Failed to insert features']);
        exit();
    }

    // Output result based on flag
    if ($flag == 1) {
        echo json_encode(['status' => 1, 'message' => 'Room added successfully']);
    } else {
        echo json_encode(['status' => 0, 'error' => 'Failed to add room']);
    }
}

// fetch room
if (isset($_POST['get_all_rooms'])) {
    $query = "SELECT * FROM `rooms`";
    $data1 = mysqli_query($conn, $query);
    $i = 1;
    $data = "";
    while ($row = mysqli_fetch_assoc($data1)) {

        if ($row['status'] == 1) {
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'> active </button>";
        } else {
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'> Inactive </button>";
        }


        $data .= "
        <tr class='align-middle text-left'> 
            <td> $i </td>
            <td> $row[name] </td>
            <td> $row[area] sq. ft. </td>
            <td>
                <span class='badge rounded-pill bg-light text-dark'>
                    Adult: $row[adults]
                </span>
                <span class='badge rounded-pill bg-light text-dark'>
                    Children : $row[children]
                </span>
            </td>
            <td>₹$row[price] </td>
            <td style='padding-left:35px;'> $row[quantity] </td>
            <td> $status </td>
            <td> 
                <button type='button' onclick='edit_details($row[id])' class='btn btn-warning shadow-none btn-sm my-2 text-right' data-bs-toggle='modal' data-bs-target='#editRoom'>
                    <i class='bi bi-pencil-square me-2'></i>Edit
                </button>
            </td>
        </tr>";
        $i++;
    }
    echo $data;
}

// edit room
if (isset($_POST['get_rooms'])) {
    $frm_data = filteration($_POST);

    // Correct column name for room ID
    $room_id = $frm_data['get_rooms'];

    // Fetch room details
    $res1 = select("SELECT * FROM `rooms` WHERE `id`=?", [$room_id], 'i');
    $res2 = select("SELECT * FROM `room_features` WHERE `room_id`=?", [$room_id], 'i');
    $res3 = select("SELECT * FROM `room_facilities` WHERE `room_id`=?", [$room_id], 'i');

    // Fetch single room data
    $roomdata = mysqli_fetch_assoc($res1);

    // Fetch features
    $features = [];
    if (mysqli_num_rows($res2) > 0) {
        while ($row = mysqli_fetch_assoc($res2)) {
            array_push($features, $row['features_id']);
        }
    }

    // Fetch facilities
    $facilities = [];
    if (mysqli_num_rows($res3) > 0) {  // Corrected: Check $res3, not $res2
        while ($row = mysqli_fetch_assoc($res3)) {
            array_push($facilities, $row['facilities_id']);
        }
    }

    // Combine room data, features, and facilities into one array
    $data = [
        "roomdata" => $roomdata,
        "features" => $features,
        "facilities" => $facilities
    ];

    // Encode the array to JSON
    echo json_encode($data);
}

// submit edited room 
if (isset($_POST['editRoom'])) {
    $features = filteration(json_decode($_POST['features']));  // Correct handling for features
    $facilities = filteration(json_decode($_POST['facilities']));  // Correct handling for facilities
    $frm_data = filteration($_POST);
    $flag = 0;


    $q1 = "UPDATE `rooms` `name`=?,`area`=?,`price`=?,`quantity`=?,`adults`=?,`children`=?,
     `description`=?,`status`=? WHERE SET `id`='?'";
    $values = [
        $frm_data['name'],
        $frm_data['area'],
        $frm_data['price'],
        $frm_data['quantity'],
        $frm_data['adults'],
        $frm_data['children'],
        $frm_data['description'],
        $frm_data['room_id']
    ];

    if (update($q1, $values, 'siiiiisi')) {
        $flag = 1;
    }

    $del_features = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
    $del_facilities = delete("DELETE FROM `room_facilities` WHERE `room_id`=?", [$frm_data['room_id']], 'i');


    if (!($del_features && $del_facilities)) {
        $flag = 0;
    }
    // Insert facilities
    $query2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $query2)) {
        foreach ($facilities as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        echo json_encode(['status' => 0, 'error' => 'Failed to insert facilities']);
        exit();
    }

    // Insert features
    $query3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $query3)) {
        foreach ($features as $f) {  // Using $features here
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        echo json_encode(['status' => 0, 'error' => 'Failed to insert features']);
        exit();
    }

    // Output result based on flag
    if ($flag == 1) {
        echo json_encode(['status' => 1, 'message' => 'Room added successfully']);
    } else {
        echo json_encode(['status' => 0, 'error' => 'Failed to add room']);
    }
}
// for toggle_status the active and inactive button
if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `rooms` SET `status`=?  WHERE `id`=?";
    $value = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($query, $value, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}
