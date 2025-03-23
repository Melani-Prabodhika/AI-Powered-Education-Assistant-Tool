<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model {
	
	public function register() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('com_name', 'Company Name', 'required');
		$this->form_validation->set_rules('com_email', 'Company Email Address', 'required');
		$this->form_validation->set_rules('com_phone', 'Company Conatct No', 'required');
		$this->form_validation->set_rules('com_address', 'Company Address', 'required');
		$this->form_validation->set_rules('admin', 'Admin Name', 'required');
		$this->form_validation->set_rules('user_email', 'Admin Email Address', 'required');
		$this->form_validation->set_rules('user_phone', 'Admin Conatct No', 'required');
		$this->form_validation->set_rules('user_address', 'Admin Address', 'required');
		$this->form_validation->set_rules('password-input', 'Password', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$errors = validation_errors();
			echo json_encode(['stt' => 'error', 'msg' => $errors, 'data' => '']);
			return;
		} else {
			$full_name = trim($_POST['admin']);
			$name_parts = explode(' ', $full_name);

			if (count($name_parts) === 1) {
				$shortname = $name_parts[0];
			} elseif (count($name_parts) === 2) {
				$shortname = $name_parts[0] . ' ' . $name_parts[1];
			} else {
				$shortname = $name_parts[0] . ' ' . $name_parts[count($name_parts) - 1];
			}
			
			if(isset($_POST['com_id'])) {
				$com_id = $_POST['com_id'];
			} else {
				$com_id = "";
			}
			
			$com = array(
					"com_name"=>$_POST['com_name'],
					"contact_no"=>$_POST['com_phone'],
					"com_email"=>$_POST['com_email'],
					"com_address"=>$_POST['com_address'],
					"genzo_client_id"=>$com_id,
				);
				
			$this->db->insert("company", $com);
			$cid = $this->db->insert_id();
			
			$user = array(
					"full_name"=>$_POST['admin'],
					"email"=>$_POST['user_email'],
					"contact_number"=>$_POST['user_phone'],
					"address"=>$_POST['user_address'],
					"password"=>$_POST['password-input'],
					"short_name"=>$shortname,
					"com_id"=>$cid,
					"ut_id" => 1
				);
			
			$this->db->insert("user", $user);
			$uid = $this->db->insert_id();
			
			if($cid && $uid) {
				echo json_encode(['stt' => 'ok', 'msg' => 'Account registered successfully!', 'data' => $uid]);
			} else {
				echo json_encode(['stt' => 'error', 'msg' => 'Something went wrong!', 'data' => '']);
			}
		}
	}
	
	public function resetPw() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_email', 'Email Address', 'required');
		$this->form_validation->set_rules('password-input', 'Password', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$errors = validation_errors();
			echo json_encode(['stt' => 'error', 'msg' => $errors, 'data' => '']);
			return;
		} else {
			$email = $_POST['user_email'];
			$password = $_POST['password-input'];
			
			$re = $this->db->where("email", $email)->update("user", ["password" => $password]);

			if($re){
				$this->db->select("user_id")->where("email", $email);
				$query = $this->db->get("user");
				$id = (int) $query->row()->user_id;
			}
			
			if($re) {
				echo json_encode(['stt' => 'ok', 'msg' => 'Password reset successfully!', 'data' => $id]);
			} else {
				echo json_encode(['stt' => 'error', 'msg' => 'Something went wrong!', 'data' => '']);
			}
		}
			
	}
	
}

?>