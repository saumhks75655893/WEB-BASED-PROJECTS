<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../ADMIN/inc/db_config.php');
require('../ADMIN/inc/essentials.php');

require('../PHPMailer/mailer/Exception.php');
require('../PHPMailer/mailer/PHPMailer.php');
require('../PHPMailer/mailer/SMTP.php');

function send_mail($email, $name, $token)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'himanshukumar79918618@gmail.com';
        $mail->Password = 'irgqxvhuobylwxmt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('himanshukumar893384@gmail.com', 'Login Form');

        $mail->addAddress($email, $name);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body = "
                            Click the link to confirm your email : <br>
                            <a href='" . SITE_URL . "email_confirm.php?email=$email&token=$token" . "'>
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



if (isset($_POST['register'])) {
    $data = filteration($_POST);
    // math password and confirm password field

    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // check user exists or not 

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? AND `phonenum`=? LIMIT 1", [$data['email'], $data['phonenum']], 'ss');

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email'] ? "email_already" : "phone_already");
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

    // sand confirmation mail to the user for the verification

    $token = bin2hex(random_bytes(16));
    if (!send_mail($data['email'], $data['name'], $token)) {
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
