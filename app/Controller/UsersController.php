<?php 

class UsersController extends AppController {

public $helpers=array('Html','Form','Js');
public $components=array('Session');
var $uses = array('User', 'StudentProfile','Career','Grupo','EmployeeProfile','Group','Course');


public function index() {

$this->layout='coordinador';

}


public function addStudent(){

	if($this->request->is('post')):
		$this->User->create();
		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Estudiante agregado');
			$this->redirect(array('action'=>'indexStudent'));
			endif;
	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		$this->set(compact('careers'));
}

public function editStudent($id=null) {
		$this->User->id=$id;

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

	if($this->request->is('post')):
		$this->User->create();
		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Maestro agregado');
			$this->redirect(array('action'=>'indexTeacher'));
			endif;
	endif;


}


public function editTeacher($id= null){

			$this->User->id=$id;

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


}




?>