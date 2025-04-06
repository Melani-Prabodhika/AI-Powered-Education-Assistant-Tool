<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lesson_plan_m extends CI_Model {

	public function save_lesson() {
		$json = $this->input->raw_input_stream;
		$data = json_decode($json, true);
  
		if (empty($data)) {
			 $this->output->set_status_header(400);
			 echo json_encode(['success' => false, 'message' => 'Invalid data format']);
			 return;
		}
  
		$subject = $data['metadata']['subject'] ?? '';
		$competency = $data['metadata']['competency'] ?? '';
  
		$data2 = [
			 'subject' => $subject,
			 'competency' => $competency,
			 'user_id' => $this->session->userdata('user_id'),
			'lesson_plan_json' => json_encode($data),
			 'c_date' => date('Y-m-d H:i:s')
		];
  
		$this->db->insert('lesson_plans', $data2);
		$id = $this->db->insert_id();
  
		if ($id) {
			 echo json_encode(['stt' => 'ok', 'msg' => 'Lesson plan saved successfully!', 'data' => $id]);
		} else {
			 echo json_encode(['stt' => 'error', 'msg' => 'Something went wrong!', 'data' => '']);
		}
  }

  public function getAllLessonPlans() {
	$this->db->select('*');
	$this->db->from('lesson_plans');
	$this->db->group_start();
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->or_where('public', 1);
	$this->db->group_end();
	$query = $this->db->get();
	return $query->result();
}

public function updateStatus(){
	$id = $_POST['lp_id'];

	if($_POST['stt'] == "public"){
		$stt = 1;
	} else {
		$stt = 0;
	}
	$data = array('public'=>$stt);
	
	$re = $this->db->where('lp_id', $id)->update('lesson_plans',$data);
	
	if($re){
		echo json_encode(['stt' => 'ok', 'msg' => 'Status updated successfully!', 'data' => $id]);
	} else {
		echo json_encode(['stt' => 'error', 'msg' => 'Something went wrong!', 'data' => '']);
	}
}
  
}

?>