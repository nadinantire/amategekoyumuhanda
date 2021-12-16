<?php require_once '../bootstrap.php';
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
$phone = $credetials[0];

$user = $db->GetRow("SELECT users.* FROM users
WHERE `users`.`phone` = ? ",["$phone"]);

//record questions

//record user payment
if(isset($_POST['action']) && $_POST['action'] == "AddPayment" && isset($_POST['service']) && isset($_POST['amount']) && isset($_POST['household']) && isset($_POST['agent']) && isset($_POST['language'])){
    
    if($_POST['amount'] <= $_POST['expected']){

        AddPayment($_POST['type'],$_POST['status'],$_POST['service'],$_POST['household'],$_POST['to'],$_POST['amount'],$_POST['date_paid'],$_POST['language'],$_POST['agent']);
    }else{
        echo "Enter Amount below ".$_POST['expected'];
    }

}