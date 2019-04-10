<?php
	class Login extends CI_Controller {
		function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('Login_model');
			$this->load->library('session');
		}

		//index_page
		public function index(){
			$this->load->view('login/index');
			$this->load->view('templates/footer');	
		}

		//login_function
		public function login_process(){
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$checklogin = $this->Login_model->login_get($username,$password);

			if ($checklogin) {
			 	 
				foreach($checklogin as $row);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('user_id', $row->user_id);
				$this->session->set_userdata('image', $row->image);
				$this->session->set_userdata('level', $row->level);

				if ($this->session->userdata('level')=="1") {
					//admin
					$data['title'] = 'Overview';
					$data['count'] = $this->login_model->get_count_users();
					$data['count_items'] = $this->items_model->get_items_count();
					$data['count_items_cart'] = $this->items_model->get_items_cart_count();
					$data['count_items_sold'] = $this->items_model->get_items_sold();

					$this->load->view('templates/admin_header');
					$this->load->view('admin/home', $data);
					$this->load->view('templates/admin_footer');
					
				} elseif ($this->session->userdata('level')=="2"){
					//user
					$data['title'] = 'Home';
					$data1['profile'] = $this->login_model->get_user_profile_h();

					$this->load->view('templates/header', $data1);
					$this->load->view('home', $data);
					$this->load->view('templates/footer');
				}

			} else {
				$data['data_error'] = "Username or Password is Incorrect! Try Again.";
				$this->load->view('login/index', $data);
			}
		}

		//One user Only
		/**public function login_validation(){
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			 	if ($this->form_validation->run()) {
					//true
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					//
					$this->load->model('login_model');

						if ($this->login_model->can_login($username, $password)) {
							
							$session_data = array(
								'username' => $username
							);

							$this->session->set_userdata($session_data);
							redirect(base_url());

						} else {

							$this->session->set_flashdata('error', 'Invalid Username or Password.');
							redirect(base_url(). 'login/index');
						}

				} else {

					//false 
					$this->index();
				}
		}**/

		//
		public function enter(){
			if ($this->session->userdata('username') != '') {
				
				echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
				echo '<label><a href="'.base_url().'login/logout"> Logout </a></label>';

			} else {

				redirect(base_url().'login/index');

			}
		}

		//logout_user
		public function logout(){

			$this->session->unset_userdata('username');
			redirect(base_url(). 'login/index');
		}

		//register_user
		public function create_user(){
			
			$this->form_validation->set_rules('fname', 'First Name', 'required');
			$this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email Address', 'required');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['data_success'] = "";
				
				$this->load->view('login/register', $data);
				$this->load->view('templates/footer');
			
			} else {

				$data['data_success'] = "Successful! Account Created.";

				$this->login_model->create_user();
				$this->load->view('login/register', $data);

			}
		}

		//view_profile_data
		public function view_profile(){
			$data['data_success'] = "";
			//$data['profile_pic'] = ;
			$data['users'] = $this->login_model->get_user_profile();
			$data1['profile'] = $this->login_model->get_user_profile_h();

			$this->load->view('templates/header', $data1);
			$this->load->view('pages/profile', $data);
			$this->load->view('templates/footer');
		}

		//save_database	
		public function save_picture(){
			$url = $this->do_upload();
			$user_id = $_POST['user_id'];
			$this->login_model->save($user_id, $url);

			$data['data_success'] = "Profile Picture Updated.";
			$data['users'] = $this->login_model->get_user_profile();
			$data1['profile'] = $this->login_model->get_user_profile_h();

			$this->load->view('templates/header', $data1);
			$this->load->view('pages/profile',$data);
			$this->load->view('templates/footer');

		}
		//save_in_folder
		private function do_upload(){

			$type = explode('.', $_FILES['pic']['name']);
			$type = $type[count($type)-1];
			$url = './assets/images/profile/'.uniqid(rand()).'.'.$type;

			if(in_array($type, array('jpg', 'jpeg','gif','png')))
				if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
					if(move_uploaded_file($_FILES['pic']['tmp_name'], $url))
						return $url;
			return "";	
			}
		}

		//update_profile
		public function update_profile(){

			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$username = $this->input->post('username');
			$mobile_number = $this->input->post('mobile_number');
			$user_id = $this->input->post('user_id');

			$data = array('fname'=>$fname,'lname'=>$lname,'username'=>$username,'mobile_number'=>$mobile_number);

			if ($this->login_model->update_user_by_id($data,$user_id)) {
				
				$data['data_success'] = "Successful. Account Updated. ";
				$data['users'] = $this->login_model->get_user_profile();
				$data1['profile'] = $this->login_model->get_user_profile_h();

				$this->load->view('templates/header', $data1);
				$this->load->view('pages/profile',$data);
				$this->load->view('templates/footer');

			}	
				
		}

		public function change_password(){
			$data['data_error'] = '';
			$data1['profile'] = $this->login_model->get_user_profile_h();

			$this->load->view('templates/header', $data1);
			$this->load->view('pages/change_password', $data);
			$this->load->view('templates/footer');
		}

		public function update_password(){
			$data['data_error'] = '';
			$this->form_validation->set_rules('password', 'Password' , 'required');
			$this->form_validation->set_rules('new_password', 'New Password' , 'required|min_length[6]');
			$this->form_validation->set_rules('retype_password', 'Retype Password' , 'required');

			if ($this->form_validation->run()) {
				
				$data1['profile'] = $this->login_model->get_user_profile_h();
				$password1 = $this->input->post('password');
				$new_password1 = $this->input->post('new_password');
				$retype_password1 = $this->input->post('retype_password');
				
				$user_id = $this->session->userdata('user_id');
				$pw = $this->Login_model->get_current_password($user_id);

				if($pw->password == $password1){

					if($new_password1 == $retype_password1){

						if($this->Login_model->update_password_g($new_password1, $user_id)){

							$data['data_error'] = "<i class='text-success'>Password Updated Successfully!</i>";

							$this->load->view('templates/header', $data1);
							$this->load->view('pages/change_password', $data);
							$this->load->view('templates/footer');

						} else {

							$data['data_error'] = "<i class='text-danger'>Sorry! Failed to Update Password.</i>";

							$this->load->view('templates/header', $data1);
							$this->load->view('pages/change_password', $data);
							$this->load->view('templates/footer');
						}

					} else {

						$data['data_error'] = "<i class='text-danger'>New Password & Confirm Password is not Match.</i>";

						$this->load->view('templates/header', $data1);
						$this->load->view('pages/change_password', $data);
						$this->load->view('templates/footer');
					}

				} else {

					$data['data_error'] = "<i class='text-danger'>Sorry! Current Password is not Match.</i>";
					
					$this->load->view('templates/header', $data1);
					$this->load->view('pages/change_password', $data);
					$this->load->view('templates/footer');
				}
			} else {

				$data1['profile'] = $this->login_model->get_user_profile_h();

				$this->load->view('templates/header', $data1);
				$this->load->view('pages/change_password', $data);
				$this->load->view('templates/footer');
			}

		}

	}
?>	