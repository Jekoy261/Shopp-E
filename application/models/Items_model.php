<?php 
	class Items_model extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_items($slug = FALSE){
			if ($slug == FALSE) {
				$this->db->order_by('items.item_id', 'DESC');
				$this->db->join('categories', 'categories.category_id = items.category_id');
				$query = $this->db->get('items');
				return $query->result_array();
			}

			$query = $this->db->get_where('items', array('item_slug' => $slug));
			return $query->row_array();
		}

		//count
		public function get_items_count(){
			$sql3 = "SELECT count(item_id) as total_items from items";
			$result = $this->db->query($sql3);
			return $result->row()->total_items;
		}

		//count
		public function get_items_cart_count(){
			$sql4 = "SELECT count(cart_id) as total_items_cart from cart";
			$result = $this->db->query($sql4);
			return $result->row()->total_items_cart;
		}

		//count
		public function get_items_sold(){
			$sql5 = "SELECT count(sold_id) as total_items_sold from sold";
			$result = $this->db->query($sql5);
			return $result->row()->total_items_sold;
		}	

		//total
		public function get_item_price(){
			$sql11 = "SELECT sum(item_price*item_quantity) as total_sold from sold";
			$result = $this->db->query($sql11);
			return $result->row()->total_sold;
		}	

		//fetch
		public function get_item_sold_db(){
			$sql12 = "SELECT * from sold";
			$result = $this->db->query($sql12);
			return $result->result_array();
		} 

		public function create_item($post_image){
			$slug = url_title($this->input->post('item_name'));
			$data = array(
				'item_name' => $this->input->post('item_name'),
				'item_slug' => $slug,
				'item_description' => $this->input->post('item_description'),
				'item_quantity' => $this->input->post('item_quantity'),
				'item_price' => $this->input->post('item_price'),
				'category_id' => $this->input->post('category_id'),
				'post_image' => $post_image
			);

			return $this->db->insert('items', $data);
		}

		public function get_categories(){
			$this->db->order_by('category_name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function del2(){
			$this->db->delete('Items', array('item_id'=> $a));
			return;
		}

		public function add_single_item(){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'item_id' => $this->input->post('item_id'),
				'item_quantity' => $this->input->post('item_quantity'),
				'item_price' => $this->input->post('item_price')
			);

			return $this->db->insert('cart', $data);
		}

		public function select_my_cart(){

			$user_id = $this->session->userdata('user_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('cart');
			return $query->result_array();

		}

		public function get_cart_by_id($cart_id){

			$this->db->where('cart_id', $cart_id);
			$query = $this->db->get('cart');
			return $query->result_array();

		}

		public function get_price(){
			//$this->db->select('(SELECT SUM(payments.amount) FROM payments WHERE payments.invoice_id=4) AS amount_paid', FALSE);

			$user_id = $this->session->userdata('user_id');
			$sql1 = "SELECT sum(item_price*item_quantity) as total_cart from cart where user_id='$user_id'";
			$result = $this->db->query($sql1);
			return $result->row()->total_cart;
		}

		public function del_sigle_item_in_cart(){
			$this->db->delete('Cart', array('cart_id'=> $a));
			return;
		}

		public function update_item(){
			$slug = url_title($this->input->post('item_name'));

			$data = array(
				'item_name' => $this->input->post('item_name'),
				'item_description' => $this->input->post('item_description'),
				'item_slug' => $slug,
				'item_quantity' => $this->input->post('item_quantity'),
				'item_price' => $this->input->post('item_price'),
				'category_id' => $this->input->post('category_id') 	
			);

			$this->db->where('item_id', $this->input->post('item_id'));
			return $this->db->update('items', $data);
		}

		public function delete_item($id){

			$this->db->where('item_id',$id);
			$this->db->delete('items');
			return true;
		}

		public function delete_item_cart($id){

			$this->db->where('cart_id',$id);
			$this->db->delete('cart');
			return true;
		}

		public function select_by_category($id){

			$id = '1';
			$sql6 = "SELECT * FROM items where category_id='$id'";
			$result = $this->db->query($sql6);
			//$this->db->where('category_id', $id);
			//$this->db->order_by('item_id', 'DESC');
			return true;

		}

		public function fetch_data($query){
			$this->db->select('*');
			$this->db->from('items');

				if ($query != '') {
					
					$this->db->like('item_name', $query);
					$this->db->or_like('item_description', $query);
					$this->db->or_like('item_price', $query);
					$this->db->or_like('item_quantity', $query);
				}

				$this->db->order_by('item_id', 'DESC');
				return $this->db->get();
		}

		public function sold(){
			$user_id = $this->session->userdata('user_id');
			$data = array(
				'item_id' => $this->input->post('item_id'),
				'user_id' => $user_id,
				'item_quantity' => $this->input->post('item_quantity'),
				'item_price' => $this->input->post('item_price')
			);

			return $this->db->insert('sold', $data);
		}
	}
?>