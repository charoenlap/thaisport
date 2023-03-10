<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
	    	// $data['package'] = $this->model('master')->getPackage();
	    	// $data['kai'] = $this->model('master')->getKai();
	    	// $data['muay'] = $this->model('master')->getMuay();
	    	// var_dump($_SESSION);
	    	$data['username'] = $this->getSession('username');
	    	$data['route'] = get('route');
	    	$data['id'] = get('id');
			$banners = $this->model('master')->getListBannerNow();
			$data['link_live'] = '';
			if($banners->num_rows>1){
				$data['link_live'] = route('home/live&id='.$banners->row['id']); 
			}else{
				$data['link_live'] = route('home/live&id='.$banners->row['id']); 
			}
	    	$this->render('common/header',$data);
	    }
	    public function footer($data=array()){
	    	$this->render('common/footer',$data);
	    }
	}
?>