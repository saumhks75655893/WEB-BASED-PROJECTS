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
    AND (bo.booking_status=? AND bo.refund=?) ORDER BY bo.booking_id ASC";

    $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "cancelled", 0], 'sssss');
    $i = 1;
    $table_data = "";

    if (mysqli_num_rows($res) == 0) {
        echo "<b> NO DATA FOUND!<b>";
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
            <b> Check IN: </b> $checkin
            <br> 
            <b> Check OUT: </b> $checkout
            <br>
            <b> Date : </b> $date
        </td> 
        <td>
        $data[total_pay]
        </td>
        <td>
            <button type='button button-sm' onclick='refund_bookings($data[booking_id])' class='btn btn-success text-white btn-sm fw-bold shadow-none'>
               <i class='bi bi-cash-stack me-1'></i>Refund
            </button>
        </td>
        </tr>
        ";
        $i++;
    }
    echo $table_data;
}


// Remove booking
if (isset($_POST['refund_booking'])) {
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_details` bo SET `refund`=?  WHERE bo.booking_id=?";

    $values = [1, $frm_data['booking_id']];

    $res = update($query, $values, 'ii');

    echo $res;


}
