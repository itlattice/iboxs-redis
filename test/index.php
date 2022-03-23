<?php
require_once '../vendor/autoload.php';
use iboxs\redis\Client;

$client=new Client();
echo $client->basic()->ttl('s');