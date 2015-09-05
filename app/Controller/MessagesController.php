<?php 

class MessagesController extends AppController {

public $helpers=array('Form','Html','Js');
public $components=array('Session','RequestHandler');
public $uses=array('User','Message','Semester');

public function beforeFilter(){
	parent::beforeFilter();
	// $this->Auth->allow();
}

public  function isAuthorized($user){


	 if ($user['group_id']==6 || $user['group_id']==7 ){

		if(in_array($this->action,array('index','listamensaje','leermensaje','leido','contador','enviarmensaje',))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));
				
			}
		}

	}

	// 	 if ($user['group_id']==7 ){

	// 	if(in_array($this->action,array('enviarmensaje','index','leermensaje'))){
	// 		return true;
	// 	}else {
	// 		if($this->Auth->user('id')){
	// 			$this->Session->setFlash('no se puede acceder');
	// 			// $this->redirect($this->Auth->redirect());
	// 			$this->redirect(array('controller'=>'users','action'=>'index'));
				
	// 		}
	// 	}

	// }

	return parent::isAuthorized($user);
}


public function index(){

	// $cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	// 	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	// 	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
	// $dest=$this->Auth->User('id');

	// $mensajes=$this->Message->find('count',array('conditions'=>array(
	// 	'Message.created BETWEEN ? AND ?'=>array($inicio,$fin),
	// 	'Message.destinatario'=>$dest,
	// 	'Message.status'=>1),'order'=>array('Message.id DESC')));

	// $this->set(compact('mensajes'));

}

public function enviarmensaje(){

	// $this->User->id=$user_id;
	$user_id=$this->Auth->User('id');
	$rango=$this->Auth->User('group_id');

	$coordinadores=$this->User->find('list',array('conditions'=>array('User.group_id'=>6),'recursive'=>-1,'fields'=>array(
		'id','name')));
	$maestros=$this->User->find('list',array('conditions'=>array('User.group_id'=>7),'recursive'=>-1,'fields'=>array(
		'id','name')));

	if($this->request->is('post')):
		if($this->Message->save($this->request->data)):
			$this->Session->setFlash('Mensaje enviado ');
			$this->redirect(array('controller'=>'users','action'=>'index'));
		endif;
	endif;

	$this->set(compact('coordinadores','user_id','maestros','rango'));

}

public function leermensaje($fechaActual){
	// $this->RequestHandler->respondAs('json');
	// $fechaActual=date('Y-m-d H:i:s');

	$ultimomensaje=$this->Message->find('first',array('order'=>'id DESC','fields'=>'hora'));
	$mensaje=$this->Message->find('first',array('order'=>'id DESC','recursive'=>-1));

	$horaDb= strtotime($ultimomensaje['Message']['hora']);

	// while($horaDb<= $fechaActual){

	// $timestamp=$this->Message->find('first',array('order'=>'id DESC','fields'=>'hora'));
	
	// }

	if($horaDb < $fechaActual){
	// echo ' ';http://localhost/sistema/messages
	// $this->set(compact('mensaje'));

	}else if($fechaActual == $horaDb){
		
	$this->set(compact('mensaje'));
	}
	$this->layout='ajax';
	// $this->set(compact('mensaje'));

}
public function contador(){
	$dest=$this->Auth->User('id');
	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

		$total=$this->Message->find('count',array('conditions'=>array(
		'Message.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'Message.destinatario'=>$dest,
		'Message.status'=>1),'order'=>array('Message.id DESC')));

	
	$this->set(compact('total'));


}
public function listamensaje(){

	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$dest=$this->Auth->User('id');
	$this->RequestHandler->respondAs('json');

	$op=$this->Message->find('all',array('conditions'=>array(
		'Message.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'Message.destinatario'=>$dest),'order'=>array('Message.id DESC')));
	for($x=0;$x<sizeof($op);$x++){

		$nombre=$this->User->find('all',array('conditions'=>array(
			'User.id'=>$op[$x]['Message']['remitente'])));
		$mensajes[]['Message']=array(
			'id'=>$op[$x]['Message']['id'],
			'remitente'=>$op[$x]['Message']['remitente'],
			'destinatario'=>$op[$x]['Message']['destinatario'],
			'subject'=>$op[$x]['Message']['subject'],
			'mensaje'=>$op[$x]['Message']['mensaje'],
			'hora'=>$op[$x]['Message']['hora'],
			'status'=>$op[$x]['Message']['status'],
			'created'=>$op[$x]['Message']['created'],
			'modified'=>$op[$x]['Message']['modified'],
			'nombre_remitente'=>$nombre[0]['User']['name']);
	}


	$this->layout='ajax';
	$this->set(compact('mensajes'));


}

public function leido($message_id){

	// $this->autoRender = false;
	$this->RequestHandler->respondAs('json');


    if($this->RequestHandler->isAjax()) {
	// $this->data['Message']['id']=$message_id;
	// $this->data['Message'][]
	$data=array('id'=>$message_id,'status'=>0);
	debug($data);

	if($this->Message->save($data,false)){
		$mensaje='actualizado';
		// $this->Session->setFlash('actualizado');
	}


	}
		$this->layout='ajax';
		$this->set(compact('mensaje'));



}

}

 ?>