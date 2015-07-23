<?php 
class PlanningsController extends AppController {

	public $helpers=array('Html','Form','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('User','Course','Career','Planning','Usrcareer');


	public function index(){

	}

	public function subirplaneaciones(){

		$coordinadores=$this->User->find('list',array('conditions'=>array(
			'User.group_id'=>6),
			'recursive'=>-1,
			'fields'=>array('User.id','User.name')));

		if($this->request->is('post')):
			if($this->Planning->save($this->request->data)):
				$this->Session->setFlash('Planeacion subida con exito');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;

		$this->set(compact('coordinadores'));

	}

	public function carrerasporcoordinador($coordi_id){

 		$this->RequestHandler->respondAs('json');
		$carreras=[];
		$careers=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$coordi_id),'fields'=>array('Usrcareer.career_id')));

		for($x=0 ; $x< sizeof($careers);$x++){

			array_push($carreras,$this->Career->find('all',array('conditions'=>array('Career.id'=>$careers[$x]['Usrcareer']['career_id']),
				'fields'=>array(
					'Career.id','Career.name'),
				'recursive'=>-1)));


		}

		$this->set(compact('carreras'));
 		$this->layout='ajax';



	}
}

?>