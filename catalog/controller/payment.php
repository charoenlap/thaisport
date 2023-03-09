<?php 
	class PaymentController extends Controller {
		public function checkPayment(){
			$result = array('result'=>0);
			if(method_post()){
				$referenceNo = post('referenceNo');
				$result = array('referenceNo'=>$referenceNo);
				$resultCheck = $this->model('master')->checkPaymentSuccess($referenceNo);
				if($resultCheck){
					$result = array('result'=>1);
				}
			}
			$this->json($result);
		}
		public function gbPrimePay(){
			$data_payment = array(
				'public_key' => 'ghetIuSN8qDL8PtYzzCReTDY9wJ9sWR6',
				'secret_key' => 'eQlAjbS2DNCRWQ4eLbsnDrLAAqiTqoTm',
				'token'		 => 'G3+9BhJBKt2UmOHDu83bFUaG3C/mzYnSvowEurDSjGMf+BX0gqdIUPwoudFn6NjAPdUCHaG1JF6LJD3nfeLHwQySdAsBxNrDUPr4m8ud4mUoaTPbD3RGRUKrFzQ3oCGlZOrfm9wO2N8x+HR62kyy2pbvBjPHDGec6ABDLXxrfgMjePF4'
			);
			// if(method_post()){
			

			// isset( $_POST['itemamount'] ) ? $itemamount = $_POST['itemamount'] : $itemamount = "";
			$request_headers = array(
				"Cache-Control: no-cache",
			);
			$itemamount = 1;
			if( !empty( $itemamount ) ) {
				$env = "https://api.gbprimepay.com/";

				$token = $data_payment['token'];
				// echo $token;
				$tokenKey = rawurlencode($data_payment['token']);      
				$referenceNo = "ts".time().rand(10,99);
				$field = 'token='.$tokenKey.'&referenceNo='.$referenceNo.'&amount='.$itemamount.'&backgroundUrl=http://thaisport-stadium.com/index.php?route=payment/submitgbPrimePay';
				$url = $env."/v3/qrcode";
 
				// curl api grcode
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $field);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLINFO_HEADER_OUT, true);
				curl_setopt($ch, CURLOPT_ENCODING, "");
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
				$output = curl_exec($ch);
				curl_close($ch);
				// var_dump($output);
				// encode output from api 
				$body = 'data:image/png;base64,' . base64_encode($output) . '';
				

				// output img qrcode by html
				echo '<img src="' . $body . '"  style="padding:0px 0px 120px 0px;windth:100%;" class="aligncenter size-full" />';
			}
			// }
		}
		public function submitgbPrimePay(){
			$json_str = file_get_contents('php://input');
			$json_obj = json_decode($json_str);

			$user_id = '';
			$package_id = '';
			$id_content = '';

			$filename = time().rand(01,99);
			$data_qr = array(
				'user_id' 			=> $user_id,
				'package_id' 		=> $package_id,
				'id_content' 		=> $id_content,
				'payerName'			=> $json_obj->customerName,
				'billPaymentRef1' 	=> $json_obj->referenceNo,
				'billPaymentRef2' 	=> $json_obj->gbpReferenceNo,
				'confirmId' 		=> $json_obj->resultCode,
				'create_date'		=> date('Y-m-d H:i:s')
			);
			$callback = $this->model('qr')->insertCallback($data_qr);

			$respFile = fopen("/home/thaisport/domains/thaisport-stadium.com/public_html/log_payment/resp-log".$filename.".txt", "w") or die("Unable to open file!");

			
			fwrite($respFile, $json_str . "\n\n");

			

			fwrite($respFile, "resultCode=" . $json_obj->resultCode . "\n");
			fwrite($respFile, "amount=" . $json_obj->amount . "\n");
			fwrite($respFile, "referenceNo=" . $json_obj->referenceNo . "\n");
			fwrite($respFile, "gbpReferenceNo=" . $json_obj->gbpReferenceNo . "\n");
			fwrite($respFile, "currencyCode=" . $json_obj->currencyCode . "\n");

			fclose($respFile);
		}
		public function index() {
	    	$data = array();
			$data['id_content'] = $id_content = (int)get('id_content');
			$id_user = (int)$this->getSession('id_user');
			// var_dump($_SESSION);exit();
			if(!empty($id_content) AND !empty($id_user)){
				$referenceNo = "ts".time().rand(10,99);
				$this->model('master')->insertMemberPayment($id_user,$referenceNo,$id_content);
				$data['detail'] = $this->model('master')->getContentSub($id_content);

				$data_payment = array(
					'public_key' => 'ghetIuSN8qDL8PtYzzCReTDY9wJ9sWR6',
					'secret_key' => 'eQlAjbS2DNCRWQ4eLbsnDrLAAqiTqoTm',
					'token'		 => 'G3+9BhJBKt2UmOHDu83bFUaG3C/mzYnSvowEurDSjGMf+BX0gqdIUPwoudFn6NjAPdUCHaG1JF6LJD3nfeLHwQySdAsBxNrDUPr4m8ud4mUoaTPbD3RGRUKrFzQ3oCGlZOrfm9wO2N8x+HR62kyy2pbvBjPHDGec6ABDLXxrfgMjePF4'
				);
				$request_headers = array(
					"Cache-Control: no-cache",
				);
				$itemamount = 1; //100
				if( !empty( $itemamount ) ) {
					
					$billPaymentRef1 = $referenceNo;

					$env = "https://api.gbprimepay.com/";

					$token = $data_payment['token'];
					// echo $token;
					$tokenKey = rawurlencode($data_payment['token']);      
					
					$field = 'token='.$tokenKey.'&referenceNo='.$referenceNo.'&amount='.$itemamount.'&backgroundUrl=http://thaisport-stadium.com/index.php?route=payment/submitgbPrimePay';
					$url = $env."/v3/qrcode";
	
					// curl api grcode
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $field);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLINFO_HEADER_OUT, true);
					curl_setopt($ch, CURLOPT_ENCODING, "");
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
					$output = curl_exec($ch);
					curl_close($ch);
					// var_dump($output);
					// encode output from api 
					$data['referenceNo'] = $referenceNo;
					$data['body'] = 'data:image/png;base64,' . base64_encode($output) . '';
				}
				$this->view('payment',$data); 
			}else{
				$this->view('home',$data); 
			}
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