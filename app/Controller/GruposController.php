<?php 

class GruposController extends AppController {

	public $helpers =array('Html','Form','Js');
	public $components=array('Session');
	public $uses=array('Grupo','Career');


public function index() {

	$this->set('grupos',$this->Grupo->find('all'));
}


public function add() {

	if($this->request->is('post')):
		if($this->Grupo->save($this->request->data)):
			$this->Session->setFlash('grupo agregado');
			$this->redirect(array('action'=>'index'));
			
		endif;
	endif;
	$careers=$this->Grupo->Career->find('list');
	$this->set(compact('careers'));
}

public function edit($id=null){
	$this->Grupo->id=$id;

	if($this->request->is('get')):
		$this->request->data=$this->Grupo->read();
	else:
		if($this->Grupo->save($this->request->data)):
			$this->Session->setFlash('Grupo Actualizado');
			$this->redirect(array('action'=>'index'));
		endif;
	endif;
	$careers=$this->Grupo->Career->find('list');
	$this->set(compact('careers'));

}

public function delete($id) {

	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->Grupo->delete($id)):
			$this->setFlash('Grupo Eliminado');
			$this->redirect(array('action'=>'index'));
		endif;
	endif;
}




}