<?php
	class Category_model extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_categories(){
			$this->db->order_by('category_id', 'DESC');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function create_category(){
			$data = array(
				'category_name' => $this->input->post('category_name')
			);

			return $this->db->insert('categories',  $data);
		}

		public function del($a){
			$this->db->delete('Categories', array('category_id'=> $a));
			return;
		}

		public function fetch_single_data($category_id){
			$this->db->where('category_id', $category_id);
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_data($data, $id){
			$this->db->where('category_id', $id);
			$this->db->update('categories', $data);	
		}
	}
?>