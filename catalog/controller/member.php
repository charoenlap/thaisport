<?php 
	class MemberController extends Controller {
		public function agency(){
			$data = array();
			$id_user = (int)$this->getSession('id_user');
	    	if(!empty($id_user)){
		    	$data['title'] = "";
		    	$data['descreption']	= "";
		    	$data['username'] = $this->getSession('username');
		    	$data['agency'] = $this->model('master')->getAgency($id_user);
		    	$data['active'] = $this->model('master')->checkActiveVIP($id_user);
		    	$day = (isset($data['active']['days'])?$data['active']['days']:'');
		    	if($day>0){
		    		$data['status_active'] = "เป็นสมาชิก VIP";
		    		$data['status'] = "text-success";
		    	}else{
		    		$data['status_active'] = "ไม่สมาชิก VIP";
		    		$data['status'] = "text-danger";
		    	}
	 	    	$this->view('member/agency',$data); 
	 	    }else{
	    		redirect('member/login');
	    	}
		}
		public function historyPayment() {
	    	$data = array();
	    	$id_user = (int)$this->getSession('id_user');
	    	if(!empty($id_user)){
		    	$data['title'] = "";
		    	$data['descreption'] = "";
		    	$data['history'] = $this->model('master')->getHistory($id_user);
	 	    	$this->view('member/historyPayment',$data); 
	 	    }else{
	    		redirect('member/login');
	    	}
	    }
	    public function historyView() {
	    	$data = array();
	    	$id_user = (int)$this->getSession('id_user');
	    	// echo $id_user;exit();
	    	if(!empty($id_user)){
		    	$data['title'] = "";
		    	$data['descreption'] = "";
		    	$data['history'] = $this->model('master')->getHistoryView($id_user);
		    	// var_dump($data['history']);exit();
	 	    	$this->view('member/historyView',$data); 
	 	    }else{
	    		redirect('member/login');
	    	}
	    }
	    public function updateOnline(){
	    	$result = true;
	    	$id_user = $this->getSession('id_user');
	    	$this->model('master')->updateOnline($id_user);
	    	$token = $this->getSession('token');
	    	$result = $this->model('master')->checkToken($id_user,$token);
	    	$this->json($result);
	    }
	    public function contentView() {
	    	$id_content = (int)get('id_content');
	    	$id_user = $this->getSession('id_user');
	    	if($id_user){
		    	$result = $this->model('master')->checkActive($id_user);
		    	// var_dump($result);exit();
		    	// echo $id_user.' '.$id_content;exit();
		    	$data['detail_muay'] = $this->model('master')->getMuaySubDetailNow($id_content);
		    	$free = 0;
		    	if(isset($data['detail_muay'])){
		    		if(isset($data['detail_muay']['free'])) {
		    			$free = (int)$data['detail_muay']['free'];
		    		}
		    	}
		    	if($free==1){
		    		$date_content_start = $data['detail_muay']['date_start'];
		    		$date_content_start = date_create($date_content_start);
					$date_content_start = date_format($date_content_start,"Y-m-d");

					$user_detail = $this->model('master')->getUserDetail($id_user);
					// var_dump($user_detail);exit();
					$user_create = $user_detail['date_create'];
		    		$user_create = date_create($user_create);
					$user_create = date_format($user_create,"Y-m-d");


					// if($user_create == $date_content_start){
					if(true){	
						// echo "ok";
						$id_user = $this->getSession('id_user');
			    		$token = $this->getSession('token');
			    		$checkToken = $this->model('master')->checkToken($id_user,$token);

			    		if($checkToken){
					    	$data['title'] = "";
					    	$data['descreption'] = "";
					    	$data['id_content'] = $id_content = get('id_content');
					    	$result = $this->model('master')->getContentSub($id_content);

					    	$result_detail = $this->model('master')->getContentSubDetail($id_content);
					    	$this->model('master')->addContentView($id_user,$id_content);
					    	// var_dump($result);exit();

					    	$data['content'] = array(
					    		'url' => (isset($result['url'])?$result['url']:''),
					    		'title' => (isset($result_detail['title'])?$result_detail['title']:''),
					    		'detail' => (isset($result_detail['detail'])?$result_detail['detail']:''),
					    		'date_start' => (isset($result_detail['date_start'])?$result_detail['date_start']:''),
					    	);
					    	
				 	    	$this->view('member/contentView',$data); 
				 	    }else{
				 	    	redirect('member/login');
				 	    }
						exit();
		    		}else{
		    			$data = array();
				    	$active = 0;
				    	// echo "<pre>";
				    	// var_dump($result);exit();
				    	if($result['days']>0){
				    		$active = 1;
				    	}
				    	if($result['unit']>0){
				    		if(in_array($id_content,$result['id_content'])){
				    			$active = 1;
				    		}
				    	}
				    	// echo $active;exit();
				    	if($active == 1){
				    		$id_user = $this->getSession('id_user');
				    		$token = $this->getSession('token');
				    		$checkToken = $this->model('master')->checkToken($id_user,$token);
				    		// echo $checkToken;exit();
				    		if($checkToken){
						    	$data['title'] = "";
						    	$data['descreption'] = "";
						    	$data['id_content'] = $id_content = get('id_content');
						    	$result = $this->model('master')->getContentSub($id_content);

						    	$result_detail = $this->model('master')->getContentSubDetail($id_content);
						    	$this->model('master')->addContentView($id_user,$id_content);
						    	// var_dump($id_content);exit();

						    	$data['content'] = array(
						    		'url' => (isset($result['url'])?$result['url']:''),
						    		'title' => (isset($result_detail['title'])?$result_detail['title']:''),
						    		'detail' => (isset($result_detail['detail'])?$result_detail['detail']:''),
						    		'date_start' => (isset($result_detail['date_start'])?$result_detail['date_start']:''),
						    	);
						    	
					 	    	$this->view('member/contentView',$data); 
					 	    	exit();
					 	    }else{
					 	    	redirect('member/login');
					 	    }
				 	    }else{
				 	    	if($id_content){
				 	    		redirect('payment&id_package=2&id_content='.$id_content.'&result=active0');
				 	    	}else{
				 	    		redirect('payment&id_package=1');
				 	    	}
				 	    	
				 	    }
		    			// redirect('home&result=memberNotRegisterOndate');
		    		}
		    	}else{
			    	if(in_array(3,$result['id_package'])){
			    		if(in_array(2,$result['id_package'])){

			    		}else if(in_array(1,$result['id_package'])){

			    		}else{
			    			redirect('payment&id_package=2&id_content='.(int)$id_content.'&result=checkActive');
			    		}
			    	}

			    	if($result['days']==0 AND $result['unit']==0){
			    		if($id_content){
			    			redirect('payment&id_package=2&id_content='.(int)$id_content.'&result=checkActive');
			    		}else{
			    			redirect('payment&id_package=1');
			    		}
			    	}
			 	}
			 	
			 	$data = array();
		    	$active = 0;
		    	// var_dump($result);exit();

		    	// echo "<pre>";
	    		// var_dump($result);exit();


		    	if($result['days']>0){
		    		$active = 1;
		    	}
		    	if($result['unit']>0){
		    		if(in_array($id_content,$result['id_content'])){
		    			$active = 1;
		    		}
		    	}
		    	if($active == 1){
		    		$id_user = $this->getSession('id_user');
		    		$token = $this->getSession('token');
		    		$checkToken = $this->model('master')->checkToken($id_user,$token);

		    		if($checkToken){
				    	$data['title'] = "";
				    	$data['descreption'] = "";
				    	$data['id_content'] = $id_content = get('id_content');
				    	$result = $this->model('master')->getContentSub($id_content);

				    	$result_detail = $this->model('master')->getContentSubDetail($id_content);
				    	$this->model('master')->addContentView($id_user,$id_content);
				    	// var_dump($result);exit();

				    	$data['content'] = array(
				    		'url' => (isset($result['url'])?$result['url']:''),
				    		'title' => (isset($result_detail['title'])?$result_detail['title']:''),
				    		'detail' => (isset($result_detail['detail'])?$result_detail['detail']:''),
				    		'date_start' => (isset($result_detail['date_start'])?$result_detail['date_start']:''),
				    	);
				    	
			 	    	$this->view('member/contentView',$data); 
			 	    }else{
			 	    	redirect('member/login');
			 	    }
		 	    }else{
		 	    	if($id_content){
		 	    		redirect('payment&id_package=2&id_content='.$id_content.'&result=active0');
		 	    	}else{
		 	    		redirect('payment&id_package=1');
		 	    	}
		 	    	
		 	    }
		 	}else{
		 		$url="";
		 		if($id_content){
		 			$url .= "&id_content=".$id_content;
		 		}
		 		// exit();
		 		redirect('member/login'.$url);
		 	}
	    }
	    public function checkToken(){
	    	$id_user = $this->getSession('id_user');
    		$token = $this->getSession('token');
    		$checkToken = $this->model('master')->checkToken($id_user,$token);
    		echo $checkToken;
	    }
	    public function login() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] 	= "";
	    	$data['detail']   		= get('detail');
	    	$data['id_package']  	= get('id_package');
	    	$data['id_content']  	= get('id_content');
	    	$data['redirect']  	= get('redirect');
	    	$data['action'] = route('member/submitLogin');
	    	$data['result'] = get('result');
	    	require_once(DOCUMENT_ROOT_LINE.'LineLogin.php');
	    	$line = new LineLogin();
		    $data['link_line'] = $line->getLink();
		    // echo $data['link_line'];
		    // echo '<a href="', $link, '">Login</a>';

 	    	$this->view('member/login',$data); 
	    }
	    public function submitLogin() {
	    	$data = array();
	    	$result = "failed";
	    	$detail = "";
	    	if(method_post()){
	    		$phone 		= post('phone');
				$password 	= post('password');
				$redirect 	= post('redirect');
				// $id_package = post('id_package');
				$id_content = post('id_content');
				$para = '';
				if($id_package){
					$para .= "&id_package=".$id_package;
					$redirect .= $para;
				}
				if($id_content){
					$para .= "&id_content=".$id_content;
					$redirect .= $para;
				}
				$insert = array(
					'username' => $phone,
					'password' => md5($password)
				);
				$result_user = $this->model('master')->selectMember($insert);
				if($result_user){
					$this->setSession('id_user',$result_user['id']);
					$this->setSession('username',$result_user['username']);
					$token = encrypt(time());
					$this->setSession('token',$token);
					$this->model('master')->updateToken($result_user['id'],$token);
					if($redirect){
						redirect('home/live&id='.$id_content);
					}else{
						if($id_content){
							redirect('home/live&id='.$id_content);
						}else{
							redirect('home');
						}
					}
				}else{
					$detail = "หาไม่พบ";
					redirect('member/login&result='.$result.'&detail='.$detail."&redirect=".$redirect);
				}
	    	}
	    }
	    public function register() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$data['action'] = route('member/submitRegister');
	    	$data['redirect'] = get('redirect');
	    	$data['detail']   = get('detail');
	    	$data['ref'] =	$ref  = (get('ref')?decode(get('ref'),'lap'):'');
	    	// echo get('ref');
	    	// echo $ref.'<<';exit();
	    	if($ref){
	    		$this->setSession('ref',$data['ref']);
	    	}
 	    	$this->view('member/register',$data); 
	    }
	    public function logout() {
	    	$this->setSession('id_user','');
	    	$this->setSession('username','');
	    	$this->redirect('home');
	    }
	    public function submitRegister() {
	    	$data = array();
	    	$result = "failed";
	    	$detail = "";
	    	if(method_post()){
	    		$phone 		= post('phone');
				$password 	= post('password');
				$cPassword 	= post('cPassword');
				$redirect 	= post('redirect');
				$ref = '';
				if(!empty($password)){
					if($password == $cPassword){
						// echo $ref;exit();
						$ref = $this->getSession('ref');
						// echo $ref;exit();
						$result_ref = $this->model('master')->getMemberID(array('username'=>$ref));
						$insert = array(
							'username' 	=> $phone,
							'password' 	=> md5($password),
							'ref'		=> $result_ref['id']
						);
						$result_user = $this->model('master')->insertMember($insert);
						if($result_user){
							if($redirect){
								redirect($redirect);
							}else{
								$this->setSession('id_user',$result_user);
								$this->setSession('username',$phone);
								redirect('home');
							}
						}else{
							$detail = "มีในระบบแล้ว";
							redirect('member/register&result='.$result.'&detail='.$detail);
						}
					}else{
						$detail = "รหัสผ่านไม่ตรงกัน";
						redirect('member/register&result='.$result.'&detail='.$detail);
					}
				}else{
					$detail = "รหัสผ่านมีค่าว่าง";
					redirect('member/register&result='.$result.'&detail='.$detail);
				}
	    	}
	    }
	    public function forgot() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('member/forgot',$data); 
	    }
	    public function loginLine(){
	    	require_once(DOCUMENT_ROOT_LINE.'LineLogin.php');
	    	$line = new LineLogin();
		    $link = $line->getLink();
		    echo '<a href="', $link, '">Login</a>';
	    }

	    public function logoutLine(){
			require_once(DOCUMENT_ROOT_LINE.'LineLogin.php');

			if (isset($_SESSION['profile'])) {
			    $profile = $_SESSION['profile'];
			    $line = new LineLogin();
			    $line->revoke($profile->access_token);
			    session_destroy();
			}

	    }
	    public function callback(){
	    	// var_dump($_SESSION);
	    	require_once(DOCUMENT_ROOT_LINE.'LineLogin.php');

			$line = new LineLogin();
			$get = $_GET;

			$code = $get['code'];
			$state = $get['state'];
			$token = $line->token($code, $state);

			if (property_exists($token, 'error'))
			    header('location: index.php');

			if ($token->id_token) {
			    $profile = $line->profileFormIdToken($token);
			    $_SESSION['profile'] = $profile;
			    // header('location: index.php');
			}
			// var_dump($_SESSION);exit();
			$data = array();
	    	$result = "failed";

	    	$email 		= $_SESSION['profile']->email;
	    	if($email){
	    		$phone 		= $email;
				$password 	= 'thaisport1234';

				$insert = array(
					'username' => $phone,
					'password' => md5($password)
				);
				$result_user = $this->model('master')->selectMember($insert);
				if($result_user){
					$this->setSession('id_user',$result_user['id']);
					$this->setSession('username',$result_user['username']);
					$token = encrypt(time());
					$this->setSession('token',$token);
					$this->model('master')->updateToken($result_user['id'],$token);
					redirect('home');
				}else{
					$insert = array(
						'username' 	=> $phone,
						'password' 	=> md5($password)
					);
					$result_user = $this->model('master')->insertMember($insert);
					if($result_user){
						$this->setSession('id_user',$result_user);
						$this->setSession('username',$phone);
						redirect('home');
					}
				}
	    	}else{
	    		redirect('member/login&result=ไม่สามารถสมัครได้เนื่องจากไม่มี Email');
	    	}
	    }
	}
?>