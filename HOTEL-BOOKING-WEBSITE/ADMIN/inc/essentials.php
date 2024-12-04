<?php
// error_reporting(0); 
// frontend purpose data 
define('SITE_URL', 'http://localhost/WEB-BASED-PROJECTS/HOTEL-BOOKING-WEBSITE/');
define('ROOM_IMG_PATH', SITE_URL . 'IMAGES/rooms/');
define('USER_IMG_PATH',SITE_URL.'IMAGES/users/');

// backend uploads process needs this
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/WEB-BASED-PROJECTS/HOTEL-BOOKING-WEBSITE/IMAGES/');
define('ROOMS_FOLDER', 'rooms/');
define('USERS_FOLDER', 'users/');

// for the email 

define('USERNAME',"himanshukumar79918618@gmail.com");
define('PASSWORD',"irgqxvhuobylwxmt"); 
define('NAME',"Email Verification !! ");



// if admin is not login then - 
function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true)) {
        echo "<script>
        window.location.href='index.php'; 
     </script>";
    }
    session_regenerate_id(true);
}
// redirect to another window function
function redirect($url)
{
    echo "<script>
        window.location.href='$url'; 
     </script>";
}


// alert function 
function alert($type, $msg)
{
    if($type == 'success'){
        echo <<<alert
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
        <strong class="ms-4">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        alert;
    }
    else{
        echo <<<alert
        <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
        <strong class="ms-4">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        alert;
    }
}

function uploadImage($image, $folder)
{
    $valid_mime = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // invalid image mime or format
    } else if (($image['size'] / (1024 * 1024)) > 2) {
        return 'inv_size';  // invalid size
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}
function deleteImage($image, $folder)
{

    if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
        return true;
    } else {
        return false;
    }
}

// upload user image 

function uploadUserImage($image)
{
    $valid_mime = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // invalid image mime or format
    } 
    else 
    {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";
        $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER . $rname;

        if ($ext == 'PNG' || $ext == 'png') {
            $img = imagecreatefrompng($image['tmp_name']);
        }else if($ext == 'webp' || $ext == 'WEBP'){
            $img = imagecreatefromwebp($image['tmp_name']); 
        }else{
            $img = imagecreatefromjpeg($image['tmp_name']);
        }


        if (imagejpeg($img,$img_path,75)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}
