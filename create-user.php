<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
$client = new Client();
$headers = [
  'Authorization' => 'wKSrqv4ffU7O7h9gNhb83osan7ctHsvn',
  'Content-Type' => 'application/json'
];
$body = '{
  "username": "Migs",
  "password": "192001",
  "real_name": "Miguel Carl D. Basilio",
  "email": "basilio.miguelcarl@auf.edu.ph",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();


