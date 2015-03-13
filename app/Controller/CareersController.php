<?php 

class CareersController extends AppController {

	// se define que helpers se usaran
	public $helpers =array('Html','Form','Js');
	//se define el comente session para mndar mensaje de cuando se guarda un registro
	public $components= array('Session', 'RequestHandler');


	public function index() {

		//el metodo set permite colocar algo para que sea utlisado por las vistas
		$this->set('carreras',$this->Career->find('all'));

	}


	public function add() {

		// checa si el formulario es post 
		if($this->request->is('post')):
			//si se pueden guardar los datos en la db
			if($this->Career->save($this->request->data)):
				$this->Session->setFlash('Carrera registrada');
				$this->redirect(array('action'=>'index'));
				endif;
			endif;

	}


	public function edit($id =null) {
		//obtiene el id 
		$this->Career->id = $id;
		//si es peticion get solo lee los campos y los rellena con los datos 
		if ($this->request->is('get')):
			$this->request->data = $this->Career->read();
		else:
			if($this->Career->save($this->request->data)):
				$this->Session->setFlash('Datos guardados');
			$this->redirect(array('action'=> 'index'));
			endif;
		endif;
	}

	public function delete($id) {
		// si es peticion get no se permite eliminar
		if($this->request->is('get')):
			throw new MethodNotAllowedException();
			$this->redirect(array('action'=>'index'));

		else:
			if ($this->Career->delete($id)):
				$this->Session->setFlash('Carrera eliminada');
				$this->redirect(array('action'=>'index'));
			endif;
		endif;
	}

	function getGroupsByCareerId($career_id) {
		// Esto te obtiene los grupos de la carrera, verdad
		// $career_id = $this->request->data['Careesir']['career_id'];
		// pr($career_id);
		$this->RequestHandler->respondAs('json');
		$subgroups = $this->Career->Grupo->find('all', array(
			'conditions' => array('Grupo.career_id' => $career_id),
			'recursive' => -1
		));
		// pr($subgroups);

		 
		$this->set('subgroups',$subgroups);
		$this->layout = 'ajax';
	}




		function getCoursesByCareerId($career_id) {
		// Esto te obtiene los grupos de la carrera, verdad
		// $career_id = $this->request->data['Careesir']['career_id'];
		// pr($career_id);
		$this->RequestHandler->respondAs('json');
		$courses= $this->Career->Course->find('all', array(
			'conditions' => array('Course.career_id' => $career_id),
			'recursive' => -1
		));
		// pr($subgroups);

		 
		$this->set('courses',$courses);
		$this->layout = 'ajax';
	}
}