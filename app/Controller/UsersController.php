<?php 

class UsersController extends AppController {

public $helpers=array('Html','Form','Js');
public $components=array('Session');
var $uses = array('User', 'StudentProfile','Career','Grupo','EmployeeProfile','Group','Course','Goal','Obtainedgoal','Usrcareer');


public function index() {

$this->layout='coordinador';

}


public function addStudent(){
	$this->User->virtualFields['name']='User.name';

	
	if($this->request->is('post')):
		$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$matricula=$this->request->data['StudentProfile']['matricula'];

	$existeperfil=$this->StudentProfile->find('count',array('conditions'=>array(
		'StudentProfile.matricula'=>$matricula)));

	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe >0  && $existeperfil > 0 ){
		$this->Session->setFlash('Este usuario ya existe registra uno nuevo porfavor');
		$this->request->data=' ';
	}else {

			if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Estudiante agregado');
			// debug($existe);
			$this->redirect(array('action'=>'indexStudent'));
			endif;}


	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		// pr($careers);
		$this->set(compact('careers'));
}

public function editStudent($id=null) {
		$this->User->id=$id;
	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();
		


	else:
		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Estudiante agregado');
			$this->redirect(array('action'=>'indexStudent'));
			endif;
	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		$grupos  = $this->User->StudentProfile->Grupo->find('list');
		$this->set(compact('careers','grupos'));


}

public function deleteStudent($id){
	$this->User->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->User->delete($id)):
			$this->Session->setFlash('Estudiante eliminado');
			$this->redirect(array('action'=>'indexStudent'));
		endif;
	endif;
		

}
public function indexStudent() {

	$this->set('estudiantes',$this->User->StudentProfile->find('all',array('conditions'=>array('User.group_id'=>8))));
}


public function addTeacher(){
	$this->User->virtualFields['name']='User.name';


	if($this->request->is('post')):
	$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$matricula=$this->request->data['StudentProfile']['matricula'];


	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe > 0 ){

		$this->Session->setFlash('El usuario que intentas registrar ya existe ingresa uno nuevo');
		$this->request->data=' ';

	}else {

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Maestro agregado');
			$this->redirect(array('action'=>'indexTeacher'));
			endif;
		}
	endif;


}


public function editTeacher($id= null){

			$this->User->id=$id;


	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();

	else:
		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Perfil actualizado');
			$this->redirect(array('action'=>'indexTeacher'));
			endif;
	endif;


}
public function deleteTeacher($id){
	$this->User->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->User->delete($id)):
			$this->Session->setFlash('Profesor eliminado');
			$this->redirect(array('action'=>'indexTeacher'));
		endif;
	endif;
		

}
public function indexTeacher() {
	$this->set('maestros',$this->User->EmployeeProfile->find('all',array('conditions'=>array('User.group_id'=>'7'))));

}

public function viewmycourses($id){
$this->User->id=$id;
$courses=$this->User->Course->find('all',array('conditions'=>array('Course.user_id'=>$id)));
$this->set('courses',$courses);
}

public function calificar($course_id=null,$semester=null,$career_id=null,$parcial){

	$this->Course->id=$course_id;
	$this->Course->semester=$semester;
	$this->Career->id=$career_id;


	if($this->request->is('post')):
		if($this->User->Obtainedgoal->saveAll($this->request->data['Obtainedgoal'])):
			$this->Session->setFlash('Calificaciones Asignadas correctamente');
			$this->redirect(array('action'=>'index'));
			endif;
		endif;

	$estudiantes=$this->User->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester '=>$semester)
		));
	// Agregar funcion ajax para criterios de evaluacion por parcial
	$critdevaluacion=$this->Goal->find('all',array('conditions'=>array(
		'Goal.course_id'=>$course_id,'Goal.parcial'=>$parcial)));
	$materia = $this->Course->find('list',array('conditions'=>array('Course.id'=>$course_id)));

	$this->set(compact('estudiantes','critdevaluacion','materia','partial'));

}



public function addcoordi(){
	// $this->Career->virtualFields['name']='Career.name';
	$this->User->virtualFields['name']='User.name';

	if($this->request->is('post')):
		$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	


	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe > 0 ){

		$this->Session->setFlash('El usuario que intentas registrar ya existe ingresa uno nuevo');
		$this->request->data=' ';

	}else {


		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Coordinador registrado con exito');
			$this->redirect(array('action'=>'index'));
			
		endif;
	}
	endif;


}

public function indexcoordinator(){
	$coordinators = $this->User->find('all',array('conditions'=>array('User.group_id'=>6)));
	$this->set('coordinators',$coordinators);

}

public function assigncareers($id=null){
	$guardar=[];
	$this->User->id= $id;
	$selected=$this->Usrcareer->find('list',array('fields'=>'career_id'));
	// echo sizeof($selected);
	// debug($selected);
if(count($selected) ===10){

	$this->Session->setFlash('Por el momento no hay carreras para asignar disponibles elimina carreras a los cordinadores e intenta de nuevo');
	$this->redirect(array('action'=>'indexcoordinator'));

	} else { 

	if($this->request->is('post')):

		$contador = count($this->request->data['Usrcareer']);

		//elimina del requestdata todos los elementos no seleccionados
		for($z=0 ; $z< $contador ; $z++ ){
			if(count($this->request->data['Usrcareer'][$z]) == 2 ){
				array_push($guardar,$this->request->data['Usrcareer'][$z]);

			}
		}
		//guarda los elementos que fueron seleccionados y guardados en el nuevo arreglo 
		if($this->Usrcareer->saveAll($guardar)):
			$this->Session->setFlash('Carreras a coordinar asignadas');
			$this->redirect(array('action'=>'indexcoordinator'));

		endif;
	endif;
}


	// debug($selected);
	$careers=$this->Career->find('all',array('fields'=>array('Career.id','Career.name'),'conditions'=>array('Career.id !='=>$selected)));
	$teacher=$this->User->find('list',array('conditions'=>array('User.id'=>$id)));

	$this->set(compact('id','careers','teacher','selected'));

}


public function vercarreras($id){
	$this->User->id =$id;

	$carreras=$this->Usrcareer->find('list',array('conditions'=>array('Usrcareer.user_id'=>$id),'fields'=>array('Usrcareer.career_id')));
	
	// $idreg=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$id)));
	$todo = $this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$id)));
	
	$nombre =$this->User->find('list',array('conditions'=>array('User.id'=>$id),'fields'=>'User.name'));
	$career=$this->Career->find('all',array('fields'=>array('Career.id','Career.name'),'conditions'=>array('Career.id'=>$carreras)));
	$this->set(compact('career','id','nombre','todo'));
	// pr($todo);



}

public function eliminacc($id,$user_id){
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->Usrcareer->delete($id)):
			$this->Session->setFlash('Carrera liberada');
			$this->redirect(array('action'=>'vercarreras',$user_id));
			endif;
		endif;

}


}




?>