<?php 

class UploadtestsController extends AppController {
	
	public $helpers=array('Html','Form','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('User','Course','Career','Planning','Usrcareer','Message','Uploadtest');

	public function index($user_id){

		$carreras=[];

		$carrera=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$user_id)));

		for($x=0;$x<sizeof($carrera);$x++){

			array_push($carreras,$this->Career->find('all',array('conditions'=>array(
				'Career.id'=>$carrera[$x]['Usrcareer']['career_id']),
			'fields'=>array('Career.id','Career.name'),
			'recursive'=>-1)));
		}

		$this->set(compact('carreras','user_id'));

	}

	public function subirexamen($maestro){

		$materias=$this->Course->find('list',array('conditions'=>array('Course.user_id'=>$maestro),'recursive'=>-1,'fields'=>array('Course.id','Course.name')));

		$coordinadores=$this->User->find('list',array('conditions'=>array(
			'User.group_id'=>6),
			'recursive'=>-1,
			'fields'=>array('User.id','User.name')));

		if($this->request->is('post')){
			if($this->Uploadtest->save($this->request->data) && $this->Message->save($this->request->data)){
				$this->Session->setFlash('Examen subido con exito');
				$this->redirect(array('action'=>'index'));
				// debug($this->request->data);
			} else {
				// $this->request->data['Uploadtest']['course_id']=' ';
				// $this->request->data['Uploadtest']['partial']=' ';

				// debug($this->request->data);

				// $this->request->data='';
			}

		}

		$this->set(compact('coordinadores','materias','maestro'));

	}

	public function getexams($course_id,$partial){
		$this->RequestHandler->respondAs('json');
		$this->layout='ajax';
		$examenes=$this->Uploadtest->find('all',array('conditions'=>array(
			'Uploadtest.course_id'=>$course_id,
			'Uploadtest.partial'=>$partial),
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