<?php
require('inc/essentials.php');
require('inc/db_config.php');

session_start(); 
if((isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true))
{
   redirect('dashboard.php'); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN PANEL</title>
    <?php require("inc/links.php") ?>
    <style>
        .form-design {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="form-design border shadow text-center rounded overflow-hidden">
        <form action="" method="POST">
            <h4 class="bg-dark h-font text-white p-3 mb-4">ADMIN LOGIN PANEL</h4>

            <div class="p-4">
                <div class="mb-3 text-center px-4">
                    <input name="admin_id" required type="text" class="form-control shadow-none text-center" placeholder="Admin email">
                </div>
                <div class="mb-3 text-center px-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none mb-4 text-center"
                        placeholder="Admin Password">
                </div>
                <button name="login" type="submit" class="btn w-50 text-white custom-bg shadow-none mb-3">Login</button>
            </div>

        </form>


    </div>

    <?php
    if (isset($_POST['login'])) {
        $frm_data = filteration($_POST);

        $query = "SELECT * FROM `admin_panel` WHERE `admin_id`=? and `admin_pass`=? ";
        $values = [$frm_data['admin_id'], $frm_data['admin_pass']];

        $res = select($query, $values, "ss");
        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['adminlogin'] = true; 
            $_SESSION['adminId']=$row['sr_no']; 
            redirect('dashboard.php'); 
        } else {
            alert('error', 'Login failed - Invalid credentials ! ');
        }
    }
    ?>

    <?php require('inc/scripts.php') ?>
</body>

</html>