<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_log_m extends CI_Model {
	
	public function saveLog($module, $activity, $ref_table, $ref_id){
		$log = array(
			'module' => $module,
			'activity' => $activity,
			'ref_table' => $ref_table,
			'ref_id' => $ref_id,
			'handled_by' => $this->session->userdata('user_id')
		);
		
		$this->db->insert('sys_activity_log', $log);
	}
	
	public function getAllLog($data = []){
		if(isset($data["s_date"])){
			$this->db->where('DATE(sys_activity_log.c_date) >=', $data["s_date"]);
		}
		
		if(isset($data["e_date"])){
			$this->db->where('DATE(sys_activity_log.c_date) <=', $data["e_date"]);
		}
		$this->db->join('sys_user', 'sys_user.user_id = sys_activity_log.handled_by', 'left');
		$re = $this->db->select('*')->where('sys_activity_log.status', 'active')->get('sys_activity_log')->result();
		return [
		"stt" => "ok", 
		"msg" => "Data retrieved successfully.",
		"data" => $re
		];
	}
	
	public function getLogByUserId($user_id) {
		$this->db->select('al_id, user_id, DATE(c_date) c_date');
		$this->db->select('CONCAT("[", GROUP_CONCAT(
			JSON_OBJECT(
				"module", module,
				"activity", activity,
				"c_time", TIME(c_date)
			) 
			SEPARATOR ","
		), "]") AS activity');
		$this->db->where('status', 'active');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('c_date', 'desc');
		$this->db->group_by('DATE(c_date)');
		$result = $this->db->get('sys_activity_log')->result(); 
		return $result;
	}

}

?>