<?php

$url = 'http://api.cdek.ru/calculator/calculate_price_by_json.php';

$request = array(
    'version' => '1.0',
//    'dateExecute' => date('Y-m-d', time() + 86400 * 2),
    'senderCityId' => 44, // Москва
    'receiverCityId' => 137, // Санкт-Петербург
    'tariffId' => 1, // [139], 137
//    'tariffList' => array('priority' => 0, 'id' => 0),
//    'modeId' => 3,
    'goods' => array(
        array(
            'weight' => 1,
            'length' => 30,
            'width' => 30,
            'height' => 30,
        ),
    )
);

$curlopts = array(
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_CONNECTTIMEOUT => 60,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false
);

$ch = curl_init($url);
curl_setopt_array($ch, $curlopts);
$response = curl_exec($ch);
$error = curl_error($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

header('Content-Type: text/plain; charset=utf-8');

echo date('r')."\n";
var_dump(json_decode($response, true));