<?php
// Your PHP file (e.g., api-proxy.php)

// Set the CORS headers to allow requests from your web domain
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// API URL
$apiUrl = "https://api-testnet.bscscan.com/api?module=account&action=txlist&address=0x73522bb5Ff9B3aa50aE73af7E109836f84E48Cf4&startblock=0&endblock=99999999&page=1&offset=10&sort=desc&apikey=UIH5JIH8BBXXWEUBQR5G6F87DYAWNTW642";

// Fetch data from the API
$response = file_get_contents($apiUrl);

// Output the response
echo $response;
?>