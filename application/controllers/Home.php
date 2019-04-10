<?php 
	Class Home extends CI_Controller {
		public function index($page = 'home'){

			if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$data1['profile'] = $this->login_model->get_user_profile_h();
			$data['title'] = ucfirst($page);
			$data['items'] = $this->items_model->get_items();

			$this->load->view("templates/header", $data1);
			$this->load->view("pages/".$page, $data);
			$this->load->view("templates/footer");

		}
	} 
?>