<?php
//include 'valeurs.php';
//include 'function.php';
//echo function_wallet::AppelApi2();
//$data = json_decode(function_wallet::AppelApi2());
//$valcrypt = $data->{'data'}->{'BTC'}->{'quote'}->{'EUR'}->{'price'};
//$function_wallet = new function_wallet();
//$echo->
//echo function_wallet::ValeursCrypto($type);
//$test = $_GET['test'];
//$data = json_decode(function_wallet::AppelApi());
//for ($i = 1 ; $i <= 5 ; $i++) {
//    $valcrypt[$i] = $data->{'data'}->{$type[$i]}->{'quote'}->{'EUR'}->{'price'};
//    echo $valcrypt[$i]. ' ';
//}
//echo $test;
include 'connexion.php';
header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";
$sql_btc = "SELECT * FROM btc" ;
$req = $bdd->query($sql_btc);
while ($donnees = $req->fetch()) {
    echo "<item date=\"" . $donnees["date"] . "\" gp=\"" . $donnees["gp"] . "\" />";
}
echo "</list>";