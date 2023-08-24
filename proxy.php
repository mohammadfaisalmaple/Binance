<?php
$apiKey = 'wrrFL9pwWteoTkjUsuQtjaB9oQm1RV5G2assHnLxgZs6mgdqz8w9KLbon9R0PtFX';
$secretKey = 'QXaWI52KZgH4LAR5prEr9XcKKwWayMIhsmnn6hls17e2AEH8nIds392jRJg3SSSK';

$binanceApiUrl = 'https://testnet.binance.vision/api/v3/asset/transfer';

$asset = $_GET['asset'];
$amount = $_GET['amount'];
$timestamp = $_GET['timestamp'];

$signature = hash_hmac('sha256', "asset=$asset&amount=$amount&timestamp=$timestamp", $secretKey);

$queryString = http_build_query([
    'asset' => $asset,
    'amount' => $amount,
    'timestamp' => $timestamp,
    'signature' => $signature,
]);

$fullUrl = "$binanceApiUrl?$queryString";

$response = file_get_contents($fullUrl, false, stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "X-MBX-APIKEY: $apiKey",
    ]
]));

header('Content-Type: application/json');
echo $response;
?>