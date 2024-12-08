<?php require('inc/db_config.php');
require('inc/essentials.php');
require_once __DIR__ . '/inc/mpdf/vendor/autoload.php';
adminLogin();
if (isset($_GET['gen_pdf']) && isset($_GET['id'])) {
    $frm_data = filteration($_GET);
    $query = "SELECT bo.*, bd.*, uc.email FROM `booking_details` bo 
    INNER JOIN `booked_status` bd ON bo.booking_id=bd.booking_id
    INNER JOIN `user_cred` uc ON bo.user_id = uc.id 
    WHERE ((bo.booking_status='booked' AND bo.arrival=1) OR 
         (bo.booking_status='cancelled' AND bo.refund=1) OR
         (bo.booking_status='payment_failed')) AND 
         bo.booking_id='$frm_data[id]'";
    $res = mysqli_query($conn, $query);
    $total_rows = mysqli_num_rows($res);
    if
    ($total_rows == 0) {
        header('location: dashboard.php');
        exit;
    }
    $data = mysqli_fetch_assoc($res);
    $date = date("H:i:s |
    d-m-Y", strtotime($data['datentime']));
    $checkin = date("d-m-Y", strtotime($data['check_in']));
    $checkout = date("d-m-Y", strtotime($data['check_out']));
    $table_data = "

     <table border='2' width='100%' cellpadding='10' style='font-size:18px;'>
        <tr> <td><h3> BOOKING DETAILS </h3></td><hr><hr> </tr>
        <tr> 
            <td><b>Order ID:</b> $data[order_id]</td> 
        </tr>
        <tr>
            <td><b>Booking Date:</b> $data[datentime]</td> 
        </tr> 
        <tr>
            <td colspan='2'> <b>Status:</b> $data[booking_status]</td>
        </tr>
        <tr> 
            <td> <b>Name :</b> $data[user_name]</td> 
            <td> <b>Email :</b> $data[email]</td> 
        </tr>
        <tr>
            <td><b>Phone Number :</b> $data[phone_num] </td> 
            <td><b>Address : </b>$data[address] </td> 
        </tr> 
        <tr>
            <td><b>Room Name :</b> $data[room_name] </td> 
            <td><b>Cost :</b> ₹$data[price] /night </td> 
        </tr> 
        <tr>
            <td><b>Check in :</b> $checkin </td> 
            <td><b>Check out :</b> $checkout </td> 
        </tr>";
    if ($data['booking_status'] == 'cancelled') {
        $refund = ($data['refund']) ? "Amount refunded"
            : "Not yet refunded";
        $table_data .= "<tr>
            <td><b>Amount Paid : </b>₹$data[total_pay] </td> 
            <td><b>Refund :</b> $refund </td>
        </tr>";
    } else if ($data['booking_status'] == 'payment_failed') {
        $table_data .= "<tr>
            <td><b>Transaction Amount :</b> ₹$data[trans_amt] </td> 
            <td><b>Failure Response :</b> $data[trans_res_msg] </td> 
        </tr>";
    } else {
        $table_data .= "<tr>
            <td><b>Room Number :</b> $data[room_no] </td> 
            <td><b>Amount Paid: </b>₹$data[total_pay] </td> 
        </tr>";
    }
    $table_data .= "</table>";
    
    // PDF generation 
    $mpdf=new \Mpdf\Mpdf(['default_charset'=> 'UTF-8']);
    $mpdf->WriteHTML($table_data);

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="booking.pdf"');
    $file = $data['order_id'].'_'.$data['user_name'].'.pdf'; 
    $mpdf->Output($file,'D');
} else {
    header('location: dashboard.php');
}
?>