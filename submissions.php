<?php require_once 'bootstrap.php';
//-------------------Logout---------------------

if(isset($_POST['action']) && $_POST['action'] == "logout"){
    session_destroy();
    echo "true";
}