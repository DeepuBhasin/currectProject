<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://shop.silversea.com/api/v1/prices/USD', [
	'auth' => ['jason@polaradventure.com', 'Tpac2021', 'digest'], 'verify' => false

]);
$document = $response->json();
require('__db.php');

$query = "TRUNCATE cruise_table;";
mysqli_query($con, $query);


$sql = '';
$c = 0;

$starting = microtime(true);

foreach ($document as $key => $value) {
	$mainData = [
		'voyage_id' => $value['voyage_id'],
		'voyage_cod' => $value['voyage_cod'],
	];

	if (isset($value['air_prices'][0])) {
		$airArray = $value['air_prices'][0];
		$air_prices = [
			'gateway_zone' => (!empty($airArray['gateway_zone'])) ? $airArray['gateway_zone'] : 0,
			'rt_economy_price_flag' => (!empty($airArray['rt_economy_price_flag'])) ? $airArray['rt_economy_price_flag'] : 0,
			'rt_economy_price' => (!empty($airArray['rt_economy_price'])) ? $airArray['rt_economy_price'] : 0,
			'rt_economy_price_promo_flag' => (!empty($airArray['rt_economy_price_promo_flag'])) ? $airArray['rt_economy_price_promo_flag'] : 0,
			'rt_economy_price_promo' => (!empty($airArray['rt_economy_price_promo'])) ? $airArray['rt_economy_price_promo'] : 0,
			'rt_business_price_flag' => (!empty($airArray['rt_business_price_flag'])) ? $airArray['rt_business_price_flag'] : 0,
			'rt_business_price' => (!empty($airArray['rt_business_price'])) ? $airArray['rt_business_price'] : 0,
			'rt_business_price_promo_flag' => (!empty($airArray['rt_business_price_promo_flag'])) ? $airArray['rt_business_price_promo_flag'] : 0,
			'rt_business_price_promo' => (!empty($airArray['rt_business_price_promo'])) ? $airArray['rt_business_price_promo'] : 0,
		];
	} else {
		$air_prices = [
			'gateway_zone' => 0,
			'rt_economy_price_flag' => 0,
			'rt_economy_price' => 0,
			'rt_economy_price_promo_flag' => 0,
			'rt_economy_price_promo' => 0,
			'rt_business_price_flag' => 0,
			'rt_business_price' => 0,
			'rt_business_price_promo_flag' => 0,
			'rt_business_price_promo' => 0,
		];
	}

	foreach ($value['cruise_only_prices'] as $key2 => $value2) {



		$data = [
			(!empty($mainData['voyage_id'])) ? $mainData['voyage_id'] : 0,
			(!empty($mainData['voyage_cod'])) ? $mainData['voyage_cod'] : 0,
			(!empty($value2['suite_category_cod'])) ? $value2['suite_category_cod'] : 0,
			(!empty($value2['suite_category'])) ? addslashes($value2['suite_category']) : 0,
			(!empty($value2['currency_cod'])) ? $value2['currency_cod'] : 0,
			(!empty($value2['cruise_only_fare'])) ? $value2['cruise_only_fare'] : 0,
			(!empty($value2['bundle_fare'])) ? $value2['bundle_fare'] : 0,
			(!empty($value2['early_booking_bonus'])) ? $value2['early_booking_bonus'] : 0,
			(!empty($value2['early_booking_perc'])) ? $value2['early_booking_perc'] : 0,
			(!empty($value2['suite_availability'])) ? $value2['suite_availability'] : 0,
			(!empty($value2['single_supplement_perc'])) ? $value2['single_supplement_perc'] : 0,
			(!empty($value2['has_vs_saving'])) ? $value2['has_vs_saving'] : 0,
			(!empty($value2['vs_saving'])) ? $value2['vs_saving'] : 0,
			$air_prices['gateway_zone'],
			$air_prices['rt_economy_price_flag'],
			$air_prices['rt_economy_price'],
			$air_prices['rt_economy_price_promo_flag'],
			$air_prices['rt_economy_price_promo'],
			$air_prices['rt_business_price_flag'],
			$air_prices['rt_business_price'],
			$air_prices['rt_business_price_promo_flag'],
			$air_prices['rt_business_price_promo'],
		];


		$sql = "INSERT into  cruise_table values(null,'{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}','{$data[6]}','{$data[7]}','{$data[8]}','{$data[9]}','{$data[10]}','{$data[11]}','{$data[12]}','{$data[13]}','{$data[14]}','{$data[15]}','{$data[16]}','{$data[17]}','{$data[18]}','{$data[19]}','{$data[20]}','{$data[21]}');";
		$check = mysqli_query($con, $sql);
		if ($check) {
			$success = true;
			$c++;
		}
		if (!$check) {
			$success = false;
		}
	}
}


if ($success) {
	echo "SUCCESS: $c Record Added Successfully <br/> Program Take Time for Completion : " . ((microtime(true) - $starting) / 60) . ' minutes';
} else {
	echo mysqli_error($con);
}
