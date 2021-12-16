<?php

if(isset($_GET['instructor'])){
   require_once '../bootstrap.php';
   $instructorGUID = $_GET['instructor'];
   if($db->DeletingData("DELETE FROM users WHERE GUID = ? AND role = 2",["$instructorGUID"])){
    header('Location: '.URLROOT.'admin/');
   }else{
        echo "<script>alert('Ntabwo byakunze gusiba umwarimu!, Gerageza Mukanya.')</script>";
   }

}else{
    exit();
}
?>