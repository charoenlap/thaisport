<?php 
	class HomeController extends Controller {
		public function index() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$data['blogs'] = $this->model('master')->blogs();
	    	$banners = $this->model('master')->getListBanner();

	    	foreach($banners as $val){
		    	$images = $this->model('master')->getListContentSubImage($val['ref_content_sub_id']);
				$data['banners'][] = array(
					'id' 		=> $val['id'],
					'title' 	=> $val['title'],
					'detail'	=> mb_strimwidth($val['detail'], 0, 100, "..."),
					'banner'	=> $val['banner'],
					'cover'		=> $val['cover'],
					'ref_content_sub_id'		=> $val['ref_content_sub_id'],
					'images'	=> $images
				);
			}
	    	$data['event'] = $this->model('master')->getNearEvent();
	    	$data['highlight'] = array();//$this->model('master')->getHighlight(" limit 0,3");
 	    	$this->view('home',$data); 
	    }
	    public function highlight() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	
	    	$data['highlight'] = array();//$this->model('master')->getHighlight();
 	    	$this->view('highlight',$data); 
	    }
	    public function live() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	
	    	// $data['live'] = array();//$this->model('master')->getHighlight();
 	    	$this->view('live',$data); 
	    }
	    public function timeline() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	
	    	// $data['timeline'] = array();//$this->model('master')->getHighlight();
 	    	$this->view('timeline',$data); 
	    }
	    public function page() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$id = (int)get('id');
	    	$result = $this->model('master')->muayDetail($id);
	    	$data['title'] 	= $result['title'];
	    	$data['detail'] = $result['detail'];
	    	$data['cover'] 	= $result['cover'];
	    	$data['banner'] 	= $result['banner'];
	    	$data['muay'] = $this->model('master')->getMuay();
	    	$data['muays'] = $this->model('master')->getMuaySub($id);
 	    	$this->view('page',$data); 
	    }
	    public function pageDetail() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$id = get('id');
	    	$data['detail'] = $this->model('master')->getMuaySubDetail($id);
 	    	$this->view('pageDetail',$data); 
	    }
	    public function blog() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$data['blogs'] = $this->model('master')->blogs();
 	    	$this->view('blog',$data); 
	    }
	    public function blogDetail() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$id = get('id');
	    	$data['blog'] = $this->model('master')->blogDetail($id);
	    	$data['images'] = $this->model('master')->getListContentSubImage($data['blog']['ref_content_sub_id']);
 	    	$this->view('blogDetail',$data); 
	    }
	    public function terms() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('terms',$data); 
	    }
	    public function privacy() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('privacy',$data); 
	    }
	    public function contact() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('contact',$data); 
	    }
	    public function package() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
	    	$id_package = (int)get('id_package');
	    	$data['id_package'] = (int)get('id_package');
	    	$data['detail'] = $this->model('master')->getPackageDetail($id_package);
 	    	$this->view('package',$data); 
	    }
	    public function about() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('about',$data); 
	    }
	    public function calendar() {
	    	$data = array();
	    	$data['title'] = "";
	    	$data['descreption'] = "";
 	    	$this->view('calendar',$data); 
	    }
	}
?>