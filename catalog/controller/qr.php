<?php 
	class QrController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['amount'] 	= 1 ; 
		    $data['invoice'] 	= 'scb'.rand(100,999).time();
		    $data['ref1'] 		= rand(100,999).time();
		    $data['ref2'] 		= rand(100,999).time();
		    $data['billerId'] 	= billerId;
		    $data['action']		= 'index.php?route=qr/genQR';
	    	$this->view('qr/index',$data);
	    }
	    /*
	    public function genQR(){
	    	if(method_post()){
	    		$data = array(
	    			'image' 	=> '',
	    			'amount'	=> '',
	    			'result'	=> ''
	    		);
	    		$terminalId = '' ;
			    $requestUId = GUID() ;
			    $billerId 	= post('billerId');
		    	$amount 	= post('amount');
			    $data['invoice'] 	= $invoice 		= post('invoice');
			    $data['ref1'] 		= $ref1 		= post('ref1');
			    $data['ref2'] 		= $ref2 		= post('ref2');
			    
			    $api_key 	= api_key;
			    $api_secret = api_secret;
			    
			    $arrayHeader1 = array();
			    $arrayHeader1[] = "Content-Type: application/json";
			    $arrayHeader1[] = "accept-language: EN";
			    $arrayHeader1[] = "requestUId: ".$requestUId;
			    $arrayHeader1[] = "resourceOwnerId: ".$api_key; //API Key

			    $post_qrcode1 = [
			        'applicationKey' => $api_key, //API Key
			        'applicationSecret' => $api_secret //API Secret
			    ];
			    $url = url;
			    $get_token = $url."v1/oauth/token";
			    $ch1 = curl_init();
			    curl_setopt($ch1, CURLOPT_URL,$get_token);
			    curl_setopt($ch1, CURLOPT_HEADER, false);
			    curl_setopt($ch1, CURLOPT_POST, true);
			    curl_setopt($ch1, CURLOPT_HTTPHEADER, $arrayHeader1);
			    curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($post_qrcode1));
			    curl_setopt($ch1, CURLOPT_RETURNTRANSFER,true);
			    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
			    $result1 = curl_exec($ch1);
			    curl_close ($ch1);
			    $someArray1 = json_decode($result1, true);
			    if(isset($someArray1['data']['accessToken'])) {
			    	$accessToken = $someArray1['data']['accessToken'];
			        $arrayHeader = array(); 
			        $requestUIdCreate = GUID() ;
			        $arrayHeader[] = "Content-Type: application/json";
			        $arrayHeader[] = "accept-language: EN";
			        $arrayHeader[] = "authorization: Bearer ".$accessToken;
			        $arrayHeader[] = "requestUId: ".$requestUIdCreate;
			        $arrayHeader[] = "resourceOwnerId: ".$api_key;
			        $ref1 = strtoupper($ref1);
					$ref2 = strtoupper($ref2);
			        $post_qrcode = [
			                'qrType'            => 'PP', 
			                'ppType'            => 'BILLERID', 
			                "ppId"              => $billerId,
			                'ref1'              => 'REF1'.$ref1,
			                'ref2'              => 'REF2'.$ref2,
			                'ref3'              => 'CDN', 
			                'amount'            => $amount,
			        ];
			        $strUrl = $url."v1/payment/qrcode/create";
			        $ch = curl_init();
			        curl_setopt($ch, CURLOPT_URL,$strUrl);
			        curl_setopt($ch, CURLOPT_HEADER, false);
			        curl_setopt($ch, CURLOPT_POST, true);
			        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
			        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_qrcode));
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			        $data['result'] = $result = curl_exec($ch);
			        curl_close ($ch);
			        $someArray = json_decode($result, true);
			    }
		        // if(!empty($someArray["data"]["qrImage"])){
		        // 	$qrImage = $someArray["data"]["qrImage"];
		        //     $data['amount'] = number_format($amount,2);
		        //     $data['image'] = $someArray["data"]["qrImage"];
		        //     $insert = array(
		        //     	'requestUId' 		=> $requestUId,
		        //     	'billerId' 			=> $billerId,
		        //     	'amount' 			=> $amount,
		        //     	'invoice' 			=> $invoice,
		        //     	'ref1' 				=> $ref1,
		        //     	'ref2' 				=> $ref2,
		        //     	'accessToken' 		=> $accessToken,
		        //     	'requestUIdCreate' 	=> $requestUIdCreate,
		        //     	'qrImage' 			=> $qrImage,
		        //     	'create_date'		=> date('Y-m-d H:i:s')	
		        //     );
		        //     $this->model('qr')->insertQR($insert);
		        // }
			    $this->view('qr/genQR',$data);
			}else{
				redirect('home&result=methodNotAllow');
			}
	    }
	    public function callBack(){
	    	$post_data = file_get_contents('php://input');

			// # $doc_root = str_replace('private_html','public_html',$_SERVER['DOCUMENT_ROOT'])."/callback/";
			$confirmId = time().'_'.str_pad(rand(00000000,9999999), 8, "0", STR_PAD_LEFT);

			$myfile = fopen('callback/callback_'.$confirmId.".txt", "w") or die("Unable to open file!");
			fwrite($myfile, $post_data);
			fclose($myfile);
			// $myfile = fopen("callback/callback_1646892310_03091307.txt", "r") or die("Unable to open file!");
			// $post_data = fread($myfile,filesize("callback/callback_1646892310_03091307.txt"));
			// fclose($myfile);
	    	// var_dump($read);exit();
			$arr = json_decode($post_data,true);
			if(isset($arr['payeeProxyId'])){
				$insert = array(
					'confirmId'				=> $confirmId,
					'payeeProxyId'			=> $arr['payeeProxyId'],
					'payeeProxyType'		=> $arr['payeeProxyType'],
					'payeeAccountNumber'	=> $arr['payeeAccountNumber'],
					'payeeName'				=> $arr['payeeName'],
					'payerAccountNumber'	=> $arr['payerAccountNumber'],
					'payerAccountName'		=> $arr['payerAccountName'],
					'payerName'				=> $arr['payerName'],
					'sendingBankCode'		=> $arr['sendingBankCode'],
					'receivingBankCode'		=> $arr['receivingBankCode'],
					'amount'				=> $arr['amount'],
					'transactionId'			=> $arr['transactionId'],
					'transactionDateandTime'=> $arr['transactionDateandTime'],
					'billPaymentRef1'		=> $arr['billPaymentRef1'],
					'billPaymentRef2'		=> $arr['billPaymentRef2'],
					'billPaymentRef3'		=> $arr['billPaymentRef3'],
					'currencyCode'			=> $arr['currencyCode'],
					'channelCode'			=> $arr['channelCode'],
					'transactionType'		=> $arr['transactionType'],
	            	'create_date'			=> date('Y-m-d H:i:s')	
	            );
	            $this->model('qr')->insertCallback($insert);

				$arr_result = array(
					'resCode' 		=> '00',
					'resDesc'		=> 'success',
					'transactionId'	=> $arr['transactionId'],
					'confirmId'		=> $confirmId
				);
			}else{
				$arr_result = array(
					'resCode' 		=> '01',
					'resDesc'		=> 'failed',
					'transactionId'	=> '',
					'confirmId'		=> ''
				);
			}
			echo json_encode($arr_result);
	    }
	    */
	    public function transactions(){
	    	$data = array();
	    	$data['action'] = "index.php?route=qr/transactions";
	    	$data['transRef'] = $transRef = get('transRef');
	    	if($transRef){
			    ##SCB Required standard headers (requestUId, resourceOwnerId) not found
			    $terminalId = '' ;
			    $requestUId = GUID() ;
			    $billerId = billerId ;
			    $api_key = api_key ;
			    $api_secret = api_secret ;

			    // $merchantId = '211544917211952' ;
			    // $terminalId = '625152504929832' ;
			    // $billerId = '551975341214337' ;
			    // $api_key = 'l7c17ebf9b5f9947d381282115a6bc6de8' ;
			    // $api_secret = '073121a046bc419ea196b6bb38931e74' ;
			    
			    $arrayHeader1 = array();
			    $arrayHeader1[] = "Content-Type: application/json";
			    $arrayHeader1[] = "accept-language: EN";
			    $arrayHeader1[] = "requestUId: ".$requestUId;
			    $arrayHeader1[] = "resourceOwnerId: ".$api_key; //API Key

			    $post_qrcode1 = [
			        'applicationKey' => $api_key, //API Key
			        'applicationSecret' => $api_secret //API Secret
			    ];
			    $url = url;
			    // $url = "https://api-sandbox.partners.scb/partners/sandbox/";
			    $get_token = $url."v1/oauth/token";
			    $ch1 = curl_init();
			    curl_setopt($ch1, CURLOPT_URL,$get_token);
			    curl_setopt($ch1, CURLOPT_HEADER, false);
			    curl_setopt($ch1, CURLOPT_POST, true);
			    curl_setopt($ch1, CURLOPT_HTTPHEADER, $arrayHeader1);
			    curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($post_qrcode1));
			    curl_setopt($ch1, CURLOPT_RETURNTRANSFER,true);
			    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
			    $result1 = curl_exec($ch1);
			    curl_close ($ch1);
			    $someArray1 = json_decode($result1, true);
			    // echo "Header get token<br>";
			    // echo "<pre>";
			    // var_dump($someArray1);
			    // echo "</pre>";
			    if(isset($someArray1['data']['accessToken'])) {
			        $arrayHeader = array(); 
			        $requestUId = GUID() ;
			        $arrayHeader[] = "Content-Type: application/json";
			        $arrayHeader[] = "accept-language: EN";
			        $arrayHeader[] = "authorization: Bearer ".$someArray1['data']['accessToken'];
			        $arrayHeader[] = "requestUId: ".$requestUId;
			        $arrayHeader[] = "resourceOwnerId: ".$api_key;

			        // echo "API Header<br>";
			        // echo "<pre>";
			        // var_dump($arrayHeader);
			        // echo "</pre>";
			        $post_qrcode = [
			                'sendingBank'         => '014'
			        ];
			        // echo "data Send<br>";
			        // echo "<pre>";
			        // var_dump($post_qrcode);
			        // echo "</pre>";
			        $transRef = $_GET['transRef'];
			        // 202202220aDXblbHy64d8cyAC
			        // $strUrl = $url."v1/​payment/​billpayment/​transactions/​".$transRef.'?sendingBank=014';
			        // echo 'URL: '.$strUrl;
			        $strUrl = url."v1/payment/billpayment/transactions/".$transRef."?sendingBank=014";

			        $ch = curl_init();
			        curl_setopt($ch, CURLOPT_URL,$strUrl);
			        curl_setopt($ch, CURLOPT_HEADER, false);
			        // curl_setopt($ch, CURLOPT_POST, true);
			        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
			        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_qrcode));
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			        $result = curl_exec($ch);
			        curl_close ($ch);
			        $someArray = json_decode($result, true);
			        // echo "<br>Result:<br>";
			        // var_dump($result);
			        $data['result'] = $result;
			    }
			}else{
				$data['result'] = json_encode(array('result'=>'failed','desc'=>'transRef not found.'));
			}
			$this->view('transactions/index',$data);
	    }
	    public function inquiry(){
	    	$data = array();
	    	$data['action'] = 'index.php?route=qr/inquiry';
	    	$data['amount'] = '';
			$data['invoice'] = '';
			$data['ref1'] = '';
			$data['ref2'] = '';
			$data['transactionDate'] = date('Y-m-d');
			$data['result'] = '';
			$data['strUrl'] = '';
	    	if(method_post()){
	    		$data['amount'] 			= $amount 			= post('amount');
			    $data['invoice'] 			= $invoice 			= post('invoice');
			    $data['ref1'] 				= $ref1 			= post('ref1');
			    $data['ref2'] 				= $ref2 			= post('ref2');
			    $data['transactionDate'] 	= $transactionDate 	= post('transactionDate');

			    $terminalId 	= '' ;
			    $requestUId 	= GUID() ;
			    $billerId 		= billerId ;
			    $api_key 		= api_key ;
			    $api_secret 	= api_secret ;

			    $arrayHeader1 = array();
			    $arrayHeader1[] = "Content-Type: application/json";
			    $arrayHeader1[] = "accept-language: EN";
			    $arrayHeader1[] = "requestUId: ".$requestUId;
			    $arrayHeader1[] = "resourceOwnerId: ".$api_key; //API Key

			    $post_qrcode1 = [
			        'applicationKey' 	=> $api_key, //API Key
			        'applicationSecret' => $api_secret //API Secret
			    ];
			    $url = url;
			    // $url = "https://api-sandbox.partners.scb/partners/sandbox/";
			    $get_token = $url."v1/oauth/token";
			    $ch1 = curl_init();
			    curl_setopt($ch1, CURLOPT_URL,$get_token);
			    curl_setopt($ch1, CURLOPT_HEADER, false);
			    curl_setopt($ch1, CURLOPT_POST, true);
			    curl_setopt($ch1, CURLOPT_HTTPHEADER, $arrayHeader1);
			    curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($post_qrcode1));
			    curl_setopt($ch1, CURLOPT_RETURNTRANSFER,true);
			    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
			    $result1 = curl_exec($ch1);
			    curl_close ($ch1);
			    $someArray1 = json_decode($result1, true);
			    // echo "Header get token<br>";
			    // echo "<pre>";
			    // var_dump($someArray1);
			    // echo "</pre>";
			    if(isset($someArray1['data']['accessToken'])) {
			        $arrayHeader = array(); 
			        $requestUId = GUID() ;
			        $arrayHeader[] = "Content-Type: application/json";
			        $arrayHeader[] = "accept-language: EN";
			        $arrayHeader[] = "authorization: Bearer ".$someArray1['data']['accessToken'];
			        $arrayHeader[] = "requestUId: ".$requestUId;
			        $arrayHeader[] = "resourceOwnerId: ".$api_key;
			        // echo "API Header<br>";
			        // echo "<pre>";
			        // var_dump($arrayHeader);
			        // echo "</pre>";
			        $post_qrcode = [
			                'eventCode'         => '00300100',
			                'transactionDate'   => $transactionDate,
			                'billerId'          => $billerId,
			                'reference1'        => $ref1,
			                'reference2'        => $ref2,
			                // 'partnerTransactionId'=> '',
			                'amount'            => $amount
			        ];
			        // echo "data Send<br>";
			        // echo "<pre>";
			        // var_dump($post_qrcode);
			        // echo "</pre>";
			        // $strUrl = $url."v1/​payment/​billpayment/​inquiry";
			        $data['strUrl'] = $strUrl = "https://api.partners.scb/partners/v1/payment/billpayment/inquiry?eventCode=00300100&billerId=".$billerId."&transactionDate=".$transactionDate."&reference1=".$ref1."&reference2=".$ref1;
			        // echo 'URL: '.$strUrl;
			        $ch = curl_init();
			        curl_setopt($ch, CURLOPT_URL,$strUrl);
			        curl_setopt($ch, CURLOPT_HEADER, false);
			        // curl_setopt($ch, CURLOPT_POST, false);
			        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
			        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_qrcode));
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			        $result = curl_exec($ch);
			        curl_close ($ch);
			        $someArray = json_decode($result, true);
			        // var_dump($someArray);
			        $data['result'] = $result;
			    }
	    	}
		    $this->view('inquiry/index',$data);
	    }
	    public function submitInquiry(){
	    	
	    }
	}
?>