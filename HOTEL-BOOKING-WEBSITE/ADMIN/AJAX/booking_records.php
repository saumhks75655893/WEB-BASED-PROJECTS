<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();



// fetch room bookings
if (isset($_POST['get_bookings'])) {

    $frm_data = filteration($_POST);

    $limit = 2;
    $page = $frm_data['page'];
    $start = ($page - 1) * $limit;


    $query = "SELECT * FROM `booking_details` bo 
   INNER JOIN `booked_status` bd ON bo.booking_id=bd.booking_id
   WHERE ((bo.booking_status='booked' AND bo.arrival=1) OR 
        (bo.booking_status='cancelled' AND bo.refund=1) OR
        (bo.booking_status='payment_failed'))
        AND (bo.order_id LIKE ? OR bd.phone_num LIKE ? OR bd.user_name LIKE ?)
      ORDER BY bo.booking_id DESC";

    $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sss');

    $limit_query = $query . " LIMIT $start, $limit";

    $limit_res = select($limit_query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sss');

    $i = $start + 1;
    $table_data = "";
    $total_rows = mysqli_num_rows($res);

    if ($total_rows == 0) {
        $output = json_encode(["table_data" => "<b>No data found!</b>", "pagination" => '']);
        echo $output;
        exit;
    }

    while ($data = mysqli_fetch_assoc($limit_res)) {
        $date = date("d-m-Y", strtotime($data['datentime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        if ($data['booking_status'] == 'booked') {
            $status_bg = 'bg-success';
        } else if ($data['booking_status'] == 'cancelled') {
            $status_bg = 'bg-danger';
        } else {
            $status_bg = 'bg-warning';
        }

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
            <b> Amount: </b> ₹$data[total_pay]
            <br>
            <b> Date : </b> $date
        </td> 
        <td>
         <span class='badge $status_bg'>
            $data[booking_status]
         </span>
        </td>
        <td>
            <button type='button button-sm' onclick='download($data[booking_id])' class='btn btn-outline-success btn-warning  text-dark btn-sm fw-bold shadow-none'>
                <i class='bi bi-download p-2'></i><span class'text-success'>PDF</span>
            </button>
        </td>
        </tr>
        ";
        $i++;
    }


    $pagination = "";
    if ($total_rows > $limit) {
        $total_page = ceil($total_rows / $limit);

        // Previous page 
        $disabled = ($page == 1) ? "disabled" : ""; // if we are at first page than previous button disabled
        $prev = $page - 1;
        $pagination .= " <li class='page-item $disabled'><button onclick='change_page($prev)' class='page-link shadow-none'>Previous</button></li>";

        // direct first page
        if ($page != 1) {
            $pagination .= " <li class='page-item $disabled'><button onclick='change_page(1)' class='page-link shadow-none'>first</button></li>";

        }

        // if we are at  last page then next button will be disabled
        $disabled = ($page == $total_page) ? "disabled" : "";
        $next = $page + 1;
        $pagination .= " <li class='page-item $disabled'><button onclick='change_page($next)' class='page-link shadow-none'>Next</button></li>";


        // direct last page
        if ($page != $total_page) {
            $pagination .= " <li class='page-item $disabled'><button onclick='change_page($total_page)' class='page-link shadow-none'>Last</button></li>";

        }
    }



    $output = json_encode(["table_data" => $table_data, "pagination" => $pagination]);
    echo $output;
}


// room no allocation 
if (isset($_POST['assign_room'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_details` bo INNER JOIN `booked_status` bd ON
    bo.booking_id = bd.booking_id  
    SET bo.arrival=?, bd.room_no=? 
    WHERE bo.booking_id=?";

    $values = [1, $frm_data['room_no'], $frm_data['booking_id']];
    $res = update($query, $values, 'isi');  //it will return 2 values

    echo ($res == 2) ? 1 : 0;
}


// Remove booking
if (isset($_POST['cancel_booking'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_details` bo SET `booking_status`=?, `refund`=?  WHERE bo.booking_id=?";

    $values = ['cancelled', 0, $frm_data['booking_id']];

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
