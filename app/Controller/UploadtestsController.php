<?php 

class UploadtestsController extends AppController {
	
	public $helpers=array('Html','Form','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('User','Course','Career','Planning','Usrcareer','Message','Uploadtest','Teachercourse','Semester','Grupo');

public function beforeFilter(){
	parent::beforeFilter();
	$this->Auth->allow();
}
	public  function isAuthorized($user){

		 if ($user['group_id']== '7' ){

		if(in_array($this->action,array('subirexamen'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}
		}

	}

		else  if ($user['group_id']== '6' ){

		if(in_array($this->action,array('index','getexams','download'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}
		}

	}

	return parent::isAuthorized($user);
}

	public function index($user_id){

		// $user_id=$this->Auth->User('id');
		// $tipo=$this->Auth->User('group_id');
		// if($tipo == '6'){

		$carreras=[];

		$carrera=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$user_id)));

		for($x=0;$x<sizeof($carrera);$x++){

			array_push($carreras,$this->Career->find('all',array('conditions'=>array(
				'Career.id'=>$carrera[$x]['Usrcareer']['career_id']),
			'fields'=>array('Career.id','Career.name'),
			'recursive'=>-1)));
		}

		$this->set(compact('carreras','user_id'));
		// }

	}

	public function subirexamen($maestro){

		$options=array();
		// $maestro=$this->Auth->User('id');
		// $tipo=$this->Auth->User('group_id');

		// if($tipo == '7'){

		// $materias=$this->Course->find('list',array('conditions'=>array('Course.user_id'=>$maestro),'recursive'=>-1,'fields'=>array('Course.id','Course.name')));
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
		$miscursos=$this->Teachercourse->find('all',array('conditions'=>array(
			'Teachercourse.created BETWEEN ? AND ? '=>array($inicio,$fin),'Teachercourse.user_id'=>$maestro)));
		// pr($miscursos);

		for($x=0;$x<sizeof($miscursos);$x++){

			$matId=$miscursos[$x]['Teachercourse']['course_id'];
			$grupo=$miscursos[$x]['Teachercourse']['grupo_id'];
			$grupoNombre=$this->Grupo->find('all',array('conditions'=>array('Grupo.id'=>$grupo)));

			$datos=$this->Course->find('all',array('conditions'=>array('Course.id'=>$matId),'recursive'=>-1));

			
				// array_push($options,'value'=>$matId,'name'=>$datos['Course']['name']);
			$options[]=array(
				'value'=>$matId,'name'=>$datos[0]['Course']['name'],'data-grupo'=>$grupo,'data-gruponame'=>$grupoNombre[0]['Grupo']['name']
				);
				

			

		}

		$coordinadores=$this->User->find('list',array('conditions'=>array(
			'User.group_id'=>6),
			'recursive'=>-1,
			'fields'=>array('User.id','User.name')));

		if($this->request->is('post')){
			if($this->Uploadtest->save($this->request->data) && $this->Message->save($this->request->data)){
				$this->Session->setFlash('Examen subido con exito');
				$this->redirect(array('controller'=>'users','action'=>'index'));
				// debug($this->request->data);
			} else {
				// $this->request->data['Uploadtest']['course_id']=' ';
				// $this->request->data['Uploadtest']['partial']=' ';

				// debug($this->request->data);

				// $this->request->data='';
			}

		}
		// pr($materias);
		$this->set(compact('coordinadores','options','maestro'));
		// }


	}

	public function getexams($course_id,$partial,$grupo){
		$this->RequestHandler->respondAs('json');
		$this->layout='ajax';
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
		
		$examenes=$this->Uploadtest->find('all',array('conditions'=>array('Uploadtest.created BETWEEN ? AND ? '=>array($inicio,$fin),
			'Uploadtest.course_id'=>$course_id,
			'Uploadtest.partial'=>$partial,
			'Uploadtest.grupo_id'=>$grupo),
		'fields'=>array(
			'Uploadtest.id','Uploadtest.created','Uploadtest.partial','Uploadtest.examen','User.name','User.apat','User.amat')));

		$this->set(compact('examenes'));
	}

	public function download($file_id){

		$dirAndName=$this->Uploadtest->find('first',array('conditions'=>array(
			'Uploadtest.id'=>$file_id),
		'fields'=>array(
			'Uploadtest.id','Uploadtest.examen')));

	if(sizeof($dirAndName) ===1){
	$this->response->file('webroot/files/uploadtest/examen/'.$dirAndName['Uploadtest']['id'].'/'.$dirAndName['Uploadtest']['examen'],array(
		'download'=>true,
		'name'=>$dirAndName['Uploadtest']['examen']));

	return $this->response;

	}else {
		  $this->Session->setFlash('El archivo no existe');
		  $this->redirect(array('action'=>'index'));
	}

	}
}

?>