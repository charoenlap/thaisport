<?php 
	class ApiController extends Controller {
		function index(){
			echo "test";
		}
		function info(){
			phpinfo();
		}
		public function gitPull(){
			$output=null;
			$retval=null;
			exec("git pull", $output, $retval);
			echo "Returned with status $retval and output:\n";
			print_r($output);
		}
		public function insertMember(){
			$result = array(); 
			$params = array(
    			'username' => post('username'),
				'password' => post('password')
    		);
			$result_user = $this->model('master')->insertMember($params);
			$this->json($result_user);
		}
		public function getMemberLogin(){
			$result = array();
			$params = array(
    			'username' => post('username'),
				'password' => post('password')
    		);
			$result_user = $this->model('master')->selectMember($params);
			$token = encrypt(time());
			$this->model('master')->updateToken($result_user['id'],$token);
			$this->json($result_user);
		}
		public function getSubContentView(){
	    	$result = array();
	    	$result_content = array();

	    	$id_content = post('id_content');
    		$result_content = $this->model('master')->getContentSubView($id_content);
			if($result_content){
				$images = array();
				$images = $this->model('master')->getListContentSubImage($id_content);
				$result_content['images'] = $images;
			}
	    	$this->json($result_content);
	    }
		public function getQR() {
	    	$data = array();
	    	$id_user 	= (int)post('id_user');
	    	$id_content = (int)post('id_content');
	    	$id_package = (int)post('id_package');

	    	$data['detail'] = $this->model('master')->getPackageDetail($id_package);
	    	$price = (float)$data['detail']['price'];

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
				// if($id_user==4 or $id_user==189){
				// 	$amount=1;
				// }
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
		        // $this->json($data['result']);exit();
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
	    	$this->json($data); 
	    }
	    public function checkActive() {
	    	$data = array();
	    	$id_user 	= (int)post('id_user');
	    	$id_content = (int)post('id_content');
	    	$result = $this->model('master')->checkActive($id_user);
	    	$this->json($result); 
	    }
	    public function content() {
	    	$data = array();
	    	$id = (int)get('id');
	    	$result = $this->model('master')->getContentMain($id);
	    	$this->json($result); 
	    }
	    public function feed() {
	    	$data = array();
	    	$result = $this->model('master')->getContent();
	    	foreach($result as $val){
	    		$data[] = array(
	    			'title' => $val['title'],
	    			'date' => $val['date_start']
	    		);
	    	}
	    	// var_dump($data);
	    	$this->json($data); 
	    }
	    public function getSubContent(){
	    	$result = array();
	    	$result_content = array();
	    	// if(method_post()){

	    		$result_content = $this->model('master')->getListContentSub();
	    		// var_dump($result_content);
				if($result_content){
					$images = array();
					// var_dump($result_content);exit();
					foreach($result_content AS $val){
						$images = $this->model('master')->getListContentSubImage($val['id']);
						$contents[] = array(
							'id' 		=> $val['id'],
							'title' 	=> $val['title'],
							'detail'	=> $val['detail'],
							'banner'	=> $val['banner'],
							'cover'		=> $val['cover'],
							'images'	=> $images
						);
					}
					$result = array(
						'status' => 'success',
						'detail' => $contents
					);
				}
	    	// }else{
	    	// 	$result = array(
		    // 		'status' => 'failed',
		    // 		'detail' => 'Method not allow'
		    // 	);
	    	// }
	    	$this->json($result);
	    }
	    public function login(){
	    	$result = array(
	    		'status' => 'failed'
	    	);
	    	// var_dump("test");exit();
	    	if(method_post()){
	    		$phone 		= post('phone');
				$password 	= post('password');
				$insert = array(
					'username' => $phone,
					'password' => md5($password)
				);
				$result_user = $this->model('master')->selectMember($insert);
				if($result_user){
					$result = array(
						'status' => 'success',
						'detail' => $result_user
					);
				}

	    	}
	    	$this->json($result);
	    }
	    public function register(){
	    	$result = array(
	    		'status' => 'failed'
	    	);
	    	$detail='';
	    	if(method_post()){
	    		$phone 		= post('phone');
				$password 	= post('password');
				$cPassword 	= post('cPassword');
				$ref = '';
				if(!empty($password)){
					if($password == $cPassword){
						// echo $ref;exit();
						// $ref = $this->getSession('ref');
						$insert = array(
							'username' 	=> $phone,
							'password' 	=> md5($password),
							// 'ref'		=> $ref
						);
						$result_user = $this->model('master')->insertMember($insert);
						$result['test'] = $result_user;
						if($result_user){
							$result['status'] = 'success';
							$detail = $id_user;
						}else{
							$detail = "มีในระบบแล้ว";
						}
					}else{
						$detail = "รหัสผ่านไม่ตรงกัน";
					}
				}else{
					$detail = "รหัสผ่านมีค่าว่าง";
				}
				
	    	}else{
	    		$detail = "ไม่รอบรับ";
	    	}
	    	$result['detail'] = $detail;
	    	$this->json($result);
	    }
	    public function genarateQRCode() {
	    	// shopping
	    	$data = array();

	    	$terminalId = '' ;
		    $requestUId = GUID() ;

		    $price 		= post('price');
		    $invoice 	= post('invoice');
		    $ref1 		= post('ref1');
			$ref2 		= post('ref2');

			$data['amount']		=	$amount = $price;
		    $data['invoice'] 	= $invoice;
		    $data['ref1'] 		= $ref1;
		    $data['ref2'] 		= $ref2;

			if(empty($price) or empty($invoice) or empty($ref1) or empty($ref2)){
				if(empty($price)){
					$data['status'] = 'Fail';
					$data['desc'] = 'Price empty.';
				}
				if(empty($invoice)){
					$data['status'] = 'Fail';
					$data['desc'] = 'Invoice empty.';
				}
				if(empty($ref1)){
					$data['status'] = 'Fail';
					$data['desc'] = 'Ref1 empty.';
				}
				if(empty($ref2)){
					$data['status'] = 'Fail';
					$data['desc'] = 'Ref2 empty.';
				}
			}else{
				$billerId 	= billerId;
		    	
			    
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
			        // $this->json($data['result']);exit();
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
			            	'type'				=> 1 
			            );
			            $this->model('qr')->insertQR($insert);
			        }
			        
			    }
			    $data['status'] = 'success';
			}
		    
	    	$this->json($data); 
	    }
	    public function checkCallback() {
	    	$result = array();
	    	$ref1 		= post('ref1');
		    $ref2 		= post('ref2');
		    $result = $this->model('qr')->checkCallback($ref1,$ref2);
		    $this->json($result);  
	    }
	}
?>