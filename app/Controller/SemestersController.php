<?php  

class SemestersController extends AppController {
	public $helpers=array('Html','Form','Js');


	public function index(){
		
	}
	public function registrarcuatrimestre(){

	if($this->request->is('post')):
		if($this->Semester->save($this->request->data)):
			$this->Session->setFlash('Cuatrimestre registrado exitosamente');
			$this->redirect(array('action'=>'index'));
			debug($this->request->data);
			
			endif;
		endif;
}

}

?>