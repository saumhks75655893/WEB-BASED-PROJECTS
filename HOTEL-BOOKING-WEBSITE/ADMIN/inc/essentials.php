<?php

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
    echo <<<alert
    <div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
    <strong class="ms-4">$msg</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}
