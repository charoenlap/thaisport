<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
	    	$data['package'] = $this->model('master')->getPackage();
	    	$data['kai'] = $this->model('master')->getKai();
	    	$data['muay'] = $this->model('master')->getMuay();
	    	$data['username'] = $this->getSession('username');
	    	$data['route'] = get('route');
	    	$data['id'] = get('id');
	    	$this->render('common/header',$data);
	    }
	    public function footer($data=array()){
	    	$this->render('common/footer',$data);
	    }
	}
?>