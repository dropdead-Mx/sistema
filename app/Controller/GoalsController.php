<?php 

class GoalsController extends AppController {

public $components=array('Session','RequestHandler');
public $helpers=array('Html','Form','Js');
public $uses=array('Goal','User','Course','Grupo');


public function index() {

// $this->Goal->User->id=$id;
// $goals=$this->Goal->find('all',array('conditions'=>array('Goal.user_id'=>$id)));
// $this->set('gloals',$goals);

}

public function add($user_id=null,$course_id=null,$partial=null) {
	$this->Course->id=$course_id;
	$this->User->id=$user_id;
	$partial;

	

	if ($this->request->is('post')):
		$this->Goal->create();

		if($this->Goal->saveAll($this->request->data['Goal'])):
			
			// debug($this->request->data);
			$this->Session->setFlash('Criterio Guardado con exito!!');
			$this->redirect(array('controller'=>'users','action'=>'viewmycourses',$user_id));
		endif;

	endif;


	$materia=$this->Course->find('list',array('conditions'=>array('Course.id'=>$course_id)));
	// $grupos=$this->Grupo->find('list');

	$this->set(compact('user_id','course_id','materia','partial'));
}
	

}

?>