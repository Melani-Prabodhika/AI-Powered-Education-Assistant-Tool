<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

   public function auth(){ 
		$this->db->join('sys_user_type','sys_user_type.ut_id = user.ut_id','left');
		$this->db->select("*, user.status status, user.com_id com_id");
		$this->db->where('user.email', $_POST['un']);
		$this->db->where('password', $_POST['pw']);
		$this->db->where('user.status !=','delete');
		$this->db->where('sys_user_type.status','active');
		$q = $this->db->get('user')->row();
		 
		if($q != null){
			$user = $q->user_id;
            $a = array(
                "login"=>true,
                "user_id"=>$q->user_id,
                "ut_name"=>$q->ut_name,
                "ut_id"=>$q->ut_id,
                "user_name"=>$q->full_name,
				    "short_name"=>$q->short_name,
                "pro_pic"=>$q->pro_pic,
                "status"=>$q->status,
                "user_editable"=>$q->editable, 
                "ut_type"=>$q->ut_type,
                "admin_power"=>$q->admin_power, 
                "def_url"=>$q->def_url,
				    "category"=>$q->category,
            );

			$this->session->set_userdata($a);

			//store system settting
			$this->load->model('Settings_m');
			$this->load->model('Menu_m');
			$this->load->model('Activity_log_m');
			$b['sys_info'] = $this->Settings_m->getAllSystemInfo();
			$b['sys_settings'] = $this->Settings_m->getAllSystemSettings();
			$b['permissions'] = $this->Menu_m->getMenuItems($q->ut_id);
			$this->session->set_userdata($b);
			
			
			$this->Activity_log_m->saveLog("Login", "logged into the system", "user", $user);
			
			return 1;
		}else{
			return 0;
		}
   }

   public function logout(){ 
		$this->session->sess_destroy();
		return 1;
		echo json_encode(array('status' => 1));
	}

}

?>