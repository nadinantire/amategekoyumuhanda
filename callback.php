<?php require_once 'bootstrap.php';

$con = $conn= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));


if(!$conn){
    die("Something went wrong");
	die($conn->connect_error);
}

 $curl = curl_init();
//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    echo "ACCESS DENIED,USE POST METHOD";
}else{
    //Make sure that the content type of the POST request has been set to application/json
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));

    $decoded = json_decode($content);
    $description = $decoded->statusDescription;
    $spTransactionId = $decoded->spTransactionId;
    $walletTransactionId = $decoded->walletTransactionId;
    $chargedCommission = $decoded->chargeCommission;
    $currency = $decoded->currency;
    $paidAmount = $decoded->paidAmount;
    $transactionId = $decoded->transactionId;
    $code = $decoded->statusCode;
    $time = $decoded->responseTimeStamp;
    $status = $decoded->status;
    $_SESSION['transactionId'] = $transactionId;
    $query3="UPDATE payments SET updatedAt = CURRENT_TIMESTAMP, paidAmount = '$paidAmount', currency = '$currency', chargedCommission = '$chargedCommission', walletTransactionID = '$walletTransactionId',spTransactionID = '$spTransactionId', statusMessage = '$description', transactionID = '$transactionId', transactionStatus = '$status', transactionStatusCode = '$code' WHERE transactionId = '$walletTransactionId'";
    $result3=$conn->query($query3) or trigger_error($conn->error);
}
