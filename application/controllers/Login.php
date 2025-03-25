<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Login_m');
  }

	public function login_user() {
		$this->load->model('Login_m');
		$re = $this->Login_m->auth();
		echo $re;
	}

	public function logout(){
		$this->load->helper('url');
		$this->load->model('Login_m');
		$re = $this->Login_m->logout(); 
	
		if($re == '1'){
			$tx['a']='';
			redirect();
		}
	}

	public function saveLog($module, $activity, $ref_table, $ref_id){
		$this->load->library('session');
		$log = array(
			'module' => $module,
			'activity' => $activity,
			'ref_table' => $ref_table,
			'ref_id' => $ref_id,
			'handled_by' => $this->session->userdata('user_name')
		);

		$this->db->insert('sys_activity_log', $log);
	}
	
	public function signup() {
		$this->load->view('/auth/signup');
	}
	
	public function register() {
		$this->load->model("User_m");
		$this->User_m->register();
	}
	
	public function success_msg() {
		$this->load->view('/auth/success_msg');
	}
	
	public function passReset() {
		$this->load->view('/auth/reset_password');
	}
	
	public function resetpw_success() {
		$this->load->view('/auth/pw_success');
	}
	
	public function resetPw() {
		$this->load->model("User_m");
		$this->User_m->resetPw();
	}
	
}
