<?php 

class GoalsController extends AppController {

public $components=array('Session','RequestHandler');
public $helpers=array('Html','Form','Js');
public $uses=array('Goal','User','Course','Grupo');


public function index() {

}

public function add() {

	if ($this->request->is('post')):
		$this->Goal->create();

		if($this->Goal->saveAll($this->request->data['Goal'])):
			
			// debug($this->request->data);
			$this->Session->setFlash('Criterio Guardado con exito!!');
			// $this->redirect(array('action'=>'index'));
		endif;

	endif;


	$users=$this->User->find('list',array('conditions'=>array('User.group_id'=>7)));
	$grupos=$this->Grupo->find('list');

	$this->set(compact('users','grupos'));
}
	

}

?>