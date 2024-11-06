<?php

// Step 1: Get OAuth Token
function getAccessToken($consumerKey, $consumerSecret) {
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'; // Use 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials' for live environment
    $credentials = base64_encode($consumerKey . ':' . $consumerSecret);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    $result = json_decode($response);

    curl_close($curl);
    
    return $result->access_token;
}

// Step 2: STK Push Function
function lipaNaMpesa($accessToken, $shortcode, $lipaNaMpesaOnlinePassKey, $amount, $phoneNumber, $callbackURL, $accountReference, $transactionDesc) {
    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'; // Use 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest' for live environment

    $timestamp = date('YmdHis');
    $password = base64_encode($shortcode . $lipaNaMpesaOnlinePassKey . $timestamp);

    $data = array(
        'BusinessShortCode' => $shortcode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phoneNumber,  // Customer phone number
        'PartyB' => $shortcode,    // Business Short Code
        'PhoneNumber' => $phoneNumber,
        'CallBackURL' => $callbackURL,
        'AccountReference' => $accountReference,
        'TransactionDesc' => $transactionDesc
    );

    $data_string = json_encode($data);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $response = curl_exec($curl);
    
    curl_close($curl);
    
    return json_decode($response);
}

// Step 3: Define your variables
$consumerKey = 'your_consumer_key';           // Replace with your Consumer Key
$consumerSecret = 'your_consumer_secret';     // Replace with your Consumer Secret
$shortcode = '174379';                        // Replace with your Shortcode (174379 for sandbox)
$lipaNaMpesaOnlinePassKey = 'your_passkey';   // Replace with your Passkey
$amount = 100;                                // Amount to charge (in KES)
$phoneNumber = '254792452898';                // Customer's Phone Number in 254 format
$callbackURL = 'https://yourdomain.com/callback.php'; // Your callback URL
$accountReference = 'Test123';                // Account reference for the transaction
$transactionDesc = 'Payment for goods';       // Description of the transaction

// Step 4: Execute
$accessToken = getAccessToken($consumerKey, $consumerSecret);
$response = lipaNaMpesa($accessToken, $shortcode, $lipaNaMpesaOnlinePassKey, $amount, $phoneNumber, $callbackURL, $accountReference, $transactionDesc);

// Step 5: Display the response
header('Content-Type: application/json');
echo json_encode($response);

?>
