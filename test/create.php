<?php

// setup the API
require_once('cavirtex.config.php');
require_once('../cavirtex_merchant_api.php');

$cavirtex = new Cavirtex_Merchant_Api(CAVIRTEX_MERCHANT_KEY, CAVIRTEX_MERCHANT_SECRET);

// create a new purchase/invoice (redirects to cavirtex.com invoice, unless format is 'json')
$cavirtex->merchant_purchase(array(
	'name1'     => 'item #1',
	'code1'     => 'code1',
	'price1'    => 0.01,
	'quantity1' => 2,
	
	'name2'     => 'item #2',
	'code2'     => 'code2',
	'price2'    => 0.01,
	'quantity2' => 3,
	
	'shipping'          => 0,
	'shipping_required' => 0,
	
	'customer_name' => 'Mur Smi',
	'address'       => '#123 - 123 Fake St SW',
	'city'          => 'Calgary',
	'province'      => 'AB',
	'postal'        => 'T2T2T2',
	'country'       => 'CA',
	'email'         => 'redshocker4+bitcointest@gmail.com',
	
	//'format' => 'json',
));