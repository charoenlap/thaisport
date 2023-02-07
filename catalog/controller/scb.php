<?php 
	class ScbController extends Controller {
	    public function callback() {
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
			$dataArr = $arr['billPaymentRef2'];
			$dataArrExplode = explode('A',$dataArr);

			$user_id = str_replace('REF2','',$dataArrExplode[0]);
			$package_id = $dataArrExplode[1];
			$id_content = $dataArrExplode[2];

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
	            	'create_date'			=> date('Y-m-d H:i:s'),
	            	'user_id'				=> (int)$user_id,
					'package_id'			=> (int)$package_id,
					'id_content'			=> (int)$id_content	
	            );
	            $this->model('qr')->insertCallback($insert);

	            $this->model('master')->insertPackage($user_id,$package_id,$id_content);
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
	}
?>