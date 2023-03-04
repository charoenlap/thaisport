<?php 
	class MasterModel extends db {
        public function getHighlight($limit=''){
            $result = array();
            $result = $this->query("SELECT * FROM gs_highlight ".$limit);
            return $result->rows;
        }
        public function getAgency($id=0){
            $result = array();
            $sql = "SELECT * FROM gs_member WHERE gs_member.`ref_id` = ".(int)$id;
            $result = $this->query($sql)->rows;
            return $result;
        }
        public function getUserDetail($id){
            // $id = $this->escape(isset($data['id'])?$data['id']:'');
            // echo "SELECT * FROM gs_user WHERE id = '".(int)$id."' limit 0,1";exit();
            $result = $this->query("SELECT * FROM gs_member WHERE id = '".(int)$id."' limit 0,1");
            return $result->row;
        }
        public function checkToken($id='',$token=''){
            $result = array();
            $sql = "SELECT * FROM gs_member WHERE gs_member.`id`='".(int)$id."' AND token='".$token."'";
            // echo $sql;
            $query = $this->query($sql);
            $result = $query->num_rows;
            return $result;
        }
        public function updateToken($user_id=0,$token=''){
            $this->query("UPDATE gs_member SET token='".$token."' WHERE id='".$user_id."'");
        }
        public function updateOnline($user_id=0){
            $this->query("UPDATE gs_member SET last_online='".date('Y-m-d H:i:s')."' WHERE id='".$user_id."'");
        }
        public function getHistoryView($id_user=0){
            $result = array();
            $sql = "SELECT * FROM gs_member_view LEFT JOIN gs_content_sub ON gs_content_sub.id = gs_member_view.id_content WHERE gs_member_view.`id_user`='".(int)$id_user."'";
            $query = $this->query($sql);
            $result = $query->rows;
            return $result;
        }
        public function addContentView($id_user=0,$id_content=0){
            $date_now = date('Y-m-d H:i:s');
            $check = "SELECT * FROM gs_member_view WHERE `id_user`='".$id_user."' AND `id_content`='".$id_content."'";
            $result_check = $this->query($check);
            if($result_check->num_rows){
                $this->query("UPDATE gs_member_view SET  `date_last_view` = '".$date_now."' 
                    WHERE id_user = '".(int)$id_user."' AND id_content = '".(int)$id_content."'");
            }else{
                $this->query("INSERT INTO gs_member_view (`id_user`,`id_content`,`date_create`,`date_last_view`) 
                VALUES ('".(int)$id_user."','".(int)$id_content."','".$date_now."','".$date_now."')");
            }
        }
        public function insertPackage($id_user=0,$id_package=0,$id_content=0){
            $result = array();
            $query = $this->query("SELECT * FROM gs_package WHERE id='".(int)$id_package."'"); 
            if($query->num_rows){
                $days = $query->row['days'];
                $unit = $query->row['unit'];
                if($days > 0){
                    $Date1 = date('Y-m-d');
                    $date = new DateTime($Date1);
                    $date->add(new DateInterval('P'.(int)$days.'D')); // P1D means a period of 1 day
                    $Date2 = $date->format('Y-m-d');
                    $date_expired = $Date2." ".date('H:i:s');
                }else{
                    $Date1 = date('Y-m-d');
                    $query_content = $this->query("SELECT * FROM gs_content_sub WHERE id='".(int)$id_content."'"); 
                    if($query_content->num_rows){
                        if(!empty($query_content->row['date_start'])){
                            $Date1 = $query_content->row['date_start'];
                        }
                    }
                    
                    $date = new DateTime($Date1);
                    $date->add(new DateInterval('P1D')); // P1D means a period of 1 day
                    $Date2 = $date->format('Y-m-d');
                    $date_expired = $Date2." ".date('H:i:s');
                }
                $insert = array(
                    'id_user'       => $id_user,
                    'id_package'    => $id_package,
                    'id_content'    => $id_content,
                    'date_create'   => date('Y-m-d H:i:s'),
                    'date_expired'  => $date_expired
                );
                $this->insert('member_history',$insert);
            }
            return $result;

            // $query = $this->query("SELECT * FROM gs_callback WHERE user_id ='".$id_user."' AND package_id='".$package_id."'"); 
            // return $query->rows;
        }
        public function checkPayment($id_user=0,$package_id){
            $query = $this->query("SELECT * FROM gs_callback WHERE user_id ='".$id_user."' AND package_id='".$package_id."'"); 
            return $query->rows;
        }
        public function getHistory($id_user=0){
            $sql  ="SELECT *,
            gs_package.title AS package_title,
            gs_content_sub.title AS content_title, 
            gs_member_history.date_create AS date_create
            FROM gs_member_history 
                LEFT JOIN gs_package ON gs_member_history.id_package = gs_package.id 
                LEFT JOIN gs_content_sub ON gs_content_sub.id = gs_member_history.id_content 
                WHERE gs_member_history.id_user ='".(int)$id_user."'";
            // echo $sql;exit();
            $query = $this->query($sql); 
            return $query->rows;
        }
        public function getContent(){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE del<>1"); 
            return $query->rows;
        }
        public function getContentMain($id=0){
            $query = $this->query("SELECT * FROM gs_content WHERE id='".(int)$id."'"); 
            return $query->row;
        }
        public function getContentSub($id_content=0){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id = ".(int)$id_content." AND MONTH(date_start) = MONTH(NOW()) AND DAY(date_start) = DAY(NOW()) "); 
            return $query->row;
        }
        // therdthai
        public function getDetailContentSub($id=0){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id='".(int)$id."'"); 
            return $query->rows;
        }
        public function getListContentSub(){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE MONTH(date_start) >= MONTH(NOW()) AND DAY(date_start) >= DAY(NOW())  GROUP BY id_content ORDER BY gs_content_sub.id DESC"); 
            return $query->rows;
        }
        public function getAllListContentSub(){
            $query = $this->query("SELECT * FROM gs_content_sub ORDER BY gs_content_sub.id DESC"); 
            return $query->rows;
        }
        public function getContentSubView($id=0){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id_content = 6 AND id = '".(int)$id."' AND MONTH(date_start) >= MONTH(NOW()) AND DAY(date_start) >= DAY(NOW()) "); 
            return $query->row;
        }
        public function getListContentSubImage($id_content_sub=0){
            $query = $this->query("SELECT * FROM gs_content_sub_images WHERE id_content_sub = '".(int)$id_content_sub."'"); 
            return $query->rows;
        }
        public function getContentSubDetail($id_content=0){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id = ".(int)$id_content); 
            return $query->row;
        }
		public function getPackage(){
            $query = $this->query("SELECT * FROM gs_package"); 
            return $query->rows;
        }
        public function getKai(){
            $query = $this->query("SELECT * FROM gs_content WHERE id_category = 2"); 
            return $query->rows;
        }
        public function getMuay(){
            $query = $this->query("SELECT * FROM gs_content WHERE id_category = 1 ORDER BY `sort` ASC"); 
            return $query->rows;
        }
        public function blogs(){
            $query = $this->query("SELECT * FROM gs_news WHERE del <> 1 ORDER BY id DESC LIMIT 0,8"); 
            return $query->rows;
        }
        public function blogDetail($id){
            $query = $this->query("SELECT * FROM gs_news WHERE id = ".(int)$id.""); 
            return $query->row;
        }
        public function muayDetail($id){
            $query = $this->query("SELECT * FROM gs_content WHERE id = ".(int)$id); 
            return $query->row;
        }
        public function getMuaySub($id){
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id_content = ".(int)$id." AND del<>1 ORDER BY id DESC LIMIT 0,5"); 
            return $query->rows;
        }
        public function getMuaySubDetail($id){
            $result = array();
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id = ".(int)$id." AND del<>1"); 
            if($query->num_rows){
                $result = $query->row;
            }
            return $result;
        }
        public function getMuaySubDetailNow($id){
            $result = array();
            $query = $this->query("SELECT * FROM gs_content_sub WHERE id = ".(int)$id." AND del<>1  AND MONTH(date_start) = MONTH(NOW()) AND DAY(date_start) = DAY(NOW())"); 
            if($query->num_rows){
                $result = $query->row;
            }
            return $result;
        }
        public function getPackageDetail($id){
            $query = $this->query("SELECT * FROM gs_package WHERE id = ".(int)$id); 
            return $query->row;
        }
        public function checkActiveVIP($id=0){
            $result = array();
            $sql = "SELECT * FROM gs_member_history 
            LEFT JOIN gs_package ON gs_member_history.id_package = gs_package.id 
            WHERE id_user = '".(int)$id."' AND date_expired >= '".date('Y-m-d H:i:s')."'";
            $query = $this->query($sql);
            $sum_day = 0;
            $sum_unit = 0;
            $id_content = array();
            if($query->num_rows){
                foreach($query->rows as $val){
                    $sum_day += (int)$query->row['days'];
                    $sum_unit += (int)$query->row['unit'];
                    $id_content[] = $query->row['id_content'];

                    $result['data'] = array(
                        'days' => $query->row['days'],
                        'unit' => $query->row['unit'],
                        'id_content' => $query->row['id_content'],
                    );
                }
                $result['days'] = $sum_day;
                $result['unit'] = $sum_unit;
                $result['id_content'] = $id_content;
            }
            return $result;
        }
        public function insertMember($data=array()){
            $result = '';
            $username = (isset($data['username'])?$data['username']:'');
            $password = (isset($data['password'])?$data['password']:'');
            $ref = (isset($data['ref'])?$data['ref']:'');

            $username = $this->escape($username);
            $sql_member     = "SELECT * FROM gs_member WHERE username = '".$username."'";
            $result_member  = $this->query($sql_member);
            if($result_member->num_rows == 0){
                if($ref){
                   
                    $sql_ref     = "SELECT * FROM gs_member WHERE username = '".$ref."'";
                    $result_ref  = $this->query($sql_ref);
                    if($result_ref->num_rows){
                        // var_dump($result_ref->row['id']);exit();
                        $result_check_vip = $this->checkActiveVIP($result_ref->row['id']);
                        
                        if($result_check_vip['data']['days']>0){
                            $ref_id = $result_ref->row['id'];
                        }
                        // var_dump($ref_id);exit();
                    }
                    
                }
                $insert = array(
                    'username'      => $username,
                    'password'      => $password,
                    'date_create'   => date('Y-m-d H:i:s'),
                    'ref_id'        => $ref_id
                );
                $result = $this->insert("member",$insert); 
            }else{
                $result = false;
            }
            return $result;
        }
        public function selectMember($data=array()){
            $result = '';
            $username = (isset($data['username'])?$data['username']:'');
            $password = (isset($data['password'])?$data['password']:'');
            $username = $this->escape($username);
            $sql_member     = "SELECT * FROM gs_member WHERE username = '".$username."' AND password = '".$password."' and del=0";
            $result_member  = $this->query($sql_member);
            return $result_member->row;
        }
        public function checkActive($id=0){
            $result = array(
                'days'  => 0,
                'unit'  => 0,
                'id_content'    => array()
            );
            $sql = "SELECT * FROM gs_member_history 
            LEFT JOIN gs_package ON gs_member_history.id_package = gs_package.id 
            WHERE gs_member_history.id_user = '".(int)$id."' AND date_expired >= '".date('Y-m-d H:i:s')."'";
            // echo $sql;exit();
            $query = $this->query($sql);
            $sum_day = 0;
            $sum_unit = 0;
            $id_content = array();
            $id_package = array();
            if($query->num_rows){
                foreach($query->rows as $val){
                    $sum_day += (int)$val['days'];
                    $sum_unit += (int)$val['unit'];
                    $id_content[] = $val['id_content'];
                    $id_package[] = $val['id_package'];

                    $result['data'][] = array(
                        'days' => $val['days'],
                        'unit' => $val['unit'],
                        'id_content' => $val['id_content'],
                        'id_package'    => $val['id_package']
                    );
                }
                $result['days'] = $sum_day;
                $result['unit'] = $sum_unit;
                $result['id_content'] = $id_content;
                $result['id_package'] = $id_package;

            }
            // $result['sql'] = $sql;
            return $result;
        }

        public function getListBanner(){
            // OR gs_news.id = 99
            $sql = "SELECT *,
            gs_content_sub.id AS id,
            gs_news.id AS news_id,
            gs_news.detail AS detail,
            gs_news.cover AS cover,
            gs_news.title AS title,
            gs_news.date_create AS date_create 
            FROM gs_news 
            LEFT JOIN gs_content_sub ON gs_news.ref_content_sub_id = gs_content_sub.id 
            WHERE 
            (gs_news.`show` = '1' AND gs_content_sub.date_start >= NOW() - INTERVAL 1 DAY AND gs_content_sub.del <>1) AND gs_news.del<>1
            ORDER BY gs_content_sub.date_start DESC  ";
            $query = $this->query($sql); 
            // if($query->num_rows == 0){
            //     // WHERE gs_news.id = 99 
            //      $sql = "SELECT *,
            //         gs_news.id AS id,
            //         gs_news.detail AS detail,
            //         gs_news.cover AS cover,
            //         gs_news.title AS title 
            //         FROM gs_news 
            //         LEFT JOIN gs_content_sub ON gs_news.ref_content_sub_id = gs_content_sub.id 
            //         WHERE gs_news.id = 205  
            //         ORDER BY gs_content_sub.id ASC  ";
            //         //OR gs_news.id = 48 
            //     $query = $this->query($sql); 
            // }
            // echo "<pre>";var_dump($query->rows);exit();
            return $query->rows;
        }
        public function getNearEvent(){
            $sql = "SELECT * FROM gs_content_sub WHERE date_start >= '".date('Y-m-d')."' AND del<>1 ORDER BY date_start ASC LIMIT 0,1";
            // echo $sql;exit();
            $query = $this->query($sql); 
            return $query->row;
        }
	}
?>