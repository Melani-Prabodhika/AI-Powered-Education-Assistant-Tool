<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Assignement {

	public function index(){
		$this->load->view('/layout/header');
		$this->load->view('/form');
		$this->load->view('/layout/footer');
	}

	 public function assignment() {
		$this->load->view('/assignment_view');
	}
   
	public function createAssignment() {
		$subject = $_POST['subject'];
		$gradeLevel = $_POST['grade'];
		$topic = $_POST['compet'];
		$type = $_POST['type'];
		$objectives = $_POST['outcome'];
		$fileContent = $_POST['content'];
		$lvl = $_POST['lvl'];

		$this->load->model('Api_calls_m');
		$lessonPlan = $this->Api_calls_m->generateAssignment($subject, $gradeLevel, $topic, $type, $lvl, $objectives, $fileContent); 

		echo nl2br($lessonPlan);
	}

}

?>