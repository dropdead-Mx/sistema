<?php 

class GoalsController extends AppController {

public $components=array('Session','RequestHandler');
public $helpers=array('Html','Form','Js');
public $uses=array('Goal','User','Course','Grupo');

public function beforeFilter(){
	parent::beforeFilter();
	// $this->Auth->allow();
}
public function isAuthorized($user){


	// return parent::isAuthorized($user);


	 if ($user['group_id']== '7' ){

		if(in_array($this->action,array('index','add'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
			}
		}

	}

	return parent::isAuthorized($user);

}

public function index() {

// $this->Goal->User->id=$id;
// $goals=$this->Goal->find('all',array('conditions'=>array('Goal.user_id'=>$id)));
// $this->set('gloals',$goals);

}

public function add($course_id=null,$partial=null,$grupo=null) {
	$this->Course->id=$course_id;
	
	$partial;

	$rango=$this->Auth->User('group_id');

	if($rango == 7){

	$user_id=$this->Auth->User('id');

	

	if ($this->request->is('post')):
		$this->Goal->create();

		if($this->Goal->saveAll($this->request->data['Goal'])):
			
			// debug($this->request->data);
			$this->Session->setFlash('Criterio Guardado con exito!!','default',array('class'=>'mensajeOk'));
			$this->redirect(array('controller'=>'users','action'=>'viewmycourses'));
		endif;

	endif;


	$materia=$this->Course->find('list',array('conditions'=>array('Course.id'=>$course_id)));
	// $grupos=$this->Grupo->find('list');

	$this->set(compact('user_id','course_id','materia','partial','grupo'));
	}
}
	

}

?>