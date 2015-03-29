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

public function add($user_id=null,$course_id=null) {
	$this->Course->id=$course_id;
	$this->User->id=$user_id;

	if ($this->request->is('post')):
		$this->Goal->create();

		if($this->Goal->saveAll($this->request->data['Goal'])):
			
			// debug($this->request->data);
			$this->Session->setFlash('Criterio Guardado con exito!!');
			// $this->redirect(array('action'=>'index'));
		endif;

	endif;


	// $users=$this->User->find('list',array('conditions'=>array('User.group_id'=>7)));
	// $grupos=$this->Grupo->find('list');

	$this->set(compact('user_id','course_id'));
}
	

}

?>