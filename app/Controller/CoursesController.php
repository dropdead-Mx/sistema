<?php 

class CoursesController extends AppController {

	public $helpers=array('Form','Html','Js');
	public $components=array('Session','RequestHandler');
	public $uses=array('Course','CourseModule','User','Goal','Usrcareer','Career','Semester','Grupo');

public function beforeFilter(){
	parent::beforeFilter();
	// $this->Auth->allow('index','getcoursesbycoordinator','tienemod','vermodulos','agregarHorario','asignarProfesor');
	$this->Auth->allow();
}

public function isAuthorized($user){


	// return parent::isAuthorized($user);


	 if ($user['group_id']== '7' ){

		if(in_array($this->action,array('tienecrit'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));

				
				

			}
		}

	}

	else if ($user['group_id']== '6' ){

		if(in_array($this->action,array('index','addModule','tienemod'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));
				
				
				

			}
		}

	}

	return parent::isAuthorized($user);

}

	public function index($user_id){
		// $user_id=$this->Auth->User('id');
		// $tipo=$this->Auth->User('group_id');

		// if ($tipo == '6'){

		$carreras=[];
		$careers= $this->Usrcareer->find('all',array('conditions'=>array(
			'Usrcareer.user_id'=>$user_id),
		'fields' => array('Usrcareer.career_id')

		)
		);

		for($i=0;$i<= sizeof($careers)-1;$i++){

			array_push($carreras,$this->Career->find('all',array('conditions'=>array(
				'Career.id'=>$careers[$i]['Usrcareer']['career_id']),
			'fields'=>array(
				'Career.id','Career.name','Career.abrev'),
			'recursive'=> -1,
			)));
		}
		
		// $materias=$this->Course->find('all');
		// $this->set('materias',$materias);
		$this->set('carreras',$carreras);
		// }
		
	}


	public function add(){

		if($this->request->is('post')):
			if($this->Course->save($this->request->data)):
				$this->Session->setFlash('Materia Agregada');
				$this->redirect(array('action'=>'index'));
			endif;
			endif;

			//agregar funcion pa el select
			$careers = $this->Course->Career->find('list');
			$users=$this->Course->User->find('list',array('conditions'=>array('group_id'=>'7')));

			$this->set(compact('careers','users'));
	}

	public function edit($id=null) {

		$this->Course->id=$id;
		if($this->request->is('get')):
			$this->request->data= $this->Course->read();
		else:
			if($this->Course->save($this->request->data)):
				$this->Session->setFlash('Materia actualizada');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
		$careers = $this->Course->Career->find('list');
		$users=$this->Course->User->find('list',array('conditions'=>array('group_id'=>'7')));
	
			$this->set(compact('careers','users'));
	}

	public function delete($id){
		if($this->request->is('get')):
			throw new MethodNotAllowedException();
			$this->redirect(array('action'=>'index'));

		else:
			if($this->Course->delete($id)):
				$this->Session->setFlash('Materia Eliminada');
				$this->redirect(array('action'=>'index'));

			endif;
		endif;
	}

	public function agregarHorario($course_id=null, $career_id=null){
		$this->Course->id=$course_id;
		$this->Course->career_id=$career_id;


		if($this->request->is('post')):
				if($this->Course->CourseModule->saveAll($this->request->data['CourseModule'])):
				// debug($this->request->data);
				$this->Session->setFlash('modulo registrado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;

		$opciones=$this->Course->find('all',array('conditions'=>array('Course.id'=>$course_id)));
		$careers=$this->Course->Career->find('list',array('conditions'=>array('Career.id'=>$career_id)));
		$courses=$this->Course->find('list',array('conditions'=>array('Course.id'=>$course_id)));
		// pr($opciones);

		$grupos=$this->Grupo->find('list',array('conditions'=>array(
			'Grupo.period'=>$opciones[0]['Course']['semester'],
			'Grupo.career_id'=>$opciones[0]['Course']['career_id'])));
		// pr($grupos);

		$this->set(compact('careers','courses','grupos'));
	}


 	public function tienemod($course_id){
		$this->RequestHandler->respondAs('json');
		$mensaje=' ';
 		$this->Course->CourseModule->course_id=$course_id;
 		//variable para opbtener el semestre mas actual
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
 		$existe= $this->Course->CourseModule->find('count',array('conditions'=>array('CourseModule.course_id'=>$course_id)));
 		// $existe= $this->Course->CourseModule->find('count',array('conditions'=>array('CourseModule.created BETWEEN ? AND ? '=>array(
 		// 	$inicio,$fin),
 		// 'CourseModule.course_id'=>$course_id)));

 		if($existe >= 1){
 			$mensaje='✓';
 		} else {
 			$mensaje= '✖';
 		}

 		$this->layout='ajax';
 		$this->set(compact('mensaje'));
 		// if($existe > 0){
 		// 	$tiene='*';
 		// 	// echo '<span>'.$tiene.'</span>';
 			
 		// }else {
 		// 	$tiene='no';
 		// 	// echo '<span>'.$tiene.'</span>';
 			
 		// }

 	}

 	public function tienecrit($course_id){
 		$this->Course->Goal->course_id=$course_id;
 		$itera=3;
 		$tiene='';

 		for ($x=1;$x<=$itera;$x++){
 		$existe=$this->Course->Goal->find('count',array('conditions'=>array('Goal.course_id'=>$course_id,'Goal.parcial'=>$x)));
 		
 		if($existe > 0){
 			echo '1';
 		}else {
 			echo '0';
 		}

 		}
 		// $this->set('existe',$existe);
 	

 	}


 	function getCoursesByUserId($user_id) {
 		// $this->User->id=$id;
 		$this->RequestHandler->respondAs('json');

 		$courses=$this->Course->find('all',
 			array('conditions'=>array('Course.user_id'=>$user_id),
 			'recursive'=>-1));

 		$this->set('courses',$courses);
 		$this->layout='ajax';

 	}

 	//funcion ajax para listar materias por carrera y cuatrimestre para cada coordinador
 	public function getcoursesbycoordinator($career_id,$semester) {
 		$this->RequestHandler->respondAs('json');
 		$materias= $this->Course->find('all',array('conditions'=>array(
 			'Course.career_id'=>$career_id,
 			'Course.semester'=>$semester),
 		'recursive'=> -1));
 		$this->set('materias',$materias);
 		$this->layout='ajax';




 	}

 	public function vermodulos($course_id) {

 		$existe=$this->CourseModule->find('count',array(
 			'conditions'=>array(
 				'CourseModule.course_id'=>$course_id)));
 		if($existe > 0 ){
 				if($this->request->is('post')):
 			// debug($this->request->data);
 			if($this->Course->CourseModule->saveAll($this->request->data['CourseModule'])):
 				$this->Session->setFlash('modulos actualizados');
				$this->redirect(array('action'=>'index'));
				endif;
			endif;

			$modulos= $this->CourseModule->find('all',array('conditions'=>array(
				'course_id'=> $course_id)));
			$this->set(compact('modulos'));

 		}else {
 			$this->Session->setFlash('No existen modulos registrados para este curso ');
 			$this->redirect(array('action'=>'index'));
 		}


 	
 	}

 	public function eliminamodulos($id,$id_course) {

 			if($this->request->is('get')):
			throw new MethodNotAllowedException();
			$this->redirect(array('action'=>'index'));

		else:
			if($this->CourseModule->delete($id)):
				$this->Session->setFlash('Modulo Eliminado');
				$this->redirect(array('action'=>'vermodulos',$id_course));

			endif;
		endif;

 	}

public function asignarProfesor($materia_id){
$datos=$this->Course->find('all',array('conditions'=>array(
		'Course.id'=>$materia_id),
	'recursive'=>-1));
$grupos=$this->Grupo->find('list',array('conditions'=>array(
			'Grupo.period'=>$datos[0]['Course']['semester'],
			'Grupo.career_id'=>$datos[0]['Course']['career_id'])));

$profesores=$this->User->find('list',array('conditions'=>array('User.group_id'=>7)));

$this->set(compact('grupos','datos','profesores'));

	
}

public function getgroupsbycourse($materia_id=null){
	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
		
	$datos=$this->Course->find('all',array('conditions'=>array(
		'Course.id'=>$materia_id),
	'recursive'=>-1));
	if($this->request->is('ajax') && $materia_id !== ' '){
$grupos=$this->Grupo->find('all',array('conditions'=>array(
			'Grupo.period'=>$datos[0]['Course']['semester'],
			'Grupo.career_id'=>$datos[0]['Course']['career_id']),
			'recursive'=>-1));

$this->set(compact('grupos'));
	}else {
	

}
}



}