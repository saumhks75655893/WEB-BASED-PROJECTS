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
        die('query cannot be prepared - insert ! ');
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
        die("Some error occurred!");
    }

    // Output result based on flag
    if ($flag) {
        echo 1;
    } else {
        echo 0;
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
            $status = "<button  onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'> active </button>";
        } else {
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'> inactive </button>";
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
            <button type='button' onclick='edit_details($row[id])' class='btn btn-danger btn-sm my-2 text-right' data-bs-toggle='modal' data-bs-target='#editRoom'>
                  <i class='bi bi-pencil-square'></i></i>
            </button>
            <button type='button' onclick=\"room_images($row[id],'$row[name]')\" class='btn btn-info btn-sm my-2 text-right' data-bs-toggle='modal' data-bs-target='#Room-images'>
                  <i class='bi bi-images'></i></i>
            </button>
             </td>
        </tr>";
        $i++;
    }
    echo $data;
}

// edit room - fetch
if (isset($_POST['get_room'])) {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `rooms` WHERE `id`=?", [$frm_data['get_room']], 'i');
    $res2 = select("SELECT * FROM `room_features` WHERE `room_id`=?", [$frm_data['get_room']], 'i');
    $res3 = select("SELECT * FROM `room_facilities` WHERE `room_id`=?", [$frm_data['get_room']], 'i');

    $roomdata = mysqli_fetch_assoc($res1);
    $features = [];
    $facilities = [];

    if (mysqli_num_rows($res2) > 0) {
        while ($row = mysqli_fetch_assoc($res2)) {
            array_push($features, $row['features_id']);
        }
    }

    if (mysqli_num_rows($res3) > 0) {
        while ($row = mysqli_fetch_assoc($res3)) {
            array_push($facilities, $row['facilities_id']);
        }
    }

    $data = ["roomdata" => $roomdata, "features" => $features, "facilities" => $facilities];
    $data = json_encode($data);

    echo $data;
}

// after fetch - edit room
if (isset($_POST['editRoom'])) {
    $features = filteration(json_decode($_POST['features'], true));  // Correct handling for features
    $facilities = filteration(json_decode($_POST['facilities'], true));  // Correct handling for facilities
    $frm_data = filteration($_POST);

    $flag = 0;

    $query1 = "UPDATE `rooms` SET `name`=?,`area`=?,`price`=?,
    `quantity`=?,`adults`=?,`children`=?,`description`=? WHERE  `id`=?";

    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adults'], $frm_data['children'], $frm_data['description'], $frm_data['room_id']];

    if (update($query1, $values, 'siiiiisi')) {
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
            mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('query cannot be prepared - insert ! ');
    }

    // Insert features
    $query3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $query3)) {
        foreach ($features as $f) {  // Using $features here
            mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die("Some error occurred!");
    }

    // Output result based on flag
    if ($flag) {
        echo 1;
    } else {
        echo 0;
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

// image upload and shown 

if (isset($_POST['addImage'])) {
    $frm_data = filteration($_POST);
    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $query = "INSERT INTO `room_images`(`room_id`, `image`) VALUES (?,?)";
        $values = [$frm_data['room_id'], $img_r];
        $res = insert($query, $values, 'is');
        echo $res;
    }
}

// shown on the window
if (isset($_POST['get_room_images'])) {
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `room_images` WHERE `room_id`=?",[$frm_data['get_room_images']],'i'); 

    $path = ROOM_IMG_PATH; 

    while($row = mysqli_fetch_assoc($res))
    {
        echo<<<data
            <tr class='align-middle'>
            <td><img src='$path$row[image]' class='img-fluid'></td>
            <td>thumb</td>
            <td>
            <button onclick='rem_img($row[sr_no],$row[room_id])' class='btn btn-danger btn-sm border border-1'> 
                <i class='bi bi-trash'></i>
            </button>
            </td>
            </tr>
        data;
    }

 
}

// image removal
if(isset($_POST['rem_img']))
{
    $frm_data = filteration($_POST); 
    $values = [$frm_data['img_id'], $frm_data['room_id']]; 
    $pre_q = "SELECT * FROM `rooms_image` WHERE `sr_no`=? AND `room_id`=?";
    $res = select($pre_q,$values, 'i'); 
    $img = mysqli_fetch_assoc($res); 

    if(deleteImage($img['image'],ROOMS_FOLDER))
    {
        $q = "DELETE FROM `room_images` WHERE `sr_no`=? AND `room_id`=?"; 
        $res = delete($q, $values, 'ii'); 
        echo $res;
    }
}