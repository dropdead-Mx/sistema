<?php 

class GroupsController extends AppController {
	public $helpers=array('Form','Html');
	public $components=array('Session');



	public function index() {

		$this->set('grupos',$this->Group->find('all'));

	}

	public function add()  {

		if($this->request->is('post')):
			$this->Group->create();
			if($this->Group->save($this->request->data)):
				$this->Session->setFlash('Grupo agregado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
	}


		public function edit($id=null)  {
			$this->Group->id=$id;
		if($this->request->is('get')):
			$this->request->data=$this->Group->read();
		else:
			if($this->Group->save($this->request->data)):
				$this->Session->setFlash('Grupo actualizado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
	}

	public function delete($id){
		if($this->request->is('get')):
			throw new MethodNotAllowedException();
		else:
			if($this->Group->delete($id)):
				$this->Session->setFlash('Grupo eliminado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
	}


}


?>