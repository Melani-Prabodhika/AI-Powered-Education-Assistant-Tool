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
  

}

?>