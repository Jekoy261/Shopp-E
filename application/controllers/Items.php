<?php
	class Items extends CI_Controller {
		public function index() {
			$data['title'] = 'Items';
			$data1['profile'] = $this->login_model->get_user_profile_h();
			$data['items'] = $this->items_model->get_items();
			$data['categories'] = $this->items_model->get_categories();

			$this->load->view('templates/header', $data1);
			$this->load->view('items/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL) { 
			$data['items'] = $this->items_model->get_items($slug);

			if (empty($data['items'])) {
				show_404();
			}

			$data['title'] = $data['items']['item_name'];
			$data1['profile'] = $this->login_model->get_user_profile_h();

			$this->load->view('templates/header', $data1);
			$this->load->view('items/view', $data);
			$this->load->view('templates/footer');
		}

		public function add_item() {
			$data['title'] = 'Add Item'; 
			$data['success'] = '';

			$data['categories'] = $this->items_model->get_categories();

			$this->form_validation->set_rules('item_name', 'Item Name', 'required');
			$this->form_validation->set_rules('item_description', 'Item Description', 'required');
			$this->form_validation->set_rules('category_id', 'Category', 'required');
			$this->form_validation->set_rules('item_quantity', 'Quantity', 'required');
			$this->form_validation->set_rules('item_price', 'Price', 'required');

			if ($this->form_validation->run() === FALSE) { 

				$data['items'] = $this->items_model->get_items();
				$this->load->view('templates/admin_header');
				$this->load->view('items/add_item', $data);
				$this->load->view('templates/admin_footer');
			} else {

				$config['upload_path'] = './assets/images/items';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '500';
				$config['max_height'] = '500';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()) {
					$error = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->items_model->create_item($post_image);
				redirect('items/add_item');
			}	
		}

		public function del2(){
			$u = $this->uri->segment(3);
			$this->items_model->del2($u);
			redirect('items/add_item');
		} 

		public function add_to_cart(){
			$data['title'] = 'Items';
			$data['items'] = $this->items_model->get_items();

			$this->items_model->add_single_item();
			$data1['profile'] = $this->login_model->get_user_profile_h();

			$this->load->view('templates/header', $data1);
			$this->load->view('items/index', $data);
			$this->load->view('templates/footer');
		}

		public function my_cart(){
			$data['title'] = 'My Cart';
			$data['data_success'] = '';

			$data['items'] = $this->items_model->select_my_cart();
			$data['sum'] = $this->items_model->get_price();
			$data1['profile'] = $this->login_model->get_user_profile_h();

			$this->load->view('templates/header', $data1);
			$this->load->view('pages/my_cart',$data);
			$this->load->view('templates/footer');

		}

		public function pay_this(){
			$data['title'] = 'Pay This Item';
			$cart_id = $this->input->get('cart_id');
			$data['cart_item'] = $this->items_model->get_cart_by_id($cart_id);

			$data1['profile'] = $this->login_model->get_user_profile_h();
			$this->load->view('templates/header', $data1);
			$this->load->view('pages/pay_this',$data);
			$this->load->view('templates/footer');
		}

		//try_this
		public function pay_only_this(){

			$cart_id = $this->input->post('cart_id');	
			$item_id = $this->input->post('item_id');
			$item_quantity = $this->input->post('item_quantity');
			$item_price = $this->input->post('item_price');
			$money = $this->input->post('money');

				if($item_price == $money){

					$this->items_model->sold();
					$data['title'] = 'My Cart';
					$data['data_success'] = '<div class="text-success">Successful! Thankyou..</div>';
					$data['items'] = $this->items_model->select_my_cart();
					$data['sum'] = $this->items_model->get_price();
					$data1['profile'] = $this->login_model->get_user_profile_h();

					$this->load->view('templates/header', $data1);
					$this->load->view('pages/my_cart',$data);
					$this->load->view('templates/footer');

				} else {

					$data['title'] = 'My Cart';
					$data['data_success'] = '<div class="text-danger">Failed! </div>';
					
					$data['items'] = $this->items_model->select_my_cart();
					$data['sum'] = $this->items_model->get_price();
					$data1['profile'] = $this->login_model->get_user_profile_h();

					$this->load->view('templates/header', $data1);
					$this->load->view('pages/my_cart',$data);
					$this->load->view('templates/footer');
				}
		}

		public function edit_item($slug){
			$data['item'] = $this->items_model->get_items($slug);
			$data['categories'] = $this->items_model->get_categories();

			if (empty($data['item'])){
				show_404();
			}

			$data['title'] = 'Edit Item'; 

			$this->load->view('templates/admin_header');
			$this->load->view('items/edit_item', $data);
			$this->load->view('templates/admin_footer');
		}

		public function update_item(){
			$data['title'] = 'Add Item'; 
			$data['success'] = 'Item Updated Successfully!';
			$data['items'] = $this->items_model->get_items();
			$this->items_model->update_item();
			
			$this->load->view('templates/admin_header');
			$this->load->view('items/add_item', $data);
			$this->load->view('templates/admin_footer');
		}

		public function delete(){

			$this->load->model('Items_model');
			$id = $this->input->get('item_id');
			
			if ($this->Items_model->delete_item($id)){
				$data['title'] = 'Add Item'; 
				$data['success'] = '';
				
				$data['items'] = $this->items_model->get_items();
				$data['categories'] = $this->items_model->get_categories();
				$this->load->view('templates/admin_header');
				$this->load->view('items/add_item', $data);
				$this->load->view('templates/admin_footer');
			}

		}

		public function delete_in_cart(){
			$this->load->model('Items_model');
			$id = $this->input->get('cart_id');

			if ($this->Items_model->delete_item_cart($id)){
				$data['title'] = 'My Cart';

				$data['items'] = $this->items_model->select_my_cart();
				$data['sum'] = $this->items_model->get_price();
				$data1['profile'] = $this->login_model->get_user_profile_h();

				$this->load->view('templates/header', $data1);
				$this->load->view('pages/my_cart',$data);
				$this->load->view('templates/footer');
			}	
		}

		public function select_items_by_category(){

			$this->load->model('Items_model');
			$id = $this->input->get('category_id');

			$data['items'] = $this->Items_model->select_by_category();
			$data['title'] = 'By Category';

			$this->load->view('templates/header');
			$this->load->view('pages/by_category',$data);
			$this->load->view('templates/footer');
		}

		public function fetch(){
			$output = '';
			$query = '';

			$this->load->model('Items_model');
			if ($this->input->post('query')) {
				$query = $this->input->post('query');
			}
			$data = $this->Items_model->fetch_data($query);
		
			$output .= '
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th> Image </th>
						<th> Item Name </th>
						<th> Item Description </th>
						<th> Quantity </th>
						<th> Price </th>
						<th> Action </th>
					</tr>
			</div>
			';

			if ($data->num_rows() > 0) {
			
				foreach($data->result() as $row){
					$output .= '
							<tr>
								<td class="text-center"><img height="100" src="'.base_url().'assets/images/items/'.$row->post_image.'"</td>
								<td>'.$row->item_name.'</td>
								<td>'.$row->item_description.'</td>
								<td class="text-center">'.$row->item_quantity.'</td>
								<td>₱'.$row->item_price.'</td>
								<td class="text-center">
									<a class="btn btn-success text-white" href="'.base_url().'Items/edit_item/'.$row->item_slug.'"><span class="ni ni-settings"></span></a>

									<a class="btn btn-danger" name="delete" href="'.base_url().'Items/delete/?item_id='.$row->item_id.'"><span class="ni ni-fat-remove"></span></a>
								</td>	
							</tr>	
					';
				}

			} else {

				$output .= '<tr>
								<td colspan="6"> No Data Found </td>
							<tr>';
			}
			$output .='</table>';
			echo $output;
		}
	}
?>