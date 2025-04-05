<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_m extends CI_Model {

    /*public function getAllSystemInfo(){
        $re = $this->db->where('status','active')->get('sys_info')->row();
        return $re;
    }*/
	
    public function getAllSystemSettings() {
		$ut_id = $this->session->userdata('ut_id');

		$result = $this->db
			->select('sys_settings.set_id, set_name, COALESCE(set_value, set_default) as set_value')
			->from('sys_settings')
			->join('sys_settings_user', '
				sys_settings_user.set_id = sys_settings.set_id AND 
				sys_settings_user.status = "active" AND 
				sys_settings_user.ut_id = '. $ut_id, 'left')
			->where('sys_settings.status', 'active')
			->get()
			->result();

		$returnArr = array_column($result, 'set_value', 'set_name');

		return $returnArr;
	}
	
	
	public function getAllSettings(){
		$re = $this->db
				->select('set_id, set_name, set_desc, set_default, data')
				->where('status', 'active')
				->get('sys_settings')->result();
		return $re;
	}
	
	
	public function UpdateSettings() {
		$set_id = $_GET['set_id'];
		$value = $_GET['up_val'];

		$sett = array(
			'set_default'   => $value,
		);

		$this->db->where('set_id', $set_id);
		$re = $this->db->update('sys_settings', $sett);
		if ($re) {
			return ["stt" => "ok", "msg" => "<p>Settings updated successfully.</p>", "data" => $set_id];
		} else {
			$error = $this->db->error();
			return ["stt" => "error", "msg" => "<p>Update failed. Error: " . $error['message'] . "</p>", "data" => ""];
		}
	}
	
	public function get_banks(){
		$res = $this->db->get('bank')->result();
		return $res;
	}

public function selectedUserNameAndPassword() {
    $com_id = $this->session->userdata('com_id');
    
    if ($com_id) {
        $query = $this->db->select('com_id, user_name, password')
                          ->from('sys_user')
                          ->where('com_id', $com_id)
                          ->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    
    return null;
}

}