<?php 

class UploadtestsController extends AppController {
	
	public $helpers=array('Html','Form','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('User','Course','Career','Planning','Usrcareer','Message','Uploadtest');

	public function index(){

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

	public function download(){

	}
}

?>