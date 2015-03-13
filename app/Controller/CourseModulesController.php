<?php 

class CourseModulesController extends AppController {

	public function index() {

	}


	public function add(){
		if($this->request->is('post')):
			if($this->CourseModule->saveAll($this->request->data['CourseModule'])):
				debug($this->data);
				$this->Session->setFlash('Modulos Agregados');
				// $this->redirect(array('controller'=>'users','action'=>'index'));
				// $this->redirect(array('action'=>'add'));

			endif;

		endif;

		$careers=$this->CourseModule->Career->find('list');
		$courses=$this->CourseModule->Course->find('list');

		$this->set(compact('careers'));
	}
}

?>