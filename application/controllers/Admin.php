<?php 
	Class Admin extends CI_Controller {
		public function home(){

			$data['title'] = 'Overview';
			$data['count'] = $this->login_model->get_count_users(); 
			$data['count_items'] = $this->items_model->get_items_count();
			$data['count_items_cart'] = $this->items_model->get_items_cart_count();
			$data['count_items_sold'] = $this->items_model->get_items_sold();

			$this->load->view("templates/admin_header");
			$this->load->view("admin/home", $data);
			$this->load->view("templates/admin_footer");

		}

		public function sold_items(){
			$data['title'] = 'Sold Items';
			$data['solds'] = $this->items_model->get_item_sold_db();
			$data['total_price_sold'] = $this->items_model->get_item_price();

			$this->load->view("templates/admin_header");
			$this->load->view("admin/sold", $data);
			$this->load->view("templates/admin_footer");

		}
	} 
?>