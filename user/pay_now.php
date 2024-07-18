<?php
session_start();

require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looking for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__ . '/..'));
$dotenv->load();

// Replace these with your actual PhonePe API credentials

echo "<center><h1>PhonePe Payment Gateway</h1></center>";

$merchantId = $_ENV["merchantId"]; // sandbox or test merchantId
$apiKey = $_ENV["apiKey"]; // sandbox or test APIKEY
$redirectUrl = 'https://artist-booking.sushmagoswami.com/user/payment_callback.php';

$booking_id = isset($_GET["id"]) ? $_GET["id"] : null;
$email = isset($_GET["email"]) ? $_GET["email"] : null;
$amount = isset($_GET["amount"]) ? (int) $_GET["amount"] : null;
$contact = isset($_GET["contact"]) ? $_GET["contact"] : null;
$username = isset($_GET["username"]) ? $_GET["username"] : null;

if ($booking_id == null || !is_numeric($booking_id) || empty($booking_id)) {
    $_SESSION["error"] = "Invalid Booking ID";
    header("Location: ./booking.php");
    exit();
}

// Set transaction details
$order_id = uniqid();
$name = $username;
$mobile = $contact;
$description = 'Payment for Booking';

$_SESSION["booking_id"] = $booking_id;

$paymentData = array(
    'merchantId' => $merchantId,
    'merchantTransactionId' => $order_id, // test transactionID
    "merchantUserId" => "MUID_{$order_id}",
    'amount' => $amount * 100, // Amount in paise
    'redirectUrl' => $redirectUrl,
    'redirectMode' => "POST",
    'callbackUrl' => $redirectUrl,
    "merchantOrderId" => $order_id,
    "mobileNumber" => $mobile,
    "message" => $description,
    "email" => $email,
    "shortName" => $name,
    "paymentInstrument" => array(
        "type" => "PAY_PAGE",
    )
);

$jsonencode = json_encode($paymentData);
$payloadMain = base64_encode($jsonencode);
$salt_index = 1; // key index 1
$payload = $payloadMain . "/pg/v1/pay" . $apiKey;
$sha256 = hash("sha256", $payload);
$final_x_header = $sha256 . '###' . $salt_index;
$request = json_encode(array('request' => $payloadMain));

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $_ENV["url"],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $request,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "X-VERIFY: " . $final_x_header,
        "accept: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $res = json_decode($response);

    echo "<pre>";
    print_r($res);
    echo "</pre>";

    if (isset($res->success) && $res->success == '1') {
        $payUrl = $res->data->instrumentResponse->redirectInfo->url;

        header('Location:' . $payUrl);
        exit();
    } else {
        echo "Payment initiation failed.";
    }
}