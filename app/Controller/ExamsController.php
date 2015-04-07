<?php 


class ExamsController extends AppController {

	public $helpers =array('Html','Form','Js');
	public $uses=array('Course','User','Exam','Usrcareer','Career','EmployeeProfile');
	public $components=array('Session');


	public function index($id=null){

	$careers = $this->Usrcareer->find('list',array('conditions'=>array('Usrcareer.user_id'=>$id),'fields'=>'career_id'));
	$careers2=$this->Career->find('list',array('conditions'=>array('Career.id'=>$careers)));
	$this->set(compact('careers','careers2'));




	}

	public function add($career=null,$cuatri=null){
		$this->Career->career_id=$career;
		$this->Career->semester=$cuatri;

		if($this->request->is('post')):

				// debug($this->request->data);
			if($this->Exam->saveAll($this->request->data['Exam'] )):
				// $this->Session->setFlash('Fechas de examenes asignadas');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;

		$materias=$this->Course->find('all',array('conditions'=>array('Course.career_id'=>$career,'Course.semester'=>$cuatri)));
		
		
		$this->set(compact('materias'));

	}
}



?>