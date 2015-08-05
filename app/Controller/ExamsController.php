<?php 


class ExamsController extends AppController {

	public $helpers =array('Html','Form','Js');
	public $uses=array('Course','User','Exam','Usrcareer','Career','EmployeeProfile','Semester');
	public $components=array('Session','RequestHandler');

	

	public function index($id=null){
	$this->User->id=$id;
	$careers = $this->Usrcareer->find('list',array('conditions'=>array('Usrcareer.user_id'=>$id),'fields'=>'career_id'));
	$careers2=$this->Career->find('all',array('conditions'=>array('Career.id'=>$careers)));


	$this->set(compact('careers','careers2','id'));





	}

	public function add($course_id,$id){
		// $this->Career->career_id=$career;
		// $this->Career->semester=$cuatri;
		$materias=$this->Course->find('all',array('conditions'=>array('Course.id'=>$course_id)));
		// $this->User->id=$id;
		// debug($id);
		// echo sizeof($materias);
		if($this->request->is('post')):

			if($this->Exam->saveAll($this->request->data['Exam'] )):
				$this->Session->setFlash('Fechas de examenes asignadas');
				$this->redirect(array('action'=>'index',$id));
			endif;
		endif;

		
		
		$this->set(compact('materias'));

	}


public function verify($course_id){

	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=$cuatriInicio['Semester']['inicio'];
	 $fin=$cuatriInicio['Semester']['fin'];
	$verify=' ';
	$check=$this->Exam->find('count',array('conditions'=>array('Exam.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'Exam.course_id'=>$course_id)));

	if($check > 0){
		$verify='existe';
	}else{
		$verify='noExiste';
	}

	$this->set(compact('verify'));
	

}
}



?>