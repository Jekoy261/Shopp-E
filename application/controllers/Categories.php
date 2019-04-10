<?php
	class Categories extends CI_Controller {
		public function index() {
			$data['title'] = 'Categories';

			$data['categories'] = $this->category_model->get_categories();
			$data1['profile'] = $this->login_model->get_user_profile_h();
			$this->load->view('templates/header', $data1);
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');			
		}

		public function create(){
			$data['title'] = 'Create category';
			$data['categories'] = $this->category_model->get_categories();

			$this->form_validation->set_rules('category_name', 'Category Name', 'required');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/admin_header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/admin_footer');
			} else {

				if ($this->input->post('update')) {
					$this->category_model->update_data($data, $this->input->post('hidden_id'));
					redirect(base_url(). 'categories/updated');
				}

				if ($this->input->post('insert')) {	
					$this->category_model->create_category();
					redirect('categories/create');	
				}
			}
		}

		public function del(){
			$u = $this->uri->segment(3);
			$this->category_model->del($u);
			redirect('categories/create');
		} 

		public function update_data(){
			$data['title'] = 'Edit Category';
			$category_id = $this->uri->segment(3);
			
			$this->load->model('category_model');
			$data['categories_data'] = $this->category_model->fetch_single_data($category_id);
			$data['categories'] = $this->category_model->get_categories();
			
			$this->load->view('templates/admin_header');
			$this->load->view('categories/create', $data);	
			$this->load->view('templates/admin_footer');
		}

		public function updated(){
			$this->load->model('category_model');
			$data['fetch_data'] = $this->category_model->get_categories();
			$this->load->view('create', $data);
		}
	}
?>