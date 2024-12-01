<?php

require('../ADMIN/inc/db_config.php');
require('../ADMIN/inc/essentials.php');

if(isset($_POST['register'])){
    $data = filteration($_POST); 
    // math password and confirm password field

    if($data['pass'] != $data['cpass']){
        echo 'pass_mismatch'; 
        exit; 
    }

    // check user exists or not 

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? AND `phonenum`=? LIMIT 1",[$data['email'],$data['phonenum']], 'ss'); 

    if(mysqli_num_rows($u_exist) != 0){
        $u_exist_fetch = mysqli_fetch_assoc($u_exist); 
        echo ($u_exist_fetch['email'] == $data['email'] ? "Email already exist" : "Phone number already exist.");
    }

    // upload user image to server 
}


?>