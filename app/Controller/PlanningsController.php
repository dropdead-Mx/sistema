<?php 
class PlanningsController extends AppController {

	public $helpers=array('Html','Form','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('User','Course','Career','Planning','Usrcareer','Message','Semester','Teachercourse','Grupo');

public function beforeFilter(){
	parent::beforeFilter();
	$this->Auth->allow();
}

public  function isAuthorized($user){

		 if ($user['group_id']== '7' ){

		if(in_array($this->action,array('subirplaneaciones','coordinadorpormateria'))){
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

	public function index(){
		$user_id=$this->Auth->User('id');

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

	public function subirplaneaciones($maestro){

		// $this->User->id=$user_id
		// $maestro=$this->Auth->User('id');

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
			if($this->Planning->save($this->request->data) && $this->Message->save($this->request->data)){
				$this->Session->setFlash('Planeacion subida con exito');
				$this->redirect(array('controller'=>'users','action'=>'index'));
				// debug($this->request->data);
			} else {

				// debug($this->request->data);

				// $this->request->data='';
			}

		}

		$this->set(compact('coordinadores','options','maestro'));

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

	public function download($file_id){

		//agregar validacion para auth user.id 
	$dirAndName=$this->Planning->find('first',array('conditions'=>array(
		'Planning.id'=>$file_id),
		'fields'=>array('Planning.id','Planning.planeacion')));

	// $this->set(compact('dirAndName'));

	if(sizeof($dirAndName) ===1){
	$this->response->file('webroot/files/planning/planeacion/'.$dirAndName['Planning']['id'].'/'.$dirAndName['Planning']['planeacion'],array(
		'download'=>true,
		'name'=>$dirAndName['Planning']['planeacion']));

	return $this->response;

	}else {
		  $this->Session->setFlash('El archivo no existe');
		  $this->redirect(array('action'=>'index'));
	}



	}

	public function verplaneaciones($user_id,$course_id,$grupo){
		$this->RequestHandler->respondAs('json');
		$this->layout='ajax';
		$planeaciones=[];
		$usr='';
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

		// **AGREGAR CONDICION PARA QUE MUESTRE LAS PLANEACIONES DENTRO DEL CUATRIMESTRE ACTUAL
		$planeacion=$this->Planning->find('all', array('conditions'=>array('Planning.created BETWEEN ? AND ? '=>array($inicio,$fin),'Planning.coordi_id'=>$user_id,
			'Planning.course_id'=>$course_id,'Planning.grupo_id'=>$grupo),
			'recursive'=>1,
			'fields'=>array(
				'Planning.id','Planning.description','Planning.planeacion','Planning.created','User.name','User.apat','User.amat')));

		if($this->request->is('ajax') && sizeof($planeacion)>=1){

		$this->set(compact('planeacion'));
		}else {

		}
 

	}


}

?>