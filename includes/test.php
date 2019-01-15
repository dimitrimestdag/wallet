<?php
include 'valeurs.php';
include 'function.php';
//echo function_wallet::AppelApi2();
//$data = json_decode(function_wallet::AppelApi2());
//$valcrypt = $data->{'data'}->{'BTC'}->{'quote'}->{'EUR'}->{'price'};
//$function_wallet = new function_wallet();
//$echo->
//echo function_wallet::ValeursCrypto($type);
$data = json_decode(function_wallet::AppelApi());
for ($i = 1 ; $i <= 5 ; $i++) {
    $valcrypt[$i] = $data->{'data'}->{$type[$i]}->{'quote'}->{'EUR'}->{'price'};
    echo $valcrypt[$i]. ' ';
}