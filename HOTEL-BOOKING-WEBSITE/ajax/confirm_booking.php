<?php
require('../ADMIN/inc/db_config.php');
require('../ADMIN/inc/essentials.php');

date_default_timezone_set("Asia/Kolkata");

if (isset($_POST['check_availability'])) {
    $frm_data = filteration($_POST);

    $status = "";
    $result = "";

    // check-in and check-out validation

    $today_date = new DateTime(date('Y-m-d'));
    $checkin_date = new DateTime($frm_data['check_in']);
    $checkout_date = new DateTime($frm_data['check_out']);

    if ($checkin_date == $checkout_date) {
        $status = 'checkin_checkout_equal';
        $result = json_encode(["status" => $status]);
    } else if ($checkout_date < $checkin_date) {
        $status = 'check_out_earlier';
        $result = json_encode(["status" => $status]);
    } else if ($checkin_date < $today_date) {
        $status = 'check_in_earlier';
        $result = json_encode(["status" => $status]);
    }

    echo $result; 

    // checking booking availability if is status is blank else return the error

    if ($status != '') {
        return $result;
    } else {
        session_start();
        $_SESSION['room'];
        $count_days = date_diff($checkin_date, $checkout_date)->days;
        $payment = $_SESSION['room']['price'] * $count_days;

        $_SESSION['room']['payment'] = $payment;
        $_SESSION['room']['available'] = true;
        $_SESSION['room']['name'];



        $result = json_encode(["status" => 'available', "days" => $count_days, "payment" => $payment]);

        echo $result;
    }
}
?>