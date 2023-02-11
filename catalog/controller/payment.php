<?php 
	class PaymentController extends Controller {
		public function index() {
			// exit();
	    	$data = array();
	    	/*
	    	$id_user = $this->getSession('id_user');
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$data['id_package'] = $id_package 	= (int)get('id_package');
	    	$data['id_content'] = $id_content 	= (int)get('id_content');

	    	if(empty($id_user)){
	    		$id_package = '&id_package='.(int)get('id_package');
	    		$id_content = '&id_content='.(int)get('id_content');
	    		redirect('member/login&redirect=member/contentView'.$id_package.$id_content);
	    	}

	    	$data = array(
    			'image' 	=> '',
    			'amount'	=> '',
    			'result'	=> ''
    		);
    		$data['detail_muay'] = $this->model('master')->getMuaySubDetailNow($id_content);

	    	

	    	$result_check = $this->model('master')->checkActive($id_user);
	    	$free = 0;
	    	if(isset($data['detail_muay'])){
				$free = (int)(isset($data['detail_muay']['free'])?$data['detail_muay']['free']:'');
	    	}
	    	
			// $date_start=date_create($date_start);
			// echo date_format($date_start,"Y-m-d");
			// exit();
			// var_dump($_SESSION);exit();
	    	if($free==1){
	    		$date_content_start = $data['detail_muay']['date_start'];
	    		$date_content_start = date_create($date_content_start);
				$date_content_start = date_format($date_content_start,"Y-m-d");

				$user_detail = $this->model('master')->getUserDetail($id_user);
				$user_create = $user_detail['date_create'];
	    		$user_create = date_create($user_create);
				$user_create = date_format($user_create,"Y-m-d");
				if($user_create == $date_content_start){
	    			redirect('member/contentView&id_content='.$data['id_content']);
	    		}
	    	}
	    	// exit();
	    	if(in_array($id_content,$result_check['id_content'])){
	    		redirect("payment/confirm&id_content=".$id_content);
	    	}else{
	    		
	    	}
	    	// // var_dump($result_check);exit();
	    	// if($result_check['days']==0 AND $result_check['unit']==0){

	    	// }else{
	    	// 	
	    	// }

	    	
	    	
    		if(empty($data['detail_muay']) AND $id_package == 2){
    			redirect('home');
    		}
	    	$data['detail'] = $this->model('master')->getPackageDetail($id_package);
	    	$price = (float)$data['detail']['price'];
	    	// exit();
    		$terminalId = '' ;
		    $requestUId = GUID() ;

		    $billerId 	= billerId;
	    	$data['amount']		=	$amount 	= $price;

		    $data['invoice'] 	= $invoice 		= 'INV_'.$billerId.'_'.time();
		    $data['ref1'] 		= $ref1 		= $billerId;
		    $data['ref2'] 		= $ref2 		= $id_user.'A'.$id_package.'A'.$id_content;
		    
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
				if($id_user==4){
					$amount=1;
				}
		        $post_qrcode = [
		                'qrType'            => 'PP', 
		                'ppType'            => 'BILLERID', 
		                "ppId"              => $billerId,
		                'ref1'              => 'REF1'.$ref1,
		                'ref2'              => 'REF2'.$ref2,
		                'ref3'              => 'GOS', 
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
		        $result = curl_exec($ch);
		        curl_close ($ch);
		        // var_dump($result);exit();
		        $data['result'] = json_decode($result, true);
		        if(!empty($data['result']["data"]["qrImage"])){
		        	$qrImage = $data['result']["data"]["qrImage"];
		            $data['amount'] = number_format($amount,2);
		            $data['image'] = $data['result']["data"]["qrImage"];
		            $insert = array(
		            	'requestUId' 		=> $requestUId,
		            	'billerId' 			=> $billerId,
		            	'amount' 			=> $amount,
		            	'invoice' 			=> $invoice,
		            	'ref1' 				=> $ref1,
		            	'ref2' 				=> $ref2,
		            	'accessToken' 		=> $accessToken,
		            	'requestUIdCreate' 	=> $requestUIdCreate,
		            	'qrImage' 			=> $qrImage,
		            	'create_date'		=> date('Y-m-d H:i:s'),
		            	'id_user'			=> $id_user,
		            	'id_package'		=> $id_package
		            );
		            $this->model('qr')->insertQR($insert);
		        }
		        
		    }
		    $data['id_content'] = get('id_content');
	    	
	    	// var_dump($data['detail']);exit();
	    	*/
 	    	$this->view('payment',$data); 
	    }
	    public function confirm() {
	    	$data = array();
	    	$id_user = (int)$this->getSession('id_user');
	    	$data['id_content'] = (int)get('id_content');
	    	if(!empty($id_user)){
	    		// $check_payment = $this->model('master')->checkPayment($id_user);
	    		if($data['id_content']){
	    			redirect('member/contentView&id_content='.$data['id_content']);
	    		}else{
	    			redirect('member/historyPayment');
	    		}
	    		
	    	}else{
	    		redirect('member/login');
	    	}
	    }
	    public function confirmPayment() {
	    	$data = array();
	    	$id_user = (int)$this->getSession('id_user');
	    	$data['id_content'] = (int)get('id_content');
	    	if(!empty($id_user)){
	    		// $check_payment = $this->model('master')->checkPayment($id_user);
	    		if($data['id_content']){
	    			redirect('member/contentView&id_content='.$data['id_content']);
	    		}else{
	    			redirect('member/historyPayment');
	    		}
	    		
	    	}else{
	    		redirect('member/login');
	    	}
	    }
	}
?>