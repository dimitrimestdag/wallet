<?php
    include 'valeurs.php';
    include 'function.php';
    $data = json_decode(function_wallet::AppelApi());
for ($i = 1 ; $i <= 5 ; $i++) {
    $valcrypt[$i] = $data->{'data'}->{$type[$i]}->{'quote'}->{'EUR'}->{'price'};
    //echo $valcrypt[$i]. ' ';
}
?>
<!-- Live Crypto Price area start -->
<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Prix des Crypto en live</h4>
            <div class="cripto-live mt-5">
                <ul>
                    <li>
                        <div class="icon b">b</div> Bitcoin<span><i class="fa fa-long-arrow-up"></i> <?php echo '€'.$valcrypt[1]; ?> </span></li>
                    <li>
                        <div class="icon l">l</div> Litecoin<span><i class="fa fa-long-arrow-up"></i><?php echo '€'.$valcrypt[2]; ?></span></li>
                    <li>
                        <div class="icon r">r</div> Ripple<span><i class="fa fa-long-arrow-up"></i><?php echo '€'.$valcrypt[3]; ?></span></li>
                    <li>
                        <div class="icon v">v</div> Verge<span><i class="fa fa-long-arrow-down"></i><?php echo '€'.$valcrypt[4]; ?></span></li>
                    <li>
                        <div class="icon e">e</div> Etherum<span><i class="fa fa-long-arrow-down"></i><?php echo '€'.$valcrypt[5]; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Live Crypto Price area end -->