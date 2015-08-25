<?php 


class ExamsController extends AppController {

	public $helpers =array('Html','Form','Js');
	public $uses=array('Course','User','Exam','Usrcareer','Career','EmployeeProfile','Semester','Grupo','Teachercourse');
	public $components=array('Session','RequestHandler');

	
	public function beforeFilter(){
		parent::beforeFilter();
		// $this->Auth->allow();
	}


	public function isAuthorized($user){



		if ($user['group_id']== '6' ){

		if(in_array($this->action,array('index','verify','add'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));

			}
		}

	}



	// return parent::isAuthorized($user);




	return parent::isAuthorized($user);

}
	public function index(){
	// $this->User->id=$id;
	$id=$this->Auth->User('id');

	$grupos=[];
	$careers = $this->Usrcareer->find('list',array('conditions'=>array('Usrcareer.user_id'=>$id),'fields'=>'career_id'));
	$careers2=$this->Career->find('all',array('conditions'=>array('Career.id'=>$careers)));
	// pr($careers2);





	$this->set(compact('careers','careers2','id'));





	}

	public function add($course_id,$id,$grupo){
		// $this->Career->career_id=$career;
		// $this->Career->semester=$cuatri;
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$existe=$this->Exam->find('count',array('conditions'=>array('Exam.created BETWEEN ? AND ? '=>array($inicio,$fin),
		'Exam.course_id'=>$course_id,'Exam.grupo_id'=>$grupo)));
	if($existe === 0 ){

		$materias=$this->Course->find('all',array('conditions'=>array('Course.id'=>$course_id)));
		$data=$this->Teachercourse->find('all',array('conditions'=>array('Teachercourse.course_id'=>$course_id)));
		// pr($data);
		if(sizeof($data)==0){
			$this->set(compact('materias','grupo'));


		}else{

		$maestro=$this->User->find('all',array('conditions'=>array('User.id'=>$data[0]['Teachercourse']['user_id'])));
		$this->set(compact('materias','grupo','maestro'));

		}
		// $this->User->id=$id;
		// debug($id);
		// echo sizeof($materias);
		if($this->request->is('post')):

			if($this->Exam->saveAll($this->request->data['Exam'] )):
				$this->Session->setFlash('Fechas de examenes asignadas','default',array('class'=>'mensajeOk'));
				$this->redirect(array('action'=>'index',$id));
			endif;
		endif;
	}else {
		$this->Session->setFlash('Ya has asignado fechas de examen para este grupo y materia','default',array('class'=>'mensajeError'));
				$this->redirect(array('action'=>'index',$id));
	}

		
		
		
	}


public function verify($course_id,$grupo_id){

	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=$cuatriInicio['Semester']['inicio'];
	 $fin=$cuatriInicio['Semester']['fin'];
	$verify=' ';
	$check=$this->Exam->find('count',array('conditions'=>array('Exam.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'Exam.course_id'=>$course_id,'Exam.grupo_id'=>$grupo_id)));

	if($check > 0){
		$verify='existe';
	}else{
		$verify='noExiste';
	}

	$this->set(compact('verify'));
	

}
}



?>