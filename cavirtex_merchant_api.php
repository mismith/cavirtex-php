<?php

class Cavirtex_Merchant_Api {
	
	private $merchant_key;
	private $merchant_secret;

	private $base_url = 'https://www.cavirtex.com/';
	
	public function __construct($merchant_key, $merchant_secret){
		// set local keys
		$this->merchant_key    = $merchant_key;
		$this->merchant_secret = $merchant_secret;
		
		return $this;
	}
	
	/* API methods */
	public function merchant_purchase($params){
		// filter out any extra/unnecessary params
		$accept = array(
			'shipping',
			'shipping_required',
			'cancel_url',
			'return_url',
			'email',
			'customer_name',
			'address',
			'address2',
			'city',
			'province',
			'postal',
			'country',
			'format',
		);
		$acceptN = array(
			'name',
			'code',
			'price',
			'quantity',
		);
		foreach($params as $param => $value){
			if( ! (in_array($param, $accept) || preg_match('/^('.implode($acceptN, '|').')\d*$/', $param))) unset($params[$param]);
		}

		// generate URL
		$url = $this->base_url . 'merchant_purchase/' . $this->merchant_key;
				
		// determine whether to redirect to invoice or return an array
		if($redirect === NULL) $redirect = $params['format'] != 'json';
		$params['format'] = 'json'; // always fetch json internally
		$response = self::http_request($url, $params);
		if($redirect && isset($response['order_key'])){
			return $this->merchant_invoice($response['order_key']);
		}else{
			return $response;
		}
	}
	public function merchant_invoice($order_key){
		// handle params
		$params = array(
			'merchant_key' => $this->merchant_key,
			'order_key'	   => $order_key,
		);
		
		// generate URL
		$url = $this->base_url . 'merchant_invoice?' . http_build_query($params);
		
		// redirect to invoice
		return header('Location: ' . $url);
	}
	public function merchant_invoice_balance_check($order_key){
		// handle params
		$params = array(
			'merchant_key' => $this->merchant_key,
			'order_key'	   => $order_key,
		);
		
		// generate URL
		$url = $this->base_url . 'merchant_invoice_balance_check?' . http_build_query($params);
		
		// get the response
		return self::http_request($url);
	}
	
	public function merchant_confirm_ipn($params){
		// handle params
		$params['secret_key'] = $this->merchant_secret;
		
		// generate URL
		$url = $this->base_url . 'merchant_confirm_ipn';
		
		// get the response
		return self::http_request($url);
	}
	
	// receive Instant Payment Notifications from CAVirtEx
	public static function process_ipn(){
		$payload = file_get_contents("php://input");
		
		$data = json_decode($payload, TRUE);
		
		return $data;
	}
	
	/* API Method Aliases (removes redundant 'merchant_') */
	public function purchase($params){
		return $this->merchant_purchase($params);
	}
	public function invoice($order_key){
		return $this->merchant_invoice($order_key);
	}
	public function invoice_balance_check($order_key){
		return $this->merchant_invoice_balance_check($order_key);
	}
	public function confirm_ipn($params){
		return $this->merchant_confirm_ipn($params);
	}
	
	/* Private Helpers */
	// simple wrapper for creating http requests, with auto-post/get detection and json decoding
	private static function http_request($url, $post_data = FALSE){
		// setup cURL request
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
		
		// append $_POST data, if present
		if(is_array($post_data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);  
		}
		
		// parse response into JSON
		$response = curl_exec($curl);
		if( ! $response){
			$response = curl_error($curl);
		}else{
			$response = json_decode($response, TRUE);
		}
		
		// finish up
		curl_close($curl);
		
		return $response;
	}
}