<?php
	class Login_model extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_users($slug = FALSE){
			if ($slug == FALSE) {
				$this->db->order_by('user_id', 'DESC');
				$query = $this->db->get('users');
				return $query->result_array();
			}
 
			$query = $this->db->get_where('users', array('slug'=> $slug));
			return $query->row_array();
		}

		public function get_count_users(){
			//$sql1 = "SELECT sum(item_price) as total_cart from cart where user_id='$user_id'";
			$sql2 = "SELECT count(user_id) as total_user from users";
			$result = $this->db->query($sql2);
			return $result->row()->total_user;
		}

		//try_get_profile_pic
		public function get_user_profile_h(){
			$user_id = $this->session->userdata('user_id');
			$sql6 = "SELECT image as imageh from users where user_id='$user_id'";
			$result = $this->db->query($sql6);
			return $result->row()->imageh;
		}

		//user-session-info
		public function get_user_profile(){
			$user_id = $this->session->userdata('user_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function update_user_by_id($data,$id){
			$this->db->where('user_id',$id);
			$this->db->update('users',$data);
			return true;
		}

		//for single user only
		/**public function can_login($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('users');

			//select * from users where username = '$username' and password = '$password'

			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}**/

		public function create_user(){
			$slug = url_title($this->input->post('fname','lname'));
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'slug' => $slug,
				'mobile_number' => $this->input->post('mobile_number')

			);

			return $this->db->insert('users', $data);
		}

		public function login_get($username,$password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('users');

			if ($query->num_rows()==1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function save($user_id, $url){

			$this->db->where('user_id', $user_id);
			$this->db->set('image', $url);
			$this->db->update('users');

		}

		public function get_current_password($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('users');

			if ($query->num_rows() > 0) {
				return $query->row();
			}
		}

		public function update_password_g($new_password1, $user_id){

			$data = array(
				'password' => $new_password1
			);

			return $this->db->where('user_id', $user_id)
			->update('users', $data);
		}
	}
?>