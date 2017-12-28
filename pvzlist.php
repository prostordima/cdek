<?php

//$xmlstr = file_get_contents('https://integration.cdek.ru/pvzlist.php');
//file_put_contents('pvzlist.xml', $xmlstr);
$xmlstr = file_get_contents('pvzlist.xml');

$xml = simplexml_load_string($xmlstr);

/** @noinspection PhpUndefinedFieldInspection */
foreach ($xml->Pvz as $pvz) {

    $point['type'] = $pvz['Type'];
    $point['code'] = $pvz['Code'];
    $point['name'] = $pvz['Name'];
    $point['region_code'] = $pvz['RegionCode'];
    $point['region'] = $pvz['RegionName'];
    $point['city_code'] = $pvz['CityCode'];
    $point['city'] = $pvz['City'];
    $point['worktime'] = $pvz['WorkTime'];
    $point['address'] = $pvz['Address'];
    $point['phone'] = $pvz['Phone'];
    $point['note'] = $pvz['Note'];
    $point['latitude'] = $pvz['coordY'];
    $point['longitude'] = $pvz['coordX'];
    $point['accept_cards'] = $pvz['HaveCashless'];

    $point = array_map('strval', $point);

    var_dump($point);
}