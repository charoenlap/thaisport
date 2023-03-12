<?php 
	class QrModel extends db {
		public function insertQR($data=array()){
			$result = array();
			$insert_id = $this->insert('qr',$data);
			return $insert_id;
		}
		public function insertCallback($data=array()){
			$result = array();
			$insert_id = $this->insert('callback',$data);

			$billPaymentRef1 = $this->escape($data['billPaymentRef1']);
			$result = $this->query("SELECT * FROM gs_member_payment WHERE billPaymentRef1='".$billPaymentRef1."'");
			if($result){
				// ให้ถึงเที่ยงคืน ของวันที่กำหนด
				$result_content = $this->query("SELECT DATE_ADD(date_start, INTERVAL 1 DAY) AS date_start FROM gs_content_sub WHERE id='".$result->row['id_content']."'");
				$id_user = $result->row['user_id'];
				$id_content = $result->row['id_content'];
				$date_expired = $result_content->row['date_start'];
				$data_his = array(
					'id_user' => $id_user,
					'id_package' => 2,
					'id_content' => $id_content,
					'date_expired' => $date_expired
				);
				$this->insert('member_history',$data_his);
			}
			return $insert_id;
		}
		public function checkCallback($ref1='',$ref2=''){
			$result = array();
			$ref1 = $this->escape($ref1);
			$ref2 = $this->escape($ref2);
			$result = $this->query("SELECT * FROM gs_callback WHERE billPaymentRef1 = 'REF1".$ref1."' AND billPaymentRef2 = 'REF2".$ref2."' LIMIT 0,1");
			return $result->row;
		}
	}
?>