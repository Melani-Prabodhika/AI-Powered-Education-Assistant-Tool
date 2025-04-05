<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Lesson_plan extends CI_Controller {

   public function index(){
		$this->load->view('/layout/header');
		$this->load->view('/lesson_plan/form');
		$this->load->view('/layout/footer');
	}
	
	public function createLessonPlan() {
		$subject = $_POST['subject'];
		$gradeLevel = $_POST['grade'];
		$topic = $_POST['compet'];
		$duration = $_POST['period'];
		$objectives = $_POST['outcome'];
		$fileContent = $_POST['content'];

		$this->load->model('Api_calls_m');
		$lessonPlan = $this->Api_calls_m->generateLessonPlan($subject, $gradeLevel, $topic, $duration, $objectives, $fileContent);

		echo nl2br($lessonPlan);
	}
	
	public function lesson_plan() {
		$this->load->view('/lesson_plan/lesson_view');
	}

   public function save_lesson() {
		$this->load->model('Lesson_plan_m');
		$this->Lesson_plan_m->save_lesson();
	}
	
}

?>