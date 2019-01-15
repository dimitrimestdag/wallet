<?php
	include 'valeurs.php';
    class function_wallet{
		public function AppelApi2 ($tabcrypt, $i){
			$json = file_get_contents('https://api.coinmarketcap.com/v2/ticker/' . $tabcrypt[$i] . '/?convert=EUR'); 
			$data = json_decode($json);
			$valcrypt = $data->{'data'}->{'quotes'}->{'EUR'}->{'price'};
			return $valcrypt;
		}
		public function ValeurAct($AppelApi, $tabcrypt, $i ,$quantite, $crypto){
			$valeuract=$AppelApi*$quantite[$crypto];
			return $valeuract;
		}
		function Gp ($ValeurAct, $AppelApi, $tabcrypt, $i, $quantite, $toteurachat, $crypto){
			$gp = valeuract($appelapi, $tabcrypt, $i ,$quantite, $crypto)-$toteurachat[$crypto];
			return $gp;
		}
		function AfficheCase ($quantite , $toteurachat, $AppelApi, $type, $i, $tabcrypt , $ValeurAct, $Gp){
			LigneTab($quantite , $toteurachat, $AppelApi, $type, $i, $tabcrypt , $ValeurAct[$type[$i]], $Gp[$type[$i]]);
			$gpbtc = $Gp[$type[$i]]; 
		}
		public function Couleur ($Gp){
			if ($Gp >=0)
				echo "    <div class='cell' data-title='G/P Total'><font color='lime'>". $Gp . "</font></div>\n";
			else
				echo "    <div class='cell' data-title='G/P Total'><font color='red'>". $Gp . "</font></div>\n";
		}
		
		private function LigneTab ($quantite , $toteurachat, $AppelApi, $type,$i, $tabcrypt, $ValeurAct, $Gp){
			echo "<div class='table'>\n";
				echo "  <div class='row'>\n";
					echo "    <div class='cell' data-title='Devise'>" . $type[$i] . "</div>\n";
					echo "    <div class='cell' data-title='Total'>" . $quantite[$type[$i]] ."</div>\n";
					echo "    <div class='cell' data-title='Total EUR à l achat'>" .$toteurachat[$type[$i]] . "</div>\n";
					echo "    <div class='cell' data-title='Total EUR actuel'>" . $ValeurAct . "</div>\n";
					Couleur(Gp($Valeuract, $AppelApi, $tabcrypt, $i, $quantite, $toteurachat, $type[$i]));
				echo "  </div>\n";
			echo "</div>\n";
        }
        public static function AppelApi(){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BTC%2CETH%2CXRP%2CXVG%2CLTC&convert=EUR",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"postman-token: e0c4537b-af08-4538-ed36-14513c9a5c66",
				"x-cmc_pro_api_key: 2b1605ff-82fe-490f-8322-614a5fe28ba7"
			),
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			if ($err) {
			$response = "cURL Error #:" . $err;
			return $response;
			} else {
			return $response;
			}
		}
		/* public function ValeurCrypto($type){
			$data = json_decode(function_wallet::AppelApi2());
			for ($i = 1 ; $i <= 5 ; $i++) {
				$valcrypt[$i] = $data->{'data'}->{$type[$i]}->{'quote'}->{'EUR'}->{'price'};
		} */
    }
    /* for ($i = 1 ; $i <= 5 ; $i++) {
        $ValeurAct = [
            'BTC' => function_wallet::ValeurAct(function_wallet::AppelApi($tabcrypt, $i), $tabcrypt, $i, $quantite, 'BTC'),
            'LTC' => function_wallet::ValeurAct(function_wallet::AppelApi($tabcrypt, $i), $tabcrypt, $i, $quantite, 'LTC'),
            'XRP' => function_wallet::ValeurAct(function_wallet::AppelApi($tabcrypt, $i), $tabcrypt, $i, $quantite, 'XRP'),
            'XVG' => function_wallet::ValeurAct(function_wallet::AppelApi($tabcrypt, $i), $tabcrypt, $i, $quantite, 'XVG'),
            'ETH' => function_wallet::ValeurAct(function_wallet::AppelApi($tabcrypt, $i), $tabcrypt, $i, $quantite, 'ETH'),
			];
		$ValeurCrypto = [
			'BTC' => function_wallet::AppelApi ($tabcrypt, $i),
			'LTC' => function_wallet::AppelApi ($tabcrypt, $i),
			'XRP' => function_wallet::AppelApi ($tabcrypt, $i),
			'XVG' => function_wallet::AppelApi ($tabcrypt, $i),
			'ETH' => function_wallet::AppelApi ($tabcrypt, $i)
		];
	} */