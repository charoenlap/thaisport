<?php 
	class ChillpayController extends Controller {
		public function index() {
	    	$data = array();
	    	// echo $_SERVER['REMOTE_ADDR'];
			$curl = curl_init();
			$MerchantCode = "M031443-0002";
			$OrderNo = time();
			$CustomerId = "1";
			$Amount = "1";		
			$PhoneNumber = "0827218999";
			$Description = "TestPayment";
			$ChannelCode = "internetbank_bay";
			$Currency = "764";
			$LangCode = "TH";
			$RouteNo = "1";
			$IPAddress = $_SERVER['REMOTE_ADDR'];
			$APIKey = "DEuwj4v67vyQ8xawA0qY8WIGfOyfbU51uwx1dcacXBcSypFA1f2Tk54IsMrdZMpr";
			$CustEmail = "test@test.com";
			$CheckSum = MD5($MerchantCode.$OrderNo.$CustomerId.$Amount.$PhoneNumber.$Description.$ChannelCode.$Currency.$LangCode.$RouteNo.$IPAddress.$APIKey.$CustEmail);
			curl_setopt_array($curl, array(
			 CURLOPT_URL => "https://sandbox-appsrv2.chillpay.co/api/v2/Payment/",
			 CURLOPT_RETURNTRANSFER => true,
			 CURLOPT_ENCODING => "",
			 CURLOPT_MAXREDIRS => 10,
			 CURLOPT_TIMEOUT => 30,
			 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			 CURLOPT_CUSTOMREQUEST => "POST",
			 CURLOPT_POSTFIELDS =>
			"MerchantCode=".$MerchantCode."&OrderNo=".$OrderNo."&CustomerId=".$CustomerId."&Amount=".$Amount."&PhoneNumber=".$PhoneNumber."&Description=".$Description."&ChannelCode=".$ChannelCode."&Currency=".$Currency."&LangCode=".$LangCode."&RouteNo=".$RouteNo."&IPAddress=".$IPAddress."&APIKey=".$APIKey."&CustEmail=".$CustEmail."&CheckSum=".$CheckSum,
			 CURLOPT_HTTPHEADER => array(
			 "Cache-Control: no-cache",
			 "Content-Type: application/x-www-form-urlencoded"
			 ),
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			if ($err) {
			 echo "cURL Error #:" . $err;
			} else {
			 echo $response;
			}
	    }
	    public function callback() {

	    }
	    public function result() {

	    }
	}
?>