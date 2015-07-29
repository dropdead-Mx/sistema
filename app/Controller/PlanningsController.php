<?php 
class PlanningsController extends AppController {

	public $helpers=array('Html','Form','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('User','Course','Career','Planning','Usrcareer','Message');


	public function index(){

	}

	public function subirplaneaciones($maestro){

		// $this->User->id=$user_id

		$materias=$this->Course->find('list',array('conditions'=>array('Course.user_id'=>$maestro),'recursive'=>-1,'fields'=>array('Course.id','Course.name')));

		$coordinadores=$this->User->find('list',array('conditions'=>array(
			'User.group_id'=>6),
			'recursive'=>-1,
			'fields'=>array('User.id','User.name')));

		if($this->request->is('post')){
			if($this->Planning->save($this->request->data)&& $this->Message->save($this->request->data)){
				$this->Session->setFlash('Planeacion subida con exito');
				$this->redirect(array('action'=>'index'));
				// debug($this->request->data);
			} else {

				// $this->request->data='';
			}

		}

		$this->set(compact('coordinadores','materias','maestro'));

	}

	// public function carrerasporcoordinador($coordi_id){

 // 		$this->RequestHandler->respondAs('json');
	// 	$carreras=[];
	// 	$careers=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$coordi_id),'fields'=>array('Usrcareer.career_id')));

	// 	for($x=0 ; $x< sizeof($careers);$x++){

	// 		array_push($carreras,$this->Career->find('all',array('conditions'=>array('Career.id'=>$careers[$x]['Usrcareer']['career_id']),
	// 			'fields'=>array(
	// 				'Career.id','Career.name'),
	// 			'recursive'=>-1)));


	// 	}

	// 	$this->set(compact('carreras'));
 // 		$this->layout='ajax';



	// }


	public function coordinadorpormateria($materia){

		$this->RequestHandler->respondAs('json');
		$this->layout='ajax';
		$coordinador=[];



		$curso=$this->Course->find('all',array('conditions'=>array('Course.id'=>$materia),'recursive'=>-1));
		if( $this->request->is('ajax') && sizeof($curso)> 0 ){

		$match=$curso[0]['Course']['career_id'];

		$coordina=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.career_id'=>$match),'fields'=>array('Usrcareer.user_id')));
		$coordinador=$this->User->find('all',array('conditions'=>array('User.id'=>$coordina[0]['Usrcareer']['user_id']),'recursive'=>-1,'fields'=>array('User.id','User.name')));

		$this->set(compact('coordinador','curso'));
		}



	}
}

?>