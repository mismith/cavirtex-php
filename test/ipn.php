<?php

// setup the API
require_once('cavirtex.config.php');
require_once('../cavirtex_merchant_api.php');

$cavirtex = new Cavirtex_Merchant_Api(CAVIRTEX_MERCHANT_KEY, CAVIRTEX_MERCHANT_SECRET);

$payloadString = var_export($cavirtex->process_ipn(), TRUE) . "\n";

file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/ipn.log', $payloadString, FILE_APPEND);

echo $payloadString;