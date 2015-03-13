<?php 

class CoursesController extends AppController {

	public $helpers=array('Form','Html');
	public $components=array('Session');


	public function index(){

		$this->set('materias',$this->Course->find('all'));

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

	public function addModule($id=null, $career_id=null){
		$this->Course->id=$id;
		$this->Course->career_id=$career_id;


		if($this->request->is('post')):
				if($this->Course->CourseModule->saveAll($this->request->data['CourseModule'])):
				// debug($this->request->data);
				$this->Session->setFlash('modulo registrado');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
		$careers=$this->Course->Career->find('list',array('conditions'=>array('Career.id'=>$career_id)));
		$courses=$this->Course->find('list',array('conditions'=>array('Course.id'=>$id)));

		$this->set(compact('careers','courses'));

	}
}