<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // …
    if(isset($_POST['action'])){
        //load utils
        require_once '../bootstrap.php';
        //defining response
        $response = array();
        //check action type
        switch ($_POST['action']) {

            case 'getBanner':

                $key          = $_POST['key'];
                $banner     = $db->GetRow("SELECT *  FROM `banners`   WHERE `banners`.`description` = ? ",["$key"]);
                $response["error"]  = 0;
                $response["data"]   = $banner;
                break;
            default:
                # code...
                break;
        }
        echo json_encode($response);
    }
}else{
    echo "API v1.";
}