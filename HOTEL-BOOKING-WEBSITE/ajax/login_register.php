<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../ADMIN/inc/db_config.php');
require('../ADMIN/inc/essentials.php');

require('../PHPMailer/mailer/Exception.php');
require('../PHPMailer/mailer/PHPMailer.php');
require('../PHPMailer/mailer/SMTP.php');

date_default_timezone_set("Asia/Kolkata");

// email
function send_mail($email, $token, $type)
{
    if ($type == "email_confirmation") {
        $page = 'email_confirm.php';
        $subject = 'Account verification link';
        $content = 'Confirm your email!';
    } else {
        $page = 'index.php';
        $subject = 'Account Password Reset link';
        $content = 'RESET YOU ACCOUNT PASSWORD!';
    }
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom(USERNAME, $subject);

        $mail->addAddress($email, $subject);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "
                            Click the link to $content : <br>
                            <a href='" . SITE_URL . "$page?$type&email=$email&token=$token" . "'>
                                Click ME
                             </a>
                        ";


        if ($mail->send()) {
            return 1;
        } else {
            return 0;
        }

    } catch (Exception $e) {
        return 0;
    }
}

// login

if (isset($_POST['login'])) {
    $data = filteration($_POST);
    // check user exists or not 

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email_mob'], $data['email_mob']], 'ss');

    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email_mob';
    } else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_fetch['is_varified'] == 0) {
            echo 'not_varified';
        } else if ($u_fetch['status'] == 0) {
            echo 'inactive';
        } else {
            if (!password_verify($data['pass'], $u_fetch['password'])) {
                echo 'invalid_pass';
            } else {
                $_SESSION['login'] = true;
                $_SESSION['uId'] = $u_fetch['id'];
                $_SESSION['uName'] = $u_fetch['name'];
                $_SESSION['uPic'] = $u_fetch['profile'];
                $_SESSION['uPhone'] = $u_fetch['phonenum'];
                echo 1;
            }
        }
        exit;
    }
}


// register
if (isset($_POST['register'])) {
    $data = filteration($_POST);
    // math password and confirm password field

    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // check user exists or not 

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['phonenum']], 'ss');

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email'] ? "email_already" : "phone_already");
        exit;
    }

    // upload user image to server 

    $img = uploadUserImage($_FILES['profile']);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } else if ($img == 'upd_failed') {
        echo "upd_failed";
        exit;
    }

    // send confirmation mail to the user for the verification

    $token = bin2hex(random_bytes(16));
    if (!send_mail($data['email'], $token, 'email_confirmation')) {
        echo "mail_failed";
        exit;
    }

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    $query = "INSERT INTO `user_cred`(`name`, `phonenum`, `email`, `address`, `pincode`, `dob`,`profile`, `password`, `token`) VALUES (?,?,?,?,?,?,?,?,?)";

    $values = [$data['name'], $data['phonenum'], $data['email'], $data['address'], $data['pincode'], $data['dob'], $img, $enc_pass, $token];

    if (insert($query, $values, 'sssssssss')) {
        echo 1;
    } else {
        echo 'ins_failed';
    }
}

// forgot password

if (isset($_POST['forgot_pass'])) {
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? LIMIT 1", [$data['email']], 's');

    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email';
    } else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_fetch['is_varified'] == 0) {
            echo 'not_varified';
        } else if ($u_fetch['status'] == 0) {
            echo 'inactive';
        } else {
            $token = bin2hex(random_bytes(16));
            //send reset link 
            if(!(send_mail($data['email'], $token, 'reset_password'))){
                echo 'mail_failed'; 
            }else{
                $date = date('Y-m-d'); 

                $query = mysqli_query($conn,"UPDATE `user_cred` SET `token`='$token',`t_expire`='$date' WHERE `id`='$u_fetch[id]'");

                if($query){
                    echo 1; 
                }else{
                    echo 'upd_failed'; 
                }
            }
        }
    }
}

// reset password
if (isset($_POST['reset_pass'])) {

    $data = filteration($_POST); 

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT); 

    $query = "UPDATE `user_cred` SET `password`=?,`token`=?,`t_expire`=? WHERE `email`=? AND `token`=?";
    $values = [$enc_pass, null, null, $data['email'], $data['token']]; 
    
    if(update($query, $values, 'sssss')){
        echo 1; 
    }else{
        echo 'failed'; 
    }
}
