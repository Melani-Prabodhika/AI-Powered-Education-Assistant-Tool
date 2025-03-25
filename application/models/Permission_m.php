<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_m extends CI_Model {
//------------------------------------------------------------------------------------------
// get accessible menu sections - Nadun 2024-02-14
	public function get_structure_for_roles()
	{
		$re = $this->db->select('pm_id, pm_name, pm_icon, pm_url, "0" as permission')
			->where('(pm_type = "all" OR pm_type = "'.$this->session->userdata("ut_type").'")')
			->where('status', 'active')->order_by('pm_order', 'ASC')->get('sys_permission_main')->result();
			
		foreach($re as $k => $v){
			$sub = $this->db->select('ps_id, ps_name, ps_url, "0" as permission, "1" as allow')
				->where('pm_id', $v->pm_id)->where('status', 'active')/* ->where('skip_menu', 0) */
				->order_by('ps_order', 'ASC')->get('sys_permission_sub')->result();
				
			$re[$k]->sub = $sub;
		}
		
		return $re; 
	}
//------------------------------------------------------------------------------------------
// to add permissions to roles - Nadun - 2024-02-20
	public function add_permissions_to_role()
	{
		$error = "";
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('role', 'Role name', 'required');
        $this->form_validation->set_rules('def_func', 'Default function', 'required');

		if($this->form_validation->run() === FALSE){
            $error = validation_errors();
            return ['stt' => 'error', 'msg' => $error, 'data' => ''];
        }
		if($_POST['user_type'] == ''){
			if($this->Autoload_m->checkDuplicates("sys_user_type", "ut_name", trim($_POST["role"]), true, 
				'(com_id = "'.$this->session->userdata("com_id").'" AND ut_type = "'.$this->session->userdata("ut_type").'")')){
				$error = "<p>User type already exixts.</p>";
				return ['stt' => 'error', 'msg' => $error, 'data' => ''];
			}
		}
		//continue the process
		$role_name = $_POST["role"];
		$def_func = $_POST["def_func"];
		// print_r($def_func);
		// exit(); 
		$permissions = json_decode($_POST["data"], true);
		
		
		
		//init transaction
		$this->db->trans_start();
		if($_POST['user_type'] != ''){
			$DefUrlName = $this->db->select('pm_url')
				 
				->where('status', 'active')
				->where('pm_id', $def_func)
				->get('sys_permission_main') 
				->row()->pm_url;
			// print_r($def_func);
			// print_r('1');  
		//add to user roles
			$up_data = array(
				"ut_name" => $role_name,
				"ut_type" => $this->session->userdata('ut_type'),
				"com_id" => $this->session->userdata("com_id"),
				"editable" => 1,
				"def_url" => $DefUrlName, 
				"admin_power" => 0,
				"remove_from_sales" => 0,
			);
			
		
			$ut_id = $this->db->where('ut_id',$_POST['user_type'])->update('sys_user_type',$up_data);
			
			// For sys_permission_user_main table
			$this->db->where('ut_id', $_POST['user_type'])->update('sys_permission_user_main', array('status' => 'delete'));

			// For sys_permission_user_sub table
			$this->db->where('ut_id', $_POST['user_type'])->update('sys_permission_user_sub', array('status' => 'delete'));
			
			$def_url = "";
			
			$pm_array = array();
			$ps_array = array();
			
			// for main permissions
			foreach($permissions as $items){
				if($items["permission"] == 0){
					continue;
				}
				
				$find_def_url = false;
				
				array_push($pm_array, ["pm_id" => $items["pm_id"], "ut_id" => $_POST['user_type']]);
				
				if($def_func == $items["pm_id"]){
					$find_def_url = true;
				}
				
				//for sub permissions
				foreach($items["sub"] as $sub){
					if($sub["permission"] == 0){
						continue;
					}
					
					if($find_def_url){					
						$def_url = $sub["ps_url"];
						$find_def_url = false;
					}
					
					$edit = 0;
					$delete = 0;
					
					if($sub["allow"] == 1){
						$edit = 1;
						$delete = 1;
					}else if($sub["allow"] == 2){
						$edit = 1;
					}else if($sub["allow"] == 3){
						$delete = 1;
					}
					
					array_push($ps_array, 
						[
							"pm_id" => $items["pm_id"], 
							"ps_id" => $sub["ps_id"], 
							"ut_id" => $_POST['user_type'], 
							"edit_permissions" => $edit, 
							"delete_permissions" => $delete
						]
					);
				}
			}
			
		}else{
			
			$DefUrlName = $this->db->select('pm_url')
				->where('status', 'active')
				->where('pm_id', $def_func)
				->get('sys_permission_main') 
				->row()->pm_url;
				
			// print_r($DefUrlName);
			// print_r('2');
			// exit();
			$this->db->insert('sys_user_type', array(
			"ut_name" => $role_name,
			"ut_type" => $this->session->userdata('ut_type'),
			"com_id" => $this->session->userdata("com_id"),
			"def_url" => $DefUrlName, 
			"editable" => 1,
			"admin_power" => 0,
			"remove_from_sales" => 0,
			));
		
			$ut_id = $this->db->insert_id();
			
			$def_url = "";
		
			$pm_array = array();
			$ps_array = array();
			
			// for main permissions
			foreach($permissions as $items){
				if($items["permission"] == 0){
					continue;
				}
				
				$find_def_url = false;
				
				array_push($pm_array, ["pm_id" => $items["pm_id"], "ut_id" => $ut_id]);
				
				if($def_func == $items["pm_id"]){
					$find_def_url = true;
				}
				
				//for sub permissions
				foreach($items["sub"] as $sub){
					if($sub["permission"] == 0){
						continue;
					}
					
					if($find_def_url){					
						$def_url = $sub["ps_url"];
						$find_def_url = false;
					}
					
					$edit = 0;
					$delete = 0;
					
					if($sub["allow"] == 1){
						$edit = 1;
						$delete = 1;
					}else if($sub["allow"] == 2){
						$edit = 1;
					}else if($sub["allow"] == 3){
						$delete = 1;
					}
					
					array_push($ps_array, 
						[
							"pm_id" => $items["pm_id"], 
							"ps_id" => $sub["ps_id"], 
							"ut_id" => $ut_id, 
							"edit_permissions" => $edit, 
							"delete_permissions" => $delete
						]
					);
				}
				
			}
		}
		
		// print_r($ps_array);
				// exit();
		//validations for permissions
		if(empty($pm_array) || empty($ps_array)){
			$this->db->trans_rollback();
			return ['stt' => 'error', 'msg' => '<p>Please select at least one permission', 'data' => ''];
		}
		
		//$this->db->where('ut_id', $ut_id)->update('sys_user_type', array("def_url" => $def_url));
		$this->db->insert_batch('sys_permission_user_main', $pm_array);
		$this->db->insert_batch('sys_permission_user_sub', $ps_array);
	
		$this->db->trans_commit();
		
		$this->Activity_log_m->saveLog("permission", "Add new user role", "sys_user_type", $ut_id);
		if($_POST['user_type'] != ''){
			
			return ['stt' => 'ok', 'msg' => '<p>Permissions updated successfully.', 'data' => $ut_id];
		}else{
			return ['stt' => 'ok', 'msg' => '<p>Permissions added successfully.', 'data' => $ut_id];
			
		}
		
		
	} 
//------------------------------------------------------------------------------------------
// get permission usertypes using company
	public function getComUserTypes(){
		
		
	$re = $this->db->select('*')
    // ->where('ut_type', $this->session->userdata('ut_type'))
    ->group_start()
    ->where('com_id', 0)
    ->or_where('com_id', $this->session->userdata("com_id"))
    ->group_end()
    ->where('status', 'active')
    ->get('sys_user_type') 
    ->result();


		// print_r(); 
		// exit;
		 return $re;
	}
//------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
// get user types - Sam 2024-02-28
	public function get_structure_for_roles_permission_id() 
	{
		$re = $this->db->select('pm_id, pm_name, pm_icon, pm_url, "0" as permission')
			->where('(pm_type = "all" OR pm_type = "'.$this->session->userdata("ut_type").'")')
			->where('status', 'active')->order_by('pm_order', 'ASC')->get('sys_permission_main')->result();
			
		foreach($re as $k => $v){
			$sub = $this->db->select('ps_id, ps_name, ps_url, "0" as permission, "1" as allow')
				->where('pm_id', $v->pm_id)->where('status', 'active')->where('skip_menu', 0)
				->order_by('ps_order', 'ASC')->get('sys_permission_sub')->result();
				
			$re[$k]->sub = $sub;
		}
		
		return $re;
	}
	
//------------------------------------------------------------------------------------------
// get permissins using userType - Sam 2024-02-29
	public function getPermissionById($ut_id) 
	{
		$res = $this->db->where('ut_id',$ut_id)->get('sys_user_type')->row();
		
		$this->db->join('sys_permission_user_main', 'sys_permission_user_main.pm_id = sys_permission_main.pm_id AND sys_permission_user_main.status = "active" AND ut_id = "'.$ut_id.'"', 'left');
		$re = $this->db->select('sys_permission_main.pm_id, sys_permission_main.pm_name, sys_permission_main.pm_icon, sys_permission_main.pm_url, IF(ISNULL(sys_permission_user_main.pmu_id), "0", "1") as permission')
			->where('(pm_type = "all" OR pm_type = "'.$this->session->userdata("ut_type").'")')
			->where('sys_permission_main.status', 'active')->order_by('pm_order', 'ASC')
			->get('sys_permission_main')->result();
			
		foreach($re as $k => $v){
			$this->db->join('sys_permission_user_sub', 'sys_permission_user_sub.ps_id = sys_permission_sub.ps_id AND sys_permission_user_sub.status = "active" AND ut_id = "'.$ut_id.'"', 'left');
			$sub = $this->db->select('sys_permission_sub.ps_id, sys_permission_sub.ps_name, sys_permission_sub.ps_url, 
				IF(ISNULL(sys_permission_user_sub.psu_id), "0", "1") as permission,
				CASE 
					WHEN ISNULL(sys_permission_user_sub.psu_id) THEN "1"
					ELSE 
						CASE 
							WHEN sys_permission_user_sub.edit_permissions = 1 AND sys_permission_user_sub.delete_permissions = 1 THEN "1"
							WHEN sys_permission_user_sub.edit_permissions = 1 AND sys_permission_user_sub.delete_permissions = 0 THEN "2"
							WHEN sys_permission_user_sub.edit_permissions = 0 AND sys_permission_user_sub.delete_permissions = 1 THEN "3"
							ELSE "4"
						END
				END as allow')
				->where('sys_permission_sub.pm_id', $v->pm_id)
				->where('sys_permission_sub.status', 'active')
				->where('skip_menu', 0)
				->order_by('ps_order', 'ASC')
				->get('sys_permission_sub')
				->result();

			$re[$k]->sub = $sub;
		}
		
		$res->p = $re;
		return $res;
	}
}

?>


