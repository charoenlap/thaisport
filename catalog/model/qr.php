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