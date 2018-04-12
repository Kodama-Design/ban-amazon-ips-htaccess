<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://ip-ranges.amazonaws.com/ip-ranges.json');
$json = $response->getBody()->getContents();
$data = json_decode($json, true);

echo "<pre>";
echo "Order Deny,Allow".PHP_EOL;
foreach($data['prefixes'] as $ip) {
    echo "Deny from ".$ip['ip_prefix'].PHP_EOL;
}
foreach($data['ipv6_prefixes'] as $ip)
{
    echo "Deny from ".$ip['ipv6_prefix'].PHP_EOL;
}