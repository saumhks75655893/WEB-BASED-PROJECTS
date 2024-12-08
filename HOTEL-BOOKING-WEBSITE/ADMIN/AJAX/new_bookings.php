<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();



// fetch room bookings
if (isset($_POST['get_bookings'])) {

    $frm_data = filteration($_POST); 


    $query = "SELECT * FROM `booking_details` bo 
   INNER JOIN `booked_status` bd ON bo.booking_id=bd.booking_id
   WHERE (bo.order_id LIKE ? OR bd.phone_num LIKE ? OR bd.user_name LIKE ?)
    AND (bo.booking_status=? AND bo.arrival=?) ORDER BY bo.booking_id ASC";

   $res = select($query, ["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%","booked",0],'sssss'); 
    $i = 1;
    $table_data = "";

    if(mysqli_num_rows($res) == 0){
        echo"<b> NO DATA FOUND!<b>";
        exit; 
    }

    while ($data = mysqli_fetch_assoc($res)) {
        $date = date("d-m-Y", strtotime($data['datentime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));
        $table_data .= "
        <tr class='text-left'> 
        <td> $i </td>
        <td> 
            <span class='badge bg-primary'>
            Order ID: $data[order_id]
            </span>
            <br>
            <b> Name: </b> $data[user_name]
            <br>
            <b> Phone No: </b> $data[phone_num]
        </td>
        <td>
            <b> Room: </b> $data[room_name]
            <br>
            <b> Price : </b> ₹$data[price]
        </td>
        <td>
            <b> Check IN: </b> $checkin
            <br> 
            <b> Check OUT: </b> $checkout
            <br>
            <b> Paid: </b> ₹$data[total_pay]
            <br>
            <b> Date : </b> $date
        </td> 
        <td>
            <button type='button button-sm' onclick='assign_rooms($data[booking_id])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign_rooms'>
               <i class='bi bi-check2-square'></i>assign room
            </button>
            <br>
            <button type='button button-sm' onclick='cancel_bookings($data[booking_id])' class='mt-3 btn btn-danger text-white btn-sm fw-bold shadow-none'>
               <i class='bi bi-check2-square'></i>Cancel room
            </button>
        </td>
        </tr>
        ";
        $i++;
    }
    echo $table_data;
}


// room no allocation 
if (isset($_POST['assign_room'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_details` bo INNER JOIN `booked_status` bd ON
    bo.booking_id = bd.booking_id  
    SET bo.arrival=?, bd.room_no=? 
    WHERE bo.booking_id=?"; 

    $values = [1,$frm_data['room_no'],$frm_data['booking_id']]; 
    $res = update($query, $values, 'isi');  //it will return 2 values

    echo ($res==2)? 1: 0; 
}


// Remove booking
if (isset($_POST['cancel_booking'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_details` bo SET `booking_status`=?, `refund`=?  WHERE bo.booking_id=?"; 

    $values = ['cancelled',0,$frm_data['booking_id']]; 

    $res = update($query, $values, 'sii');

    echo $res; 


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
