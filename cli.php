<?php

include 'vendor/autoload.php';
include 'config.php';

$logs = new \Kraage\Logs();
$krakenapi = new \Payward\KrakenAPI($KEY, $SEC);

$agent = new \Kraage\Agent($logs, $krakenapi);
echo print_r($agent->getBalance());
