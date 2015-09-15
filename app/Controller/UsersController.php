<?php 

class UsersController extends AppController {

public $helpers=array('Html','Form','Js');
public $components=array('Session','RequestHandler','Email');
public $uses = array('User', 'StudentProfile','Career','Grupo','EmployeeProfile','Group','Course','Goal','Obtainedgoal','Usrcareer','CourseModule','Assist','Exam','Semester','Teachercourse','PartialScore');

	

public function beforeFilter(){
	parent::beforeFilter();
	// $this->Auth->allow('indexcoordinator','indexTeacher','vercalificaciones','materiasporgerarquia','index');
	$this->Auth->allow('gruposxcarreraycuatri','consultarasistencias','fechashorarios','materiasporgerarquia','cerrarcuatri','agregardirector');
	
	// if ($this->Auth->loggedIn()) {
	// $this->Auth->deny('login');
	// }


}


public function isAuthorized($user){

		if ($user['group_id']== '5' ){

		if(in_array($this->action,array('fechashorarios','consultarhorarios','vercalificaciones','consultarcalificaciones','materiasporgerarquia','consultarasistencias','verasistencias','indexStudent','buscaralumnos','gruposxcarreraycuatri','index','indexcoordinator','indexTeacher','editacoordinador','eliminarcoordi','addcoordi','vercarreras','assigncareers','eliminacc'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));

			}
		}

	}

		if ($user['group_id']== '6' ){

		if(in_array($this->action,array('fechashorarios','consultarhorarios','consultarasistencias','verasistencias','buscaralumnos','gruposxcarreraycuatri','materiasporgerarquia','consultarcalificaciones','index','vercalificaciones','addTeacher','editTeacher','indexStudent','indexTeacher','addStudent','deleteStudent','deleteTeacher','editStudent','editarasistencia','editarcalificacion','editacoordinador'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));

			}
		}

	}


	if ($user['group_id']== '7' ){

		if(in_array($this->action,array('index','viewmycourses','calificar','asistencias','cuatrimestral','misclases','editTeacher','extraordinario','consultacalif'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder','default',array('class'=>'mensajeError'));
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));

			}
		}

	}

	if($user['group_id']=='8'){
		
		if(in_array($this->action,array('alumno','index','examenes','horario','getassists'))){
			return true;
		}else {
			if($this->Auth->user('id')){
				$this->Session->setFlash('no se puede acceder');
				// $this->redirect($this->Auth->redirect());
				$this->redirect(array('controller'=>'users','action'=>'index'));

			}
		}
	}
	// return parent::isAuthorized($user);




	return parent::isAuthorized($user);

}

public function login(){

	if ($this->Auth->loggedIn()) { 
		$this->Session->setFlash('ya te encuentras logueado','default',array('class'=>'mensajeError'));
		$this->redirect(array('action'=>'index'));

	} else {

		if($this->request->is('post')){
		
			
			if($this->Auth->login()){
				
				return $this->redirect($this->Auth->redirectUrl());

	
			}
			// debug($this->Auth->login());
			$this->Session->setFlash('Tu usuario/contraseña son incorrectos','default',array('class'=>'mensajeError'));
		}
	}

	}

public function logout(){
		return $this->redirect($this->Auth->logout());
	}


public function index() {

//$this->layout='coordinador';
	if($this->Auth->user('group_id')== 5){
		$this->layout='director';
	 }

	


}

public function agregardirector(){

	$this->User->virtualFields['name']='User.name';

	if($this->request->is('post')):
		$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$lv=$this->request->data['EmployeeProfile']['lv_education'];
	


	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe > 0 ){

		$this->Session->setFlash('El usuario que intentas registrar ya existe ingresa uno nuevo');
		$this->request->data=' ';

	}else {
		$simbolos=['@','#','$'];
		$password=$simbolos[rand(0,2)].$lv.$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);

		// $this->request->data['User']['password']=$password;
		$this->request->data['User']['password']='contraseña';



		// $email = new CakeEmail('default');
			// $email->to($correo);
			// $email->from(array('unidorados@universidaddorados.com'=>'Plataforma universidad dorados'));
			// $email->subject('Registro en la plataforma universidad dorados');
			// $email->send('Tu correo de acceso a la plataforma es : '.$correo.' Y tu contraseña : '.$password);

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Director registrado con exito');
			$this->redirect(array('action'=>'index'));
			
		endif;
	}
	endif;



}
public function addStudent(){
	$this->User->virtualFields['name']='User.name';

	
	if($this->request->is('post')):
		$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$matricula=$this->request->data['StudentProfile']['matricula'];

	$existeperfil=$this->StudentProfile->find('count',array('conditions'=>array(
		'StudentProfile.matricula'=>$matricula)));

	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe >0  && $existeperfil > 0 ){
		$this->Session->setFlash('Este usuario ya existe registra uno nuevo porfavor');
		$this->request->data=' ';
	}else {
			$simbolos=['@','#','$'];
			$abrev=$this->Career->find('first',array('conditions'=>array(
				'Career.id'=>$this->request->data['StudentProfile']['career_id']),
				'fields'=>'Career.abrev','recursive'=>-1));
		
			$password=$simbolos[rand(0,2)].$abrev['Career']['abrev'].$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);

			$this->request->data['User']['password']=$password;

			// $email = new CakeEmail('default');
			// $email->to($correo);
			// $email->from(array('unidorados@universidaddorados.com'=>'Plataforma universidad dorados'));
			// $email->subject('Registro en la plataforma universidad dorados');
			// $email->send('Tu correo de acceso a la plataforma es : '.$correo.' Y tu contraseña : '.$password);

			
			if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Estudiante agregado');
			// debug($existe);
			// debug($this->request->data);
			$this->redirect(array('action'=>'index'));
			endif;
		}


	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		// pr($careers);
		$this->set(compact('careers'));
}

public function editStudent($id=null) {

	if($this->Auth->User('group_id')==8){
		$id=$this->Auth->User('id');
		$this->User->id=$id;

	}else {
		
	$this->User->id=$id;
	}


	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();
		


	else:

		if($this->Auth->User('group_id')==6){

		$nombre=$this->request->data['User']['name'];
		$ap=$this->request->data['User']['apat'];
		$am=$this->request->data['User']['amat'];

		$simbolos=['@','#','$'];
			$abrev=$this->Career->find('first',array('conditions'=>array(
				'Career.id'=>$this->request->data['StudentProfile']['career_id']),
				'fields'=>'Career.abrev','recursive'=>-1));
		
			$password=$simbolos[rand(0,2)].$abrev['Career']['abrev'].$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);

			$this->request->data['User']['password']=$password;
			// echo $password;

			//agregar funcion mail ya que este subido al server
		}

			//agregar funcion mail ya que este subido al server
		

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Perfil modificado contraseña enviada a correo electronico indicado');
			$this->redirect(array('action'=>'indexStudent'));
			endif;
	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		$grupos  = $this->User->StudentProfile->Grupo->find('list');
		$this->set(compact('careers','grupos'));


}

public function deleteStudent($id){
	$this->User->id=$id;
	if($this->Auth->User('group_id')==6){
		// throw new MethodNotAllowedException();
	
		if($this->User->delete($id)){
			$this->Session->setFlash('Estudiante eliminado','default',array('class'=>'mensajeOk'));
			$this->redirect(array('action'=>'index'));
		};
	}else {
		$this->Session->setFlash('No tienes acceso a esta opcion','default',array('class'=>'mensajeError'));
			$this->redirect(array('action'=>'index'));
	}
		

}

public function gruposxcarreraycuatri($carrera,$cuatri){
	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';

	if($this->request->is('ajax') && $carrera >0 && $cuatri >0){

		$grupos=$this->Grupo->find('all',array('conditions'=>array(
			'Grupo.career_id'=>$carrera,'Grupo.period'=>$cuatri),'recursive'=>-1));
		$this->set(compact('grupos'));
	}
}

public function buscaralumnos($carrera,$cuatri,$grupo){

	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';

	if($this->request->is('ajax')){

	$alumnos=$this->User->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.career_id'=>$carrera,
		'StudentProfile.semester'=>$cuatri,
		'StudentProfile.grupo_id'=>$grupo),
		'fields'=>array(
			'User.name','User.email','User.id','StudentProfile.matricula')));

	
	$this->set(compact('alumnos'));
	}

}
public function indexStudent() {

	// $this->set('estudiantes',$this->User->StudentProfile->find('all',array('conditions'=>array('User.group_id'=>8))));
	if($this->Auth->User('group_id')==5){
		$carreras=$this->Career->find('all',array('recursive'=>-1));
		$this->set(compact('carreras'));
	

	}

	else if($this->Auth->User('group_id')==6){
		$carreras=[];

		$miscarreras=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$this->Auth->User('id'))));

		foreach($miscarreras as $k => $carrera){

			array_push($carreras,$this->Career->find('all',array('conditions'=>array(
				'Career.id'=>$carrera['Usrcareer']['career_id']),'recursive'=>-1)));


		}



		$this->set(compact('carreras'));
	}
}


public function addTeacher(){
	$this->User->virtualFields['name']='User.name';


	if($this->request->is('post')):
	$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$lv=$this->request->data['EmployeeProfile']['lv_education'];
	// $matricula=$this->request->data['StudentProfile']['matricula'];


	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe > 0 ){

		$this->Session->setFlash('El usuario que intentas registrar ya existe ingresa uno nuevo');
		$this->request->data=' ';

	}else {

		$simbolos=['@','#','$'];
		
		$password=$simbolos[rand(0,2)].$lv.$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);

			$this->request->data['User']['password']=$password;

			// $email = new CakeEmail('default');
			// $email->to($correo);
			// $email->from(array('unidorados@universidaddorados.com'=>'Plataforma universidad dorados'));
			// $email->subject('Registro en la plataforma universidad dorados');
			// $email->send('Tu correo de acceso a la plataforma es : '.$correo.' Y tu contraseña : '.$password);

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Maestro agregado');
			$this->redirect(array('action'=>'index'));
			endif;
		}
	endif;


}


public function editTeacher($id= null){

	if($this->Auth->User('group_id')==7){
		$id=$this->Auth->User('id');
		$this->User->id=$id;
	}else {
		$this->User->id=$id;

	}




	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();

	else:
		//if para cuando lo edita un coordinador
		if($this->Auth->User('group_id')==6 ){

		$nombre=$this->request->data['User']['name'];
		$ap=$this->request->data['User']['apat'];
		$am=$this->request->data['User']['amat'];
		$correo=$this->request->data['User']['email'];
		$lv=$this->request->data['EmployeeProfile']['lv_education'];

		$simbolos=['@','#','$'];
		
		$password=$simbolos[rand(0,2)].$lv.$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);

		$this->request->data['User']['password']=$password;
		// echo $password;

			//agregar funcion mail ya que este subido al server

		}
			//agregar funcion mail ya que este subido al server

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Perfil actualizado');
			$this->redirect(array('action'=>'index'));
			endif;
	endif;


}

public function editacoordinador($id= null){

		if($this->Auth->User('group_id')==6){
			$id=$this->Auth->User('id');
			$this->User->id=$id;
		}else {
			$this->User->id=$id;

		}


	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();

	else:
		if($this->Auth->User('group_id')==5){

		$nombre=$this->request->data['User']['name'];
		$ap=$this->request->data['User']['apat'];
		$am=$this->request->data['User']['amat'];
		$correo=$this->request->data['User']['email'];
		$lv=$this->request->data['EmployeeProfile']['lv_education'];

		$simbolos=['@','#','$'];
		
		$password=$simbolos[rand(0,2)].$lv.$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);

		$this->request->data['User']['password']=$password;

			//agregar funcion mail ya que este subido al server


		}

			//agregar funcion mail ya que este subido al server


		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Perfil actualizado');
			$this->redirect(array('action'=>'index'));
			endif;
	endif;


}
public function deleteTeacher($id){
	$this->User->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->User->delete($id)):
			$this->Session->setFlash('Profesor eliminado');
			$this->redirect(array('action'=>'indexTeacher'));
		endif;
	endif;
		

}
public function eliminarcoordi($id){
	$this->User->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->User->delete($id)):
			$this->Session->setFlash('coordinador eliminado');
			$this->redirect(array('action'=>'indexcoordinator'));
		endif;
	endif;
		

}
public function indexTeacher() {
	$materiasImparte=[];
	$maestros=$this->User->EmployeeProfile->find('all',array('conditions'=>array('User.group_id'=>'7')));
	// pr($maestros);

	for($x=0;$x<sizeof($maestros);$x++){
		$profesor=$maestros[$x]['User']['id'];

		$materiasPorMaestro=$this->Teachercourse->find('all',array('conditions'=>array('Teachercourse.user_id'=>$profesor),'fields'=>array(
			'Teachercourse.user_id','Teachercourse.course_id')));


		for($k=0;$k<sizeof($materiasPorMaestro);$k++){
		// echo $materiasPorMaestro[$k]['Teachercourse']['user_id'];
		if (isset($materiasPorMaestro[$k]['Teachercourse']['course_id'])){
			// echo $materiasPorMaestro[$k]['Teachercourse']['course_id'].' ';
			$nombre=$this->Course->find('all',array('conditions'=>array('Course.id'=>$materiasPorMaestro[$k]['Teachercourse']['course_id']),
				'recursive'=>-1,'fields'=>array('Course.id','Course.name')));

			for($w=0;$w<sizeof($nombre);$w++){

			$materiasImparte[]=array(
				'teacher_id'=>$profesor,
				'course_id'=>$nombre[$w]['Course']['id'],
				'course_name'=>$nombre[$w]['Course']['name']);
			}

		}



			



		}
		




	}

	
	$this->set(compact('maestros','materiasImparte'));


}

// proxima  a modificar

public function viewmycourses(){	
	$rango=$this->Auth->User('group_id');
	if($rango == 7 ){
		$idusuario=$this->Auth->User('id');
	$nombreUsuario=
	$courses=[];
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$impartiendo=$this->Teachercourse->find('all',array('conditions'=>array('Teachercourse.created BETWEEN ? AND ? '=>array($inicio,$fin),
		'Teachercourse.user_id'=>$idusuario)));
	// pr($impartiendo);
	for($x=0;$x<sizeof($impartiendo);$x++){

		$opcion=$this->Course->find('all',array('conditions'=>array(
			'Course.id'=>$impartiendo[$x]['Teachercourse']['course_id'])));

		$courses[]['Course']=array(
			'id'=>$opcion[0]['Course']['id'],
			'name'=>$opcion[0]['Course']['name'],
			'semester'=>$opcion[0]['Course']['semester'],
			'career_id'=>$opcion[0]['Career']['id'],
			'career_name'=>$opcion[0]['Career']['name'],
			'grupo_id'=>$impartiendo[$x]['Teachercourse']['grupo_id'],
			'teacher_id'=>$idusuario

			);


	}

// $courses=$this->Course->find('all',array('conditions'=>array('Course.user_id'=>$idusuario)));
	
	// $miscursos=$this->Teachercourse->find()
$this->set(compact('courses'));

	}
	
}

public function calificar($course_id,$semester,$career_id,$parcial,$grupo){

	// $this->Course->id=$course_id;
	// $this->Course->semester=$semester;
	// $this->Career->id=$career_id;
	$rango=$this->Auth->User('group_id');
	if($rango == 7 ){

	$user_id=$this->Auth->User('id');
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
	$gpo=$this->Grupo->find('all',array('conditions'=>array(
		'Grupo.id'=>$grupo)));

	$estudiantes=$this->User->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester '=>$semester,
		'StudentProfile.grupo_id'=>$grupo)
		));


	$materia = $this->Course->find('all',array('conditions'=>array('Course.id'=>$course_id),'recursive'=>-1));
	$critdevaluacion=$this->Goal->find('all',array('conditions'=>array(
		'Goal.created BETWEEN ? AND ? '=>array($inicio,$fin),'Goal.course_id'=>$course_id,'Goal.parcial'=>$parcial,'Goal.grupo_id'=>$grupo,'Goal.user_id'=>$user_id)));
	if(sizeof($critdevaluacion) >=1 ){

	$existe=$this->Obtainedgoal->find('count',array('conditions'=>array('Obtainedgoal.created BETWEEN ? AND ?'=>array($inicio,$fin),'Obtainedgoal.user_id'=>$estudiantes[0]['User']['id'],'Obtainedgoal.goal_id'=>$critdevaluacion[0]['Goal']['id'])));
	$this->set(compact('estudiantes','critdevaluacion','materia','parcial','gpo'));
	}

	$n=sizeof($critdevaluacion);
	if( $this->request->is('get') && $n== 0 ){
		$this->Session->setFlash('no se encontraron criterios de evaluacion registrados');
		$this->redirect(array('action'=>'index'));

	}

	if( $this->request->is('post') && $existe == 0){
		// debug($this->request->data['Obtainedgoal']);
		// debug($this->request->data['PartialScore']);
	
		if($this->Obtainedgoal->saveAll($this->request->data['Obtainedgoal']) && $this->PartialScore->saveAll($this->request->data['PartialScore'])):
			$this->Session->setFlash('Calificaciones Asignadas correctamente');
			$this->redirect(array('action'=>'index'));
			endif;
		} else if($existe >=1){

		$this->Session->setFlash('Ya has evaluado este parcial');
		$this->redirect(array('action'=>'index'));
		}
	}


}



public function addcoordi(){
	// $this->Career->virtualFields['name']='Career.name';
	$this->User->virtualFields['name']='User.name';

	if($this->request->is('post')):
		$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$lv=$this->request->data['EmployeeProfile']['lv_education'];
	


	$existe =$this->User->find('count',array('conditions'=>array(
		'User.name'=>$nombre,
		'User.apat'=>$ap,
		'User.amat'=>$am,
		'User.email'=>$correo
		)));

	if($existe > 0 ){

		$this->Session->setFlash('El usuario que intentas registrar ya existe ingresa uno nuevo');
		$this->request->data=' ';

	}else {
		$simbolos=['@','#','$'];
		//$password=$simbolos[rand(0,2)].$lv.$nombre[0].$ap[0].$am[0].date("Y").rand(10,90);
		$password='contraseña';

		$this->request->data['User']['password']=$password;

		// $email = new CakeEmail('default');
			// $email->to($correo);
			// $email->from(array('unidorados@universidaddorados.com'=>'Plataforma universidad dorados'));
			// $email->subject('Registro en la plataforma universidad dorados');
			// $email->send('Tu correo de acceso a la plataforma es : '.$correo.' Y tu contraseña : '.$password);

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Coordinador registrado con exito');
			$this->redirect(array('action'=>'index'));
			
		endif;
	}
	endif;


}

public function indexcoordinator(){
	$coordinators = $this->User->find('all',array('conditions'=>array('User.group_id'=>6)));
	$this->set('coordinators',$coordinators);

}

public function assigncareers($id=null){
	$guardar=[];
	$this->User->id= $id;
	$selected=$this->Usrcareer->find('list',array('fields'=>'career_id'));
	// echo sizeof($selected);
	// debug($selected);
if(count($selected) ===10){

	$this->Session->setFlash('Por el momento no hay carreras para asignar disponibles elimina carreras a los cordinadores e intenta de nuevo');
	$this->redirect(array('action'=>'index'));
  
	} else { 

	if($this->request->is('post')):

		$contador = count($this->request->data['Usrcareer']);

		//elimina del requestdata todos los elementos no seleccionados
		for($z=0 ; $z< $contador ; $z++ ){
			if(count($this->request->data['Usrcareer'][$z]) == 2 ){
				array_push($guardar,$this->request->data['Usrcareer'][$z]);

			}
		}
		//guarda los elementos que fueron seleccionados y guardados en el nuevo arreglo 
		if($this->Usrcareer->saveAll($guardar)):
			$this->Session->setFlash('Carreras a coordinar asignadas');
			$this->redirect(array('action'=>'index'));

		endif;
	endif;
}


	// debug($selected);
	$careers=$this->Career->find('all',array('fields'=>array('Career.id','Career.name'),'conditions'=>array('Career.id !='=>$selected)));
	$teacher=$this->User->find('list',array('conditions'=>array('User.id'=>$id)));

	$this->set(compact('id','careers','teacher','selected'));

}


public function vercarreras($id){
	$this->User->id =$id;

	$carreras=$this->Usrcareer->find('list',array('conditions'=>array('Usrcareer.user_id'=>$id),'fields'=>array('Usrcareer.career_id')));
	
	// $idreg=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$id)));
	$todo = $this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$id)));
	
	$nombre =$this->User->find('list',array('conditions'=>array('User.id'=>$id),'fields'=>'User.name'));
	$career=$this->Career->find('list',array('fields'=>'Career.name','conditions'=>array('Career.id'=>$carreras)));
	$this->set(compact('career','id','nombre','todo'));
	// pr($todo);



}

public function eliminacc($id){
	$this->Usrcareer->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->Usrcareer->delete($id)):
			$this->Session->setFlash('Carrera liberada');
			$this->redirect(array('action'=>'indexcoordinator'));
			endif;
		endif;

}


public function asistencias($career_id, $semester, $id_materia,$grupo){


 // $id=$this->User->id;
// array_push($arreglo,$id);
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

$semana=array(
	0=>'domingo',
	1=>'lunes',
	2=>'martes',
	3=>'miercoles',
	4=>'jueves',
	5=>'viernes',
	6=>'sabado');

$day = date("w");
$dia=$semana[$day];
$fecha=date("Y-m-d");

$imparte=$this->CourseModule->find('count',array('conditions'=>array(
	'CourseModule.created BETWEEN ? AND ?'=>array($inicio,$fin),
	'CourseModule.course_id'=>$id_materia,
	'CourseModule.day'=>$dia,
	'CourseModule.grupo_id'=>$grupo
	)));

$existe=$this->Assist->find('count',array('conditions'=>array(
		'Assist.created BETWEEN ? AND ? '=>array($inicio,$fin),
		'Assist.date_assist'=>$fecha,
		'Assist.grupo_id'=>$grupo,
		'Assist.course_id'=>$id_materia)));
// 
// if ($imparte === 0){
// 	$this->Session->setFlash('Hoy no impartes esta materia','default',array('class'=>'mensajeError'));
// 	$this->redirect(array('action'=>'index'));
// } else if($existe >= 1 ){
// 	$this->Session->setFlash('Ya pasaste asistencia de esta materia ','default',array('class'=>'mensajeError'));
// 		$this->redirect(array('controller'=>'users','action'=>'index'));
// }



 if ($imparte > 0 && $existe==0){
// else if ($imparte > 0 && $existe==0){



if($this->request->is('post')):
	$this->Assist->create();
		if($this->Assist->saveAll($this->request->data['Assist'])):
		$this->Session->setFlash("asistencia guardada",'default',array('class'=>'mensajeOk'));
		$this->redirect(array('controller'=>'users','action'=>'index'));
	endif;
endif;
}
	$modulos=$this->CourseModule->find('all',array('conditions'=>array('CourseModule.course_id'=>$id_materia,'CourseModule.day'=>$dia,'CourseModule.grupo_id'=>$grupo)));
	// pr($modulos);
	$grup=$this->Grupo->Find('all',array('conditions'=>array('Grupo.id'=>$grupo)));
	$estudiantes=$this->User->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester '=>$semester,'StudentProfile.grupo_id'=>$grupo)
		));
	$this->set(compact('estudiantes','modulos','id_materia','grup'));

}


public function alldays($inicio,$fin,$dia){

	$counter=0;
	while($inicio < $fin ){
		if(date('N',$inicio) == $dia ){
			$counter++;
		}
		$inicio=strtotime('+1 day',$inicio);
	}

	return $counter;
}

//funcion para vista de estudiantes falta ver que elementos tendra el layout dl alumnno

public function alumno(){

	if($this->Auth->User('group_id') == 8){

	$goals=[];

	$examenes=[];
	$diasDeClase=[];
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$user_id=$this->Auth->User('id');
	$cuatrimestre=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$user_id
		),'fields'=>array('StudentProfile.semester','StudentProfile.career_id','StudentProfile.user_id','StudentProfile.grupo_id')));

	$materia=$this->Course->find('all',array('conditions'=>array(
		'Course.semester'=>$cuatrimestre[0]['StudentProfile']['semester'],'Course.career_id'=>$cuatrimestre[0]['StudentProfile']['career_id']),'recursive'=>-1));

	$nombre=$this->User->find('list',array('conditions'=>array('User.id'=>$cuatrimestre[0]['StudentProfile']['user_id']),'fields'=>'User.name'));

	$calif=$this->Obtainedgoal->find('list',array('conditions'=>array('Obtainedgoal.created BETWEEN ? AND ? '=>array($inicio,$fin),'Obtainedgoal.user_id'=>$user_id),'fields'=>array(
		'Obtainedgoal.goal_id','Obtainedgoal.percentage_obtained')));

	$calificacionesParciales=$this->PartialScore->find('all',array('conditions'=>array(
		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'PartialScore.user_id'=>$user_id,
		'PartialScore.partial BETWEEN ? AND ?'=>array(1,4),
		'PartialScore.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']
		),'fields'=>array('PartialScore.course_id','PartialScore.final_score','PartialScore.partial','PartialScore.note')));
	// $calificacionFinal=$this->PartialScore->find('all',array('conditions'=>array(
	// 	'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
	// 	'PartialScore.user_id'=>$user_id,
	// 	'PartialScore'
	// 	'PartialScore.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']
	// 	),'fields'=>array('PartialScore.course_id','PartialScore.final_score','PartialScore.partial','PartialScore.note')));

	// pr($calificacionesParciales);
	$contador= sizeof($materia);
	$derechoCuatri=[];
	$notaCalfFin=[];
	$imparteMaterias=[];

	for($x=0;$x<$contador; $x++){

		$materiaid=$materia[$x]['Course']['id'];
		$tresParciales=$this->PartialScore->find('count',array('conditions'=>array(
			'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),'PartialScore.user_id'=>$user_id,
			'PartialScore.course_id'=>$materiaid,
			'PartialScore.partial BETWEEN ? AND ?'=>array(1,3),
			'PartialScore.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id'])));

		$cFinal=$this->PartialScore->find('count',array('conditions'=>array(
			'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),'PartialScore.user_id'=>$user_id,
			'PartialScore.course_id'=>$materiaid,
			'PartialScore.partial'=>5,
			'PartialScore.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id'])));
		if($cFinal == 1){

		$fnl=$this->PartialScore->find('all',array('conditions'=>array(
			'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),'PartialScore.user_id'=>$user_id,
			'PartialScore.course_id'=>$materiaid,
			'PartialScore.partial'=>5,
			'PartialScore.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']),
			'fields'=>array('PartialScore.course_id','PartialScore.note','PartialScore.final_score')));
		$descripcion=$fnl[0]['PartialScore']['note'];
		$obt=$fnl[0]['PartialScore']['final_score'];

		if( $obt >=6 && $descripcion =="default"){
			$notaCalfFin[]=array(
				'course_id'=>$materiaid,
				'mensaje'=>'Tu calificaion final es de:',
				'calif_final'=>$obt);
		}else if ($obt < 6 && $descripcion =="default"){
			$notaCalfFin[]=array(
				'course_id'=>$materiaid,
				'mensaje'=>'Presentas extraordinario ,tu calificacion fue de: ',
				'calif_final'=>$obt);
		}else if ($obt >=6 && $descripcion =="ExamenExtraordinario"){
			$notaCalfFin[]=array(
				'course_id'=>$materiaid,
				'mensaje'=>'Tu calificacion final presentando examen extraordinario fue de: ',
				'calif_final'=>$obt);
		}else if ($obt < 6 && $descripcion =="ExamenExtraordinario"){

			$notaCalfFin[]=array(
				'course_id'=>$materiaid,
				'mensaje'=>'Presentas examen a titulo, tu calificacion del extraordinario fue: ',
				'calif_final'=>$obt);
		}

		}

		if ($tresParciales == 3 ){

			$suma=$this->PartialScore->find('all',array('conditions'=>array(
			'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),'PartialScore.user_id'=>$user_id,
			'PartialScore.course_id'=>$materiaid,
			'PartialScore.partial BETWEEN ? AND ?'=>array(1,3),
			'PartialScore.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']),
			'fields'=>array('sum(PartialScore.final_score) as derecho_cuatri')));

			$obtenidoTres=$suma[0][0]['derecho_cuatri'];

			if ($obtenidoTres >=18 ){
				$mensaje='Tienes derecho a examen cuatrimestral';
			}else {
				$mensaje='No tienes derecho a examen cuatrimestral';
			}

			$derechoCuatri[]=array(
				'course_id'=>$materiaid,
				'derecho_cuatri'=>$mensaje);
		}

		$imp=$this->Teachercourse->find('all',array('conditions'=>array(
			'Teachercourse.course_id'=>$materiaid,
			'Teachercourse.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id'])));
		if(sizeof($imp)>0){
		$teach=$this->User->find('all',array('conditions'=>array(
			'User.id'=>$imp[0]['Teachercourse']['user_id'])));

		$imparteMaterias[$materiaid]=array(
			'course_id'=>$materiaid,
			'teacher_name'=>$teach[0]['User']['name'],
			'teacher_imgProfile'=>'../files/employee_profile/foto/'.$teach[0]['EmployeeProfile']['foto_dir'].'/thumb_'.$teach[0]['EmployeeProfile']['foto']);
		}
		
		array_push($goals,$this->Goal->find('list',array('conditions'=>array('Goal.created BETWEEN ? AND ? '=>array($inicio,$fin),
			'Goal.course_id'=>$materia[$x]['Course']['id'],'Goal.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']),'fields'=>array('Goal.id','Goal.description','Goal.parcial'))));
		
		
		array_push($examenes,$this->Exam->find('all',array('conditions'=>array(
			'Exam.created BETWEEN ? AND ? '=>array($inicio,$fin),
			'Exam.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id'],
			'Exam.course_id'=>$materia[$x]['Course']['id']),
			'fields'=>array(
				'Exam.course_id','Exam.partial','Exam.fecha'))));

		//Modificar linea para obtener el cuatrimestre en curso
		array_push($diasDeClase,$this->CourseModule->find('all',array('conditions'=>array(
			'CourseModule.created BETWEEN ? AND ? '=>array($inicio,$fin),

			'CourseModule.course_id'=>$materia[$x]['Course']['id']),
			'CourseModule.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id'],
			'fields'=>array('CourseModule.course_id','CourseModule.day'),
			'recursive'=>-1)));

	}

	// $goals=$this->Goal->find('all',array('conditions'=>array('Goal.course_id'=>$materia)));
	$this->set(compact('imparteMaterias','cuatrimestre','materia','nombre','goals','calif','diasDeClase','user_id','examenes','calificacionesParciales','derechoCuatri','notaCalfFin'));
	}else {
		$this->Session->setFlash('denegado','default',array('class'=>'mensajeError'));
		$this->redirect(array('action'=>'index'));
	}




}

public function examenes(){
		$examenes=[];

		//variable para opbtener el semestre mas actual
		$id=$this->Auth->User('id');
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

		$cuatrimestre=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$id
		),'fields'=>array('StudentProfile.semester','StudentProfile.career_id','StudentProfile.user_id','StudentProfile.grupo_id')));

		$materia=$this->Course->find('all',array('conditions'=>array(
		'Course.semester'=>$cuatrimestre[0]['StudentProfile']['semester'],'Course.career_id'=>$cuatrimestre[0]['StudentProfile']['career_id']),
		'recursive'=>-1));

	$contador= sizeof($materia);

		for($x=0;$x<$contador; $x++){


		array_push($examenes,$this->Exam->find('all',array('conditions'=>array(
			'Exam.created BETWEEN ? AND ? '=>array($inicio,$fin),'Exam.course_id'=>$materia[$x]['Course']['id'],
			'Exam.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']))));

	}

	$this->set(compact('examenes','materia','id'));

} 

public function horario(){

		$modulos=[];
		$id=$this->Auth->User('id');
		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

		$dias=['lunes','martes','miercoles','jueves','viernes'];
		$cuatrimestre=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$id
		),'fields'=>array('StudentProfile.semester','StudentProfile.career_id','StudentProfile.user_id','StudentProfile.grupo_id')));

		$materia=$this->Course->find('list',array('conditions'=>array(
		'Course.semester'=>$cuatrimestre[0]['StudentProfile']['semester'],'Course.career_id'=>$cuatrimestre[0]['StudentProfile']['career_id'])));

			$contador= sizeof($materia);

		// for($x=0;$x<$contador; $x++){
		foreach ($materia as $k =>$materias):
		// echo $k;

		array_push($modulos,$this->CourseModule->find('all',array('conditions'=>array(
			'CourseModule.created BETWEEN ? AND ? '=>array($inicio,$fin),
			'CourseModule.course_id'=>$k,
			'CourseModule.grupo_id'=>$cuatrimestre[0]['StudentProfile']['grupo_id']),
		'fields'=>array(
			'CourseModule.course_id','CourseModule.day','.CourseModule.start_time','CourseModule.end_time'))));

	// }
	endforeach;


	$this->set(compact('modulos','materia','dias','cuatrimestre'));


}


// public function getassists($inicio,$fin,$user,$materia){

// $this->RequestHandler->respondAs('json');


// $fechas=$this->Assist->find('all',array('conditions'=>array(
// 	'Assist.date_assist BETWEEN ? AND ? '=>array($inicio,$fin),
// 	'Assist.user_id'=>$user,
// 	'Assist.course_id'=>$materia),
// 	'fields'=>array(
// 		'Assist.user_id','Assist.date_assist','Assist.status','Assist.note')
// 	));

// $this->set('fechas',$fechas);
// $this->layout='ajax';
// }
public function getassists($materia_id,$usuario){
	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
		$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
		$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	if($materia_id !== '' && $usuario !== '' && $this->request->is('ajax')){
	// usuario auth id 
	$exdata=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$usuario),
		'recursive'=>-1));

	$examenes=$this->Exam->find('all',array('conditions'=>array(
			'Exam.created BETWEEN ? AND ?'=>array($inicio,$fin),
			'Exam.grupo_id'=>$exdata[0]['StudentProfile']['user_id'],
			'Exam.course_id'=>$materia_id),
			'fields'=>array(
				'Exam.course_id','Exam.partial','Exam.fecha')));
	$diasDeClase=$this->CourseModule->find('all',array('conditions'=>array(
			'CourseModule.created BETWEEN ? AND ?'=>array($inicio,$fin),
			'CourseModule.course_id'=>$materia_id,
			'CourseModule.grupo_id'=>$exdata[0]['StudentProfile']['grupo_id']),
			'fields'=>array('CourseModule.course_id','CourseModule.day'),
			'recursive'=>-1));


		
	

	
	// $xd= date('N',strtotime("+1 days",$inicio));
	// echo date('N',$inicio);
	// echo $xd;
	//total de faltas
	$periodosParcial=array();
	// pr($examenes);

	//FOR QUE SIRVE PARA SACAR LOS PERIODOS DE PARCIALES POR CADA MATERIA
	for($y=0; $y<sizeof($examenes); $y++){

		// for($w=0; $w < sizeof($examenes[$y]);$w++){

			if( $examenes[$y]['Exam']['partial'] == 1 ) {

				$periodosParcial[] = array(
							'course_id'=> $examenes[$y]['Exam']['course_id'],
							'partial'=>$examenes[$y]['Exam']['partial'],
							'inicio'=>date('Y-m-d',$inicio),
							'fin'=>date('Y-m-d',strtotime($examenes[$y]['Exam']['fecha']))
							);

			}
			else if($examenes[$y]['Exam']['partial'] == 2 ){

				$fechaEx2=strtotime("+1 day",strtotime($examenes[0]['Exam']['fecha']));
				
				if(date('N',$fechaEx2) == 6){
					// echo "no valido".date('Y-m-d',$fechaEx2).' ' ;

					$fechaEx2=strtotime("+2 days",$fechaEx2);
					// echo "no valido";
				}
					else if (date('N',$fechaEx2)==7) {
					// echo "no valido".date('Y-m-d',$fechaEx2).' ' ;

					$fechaEx2=strtotime("+1 day",$fechaEx2);
					// echo "no valido";


				}

					$periodosParcial[] = array(
							'course_id'=> $examenes[$y]['Exam']['course_id'],
							'partial'=>$examenes[$y]['Exam']['partial'],
							'inicio'=>date('Y-m-d',$fechaEx2),
							'fin'=>date('Y-m-d',strtotime($examenes[$y]['Exam']['fecha']))
							);


			}

			else if($examenes[$y]['Exam']['partial'] == 3){

				$fechaEx3=strtotime("+1 day",strtotime($examenes[1]['Exam']['fecha']));

				if(date('N',$fechaEx3) == 6){
					// echo "no valido".date('Y-m-d',$fechaEx3).' ' ;

					$fechaEx3=strtotime("+2 days",$fechaEx3);
					

				}

				else if (date('N',$fechaEx3)==7) {
					// echo "no valido".date('Y-m-d',$fechaEx3).' ' ;
					$fechaEx3=strtotime("+1 day",$fechaEx3);


				}

					$periodosParcial[] = array(
							'course_id'=> $examenes[$y]['Exam']['course_id'],
							'partial'=>$examenes[$y]['Exam']['partial'],
							'inicio'=>date('Y-m-d',$fechaEx3),
							'fin'=>date('Y-m-d',strtotime($examenes[$y]['Exam']['fecha']))
							);

			}

		
	}

	// pr($periodosParcial);

	//FIN DEL FOR PARA SACAR PERIODOS DE LOS PARCIALES POR MATERIA 

	// FOR PARA SACAR LOS DIAS DE CLASE  ARREGLO NUEVO :V 

	$diasClase=array();

	for($z=0; $z<sizeof($diasDeClase);$z++){
	
			
			$clase=$diasDeClase[$z]['CourseModule']['course_id'];
			$dia=$diasDeClase[$z]['CourseModule']['day'];

			if($dia == 'lunes'){
				$dia=1;
			}else if($dia == 'martes'){
				$dia=2;
			}else if($dia == 'miercoles'){
				$dia=3;
			}else if($dia == 'jueves'){
				$dia=4;
			}else if($dia == 'viernes'){
				$dia=5;
			}


			$diasClase[]=array(
						'materia_id'=>$clase,
						'dia_clase'=>$dia,

				);
	}


$nuevoArray=array_unique($diasClase,SORT_REGULAR);
// echo sizeof($nuevoArray);
// pr($nuevoArray);
// nuevo array es para eliminar si hay dos modulos a diferentes hrs el mismo dia y contar solo una asistencia
$totalAsistencias=array();
$asistenciaFinal=array();

foreach ($periodosParcial as $z => $periodo):
	$mat=$periodo['course_id'];
	$partialC=$periodo['partial'];
	$iniP=strtotime($periodo['inicio']);
	$finP=strtotime($periodo['fin']);
	$identifier=strval($partialC.'-'.$mat);

	foreach($nuevoArray as $w => $diasDClase):
		$diaC=$diasDClase['dia_clase'];
		
		if($partialC == 1 && $mat == $diasDClase['materia_id'] ){
		
			$nDays=$this->alldays($iniP,$finP,$diaC);
			// array_push($tmp,$nDays);
			if(array_key_exists($identifier, $totalAsistencias)){
				// $cont=$totalAsistencias[$mat]['numero_asistencias'];
				$totalAsistencias[$identifier]['numero_asistencias']+=$nDays;
			}else {

			$totalAsistencias[$identifier]=array(
				'materia'=>$mat,
				'parcial'=>1,
				'inicio_parcial'=>$periodo['inicio'],
				'fin_parcial'=>$periodo['fin'],
				'numero_asistencias'=>$nDays);
			}

		} else if($partialC == 2 && $mat == $diasDClase['materia_id']) {

				$nDays=$this->alldays($iniP,$finP,$diaC);
			// array_push($tmp,$nDays);
			if(array_key_exists($identifier, $totalAsistencias)){
				// $cont=$totalAsistencias[$mat]['numero_asistencias'];
				$totalAsistencias[$identifier]['numero_asistencias']+=$nDays;
			}else {

			$totalAsistencias[$identifier]=array(
				'materia'=>$mat,
				'parcial'=>2,
				'inicio_parcial'=>$periodo['inicio'],
				'fin_parcial'=>$periodo['fin'],
				'numero_asistencias'=>$nDays);
			}

		}else if ($partialC == 3 && $mat == $diasDClase['materia_id']){

				$nDays=$this->alldays($iniP,$finP,$diaC);
			// array_push($tmp,$nDays);
			if(array_key_exists($identifier, $totalAsistencias)){
				// $cont=$totalAsistencias[$mat]['numero_asistencias'];
				$totalAsistencias[$identifier]['numero_asistencias']+=$nDays;
			}else {

			$totalAsistencias[$identifier]=array(
				'materia'=>$mat,
				'parcial'=>3,
				'inicio_parcial'=>$periodo['inicio'],
				'fin_parcial'=>$periodo['fin'],
				'numero_asistencias'=>$nDays);
			}
		}

	
		endforeach;

	endforeach;

	// Asistencias 1 = asistencia ,2 retardo 3 falta.
	$misAsistencias=array();

	foreach($totalAsistencias as $k => $totalAssist ):

		$porcentajeCien=$totalAssist['numero_asistencias'];
		$parcialN=$totalAssist['parcial'];
		// echo $parcialN;
		$inicioPar=$totalAssist['inicio_parcial'];
		$finPar=$totalAssist['fin_parcial'];
		$asistenciaF=$this->Assist->find('count',array('conditions'=>array('Assist.date_assist BETWEEN ? AND ? '=>array($inicioPar,$finPar),
			'Assist.course_id'=>$materia_id,
			'Assist.grupo_id'=>$exdata[0]['StudentProfile']['grupo_id'],
			'Assist.user_id'=>$usuario,
			'Assist.status'=>1
			),
			'recursive'=>-1));
		$retardoF=$this->Assist->find('count',array('conditions'=>array('Assist.date_assist BETWEEN ? AND ? '=>array($inicioPar,$finPar),
			'Assist.course_id'=>$materia_id,
			'Assist.grupo_id'=>$exdata[0]['StudentProfile']['grupo_id'],
			'Assist.user_id'=>$usuario,
			'Assist.status'=>2
			),
			'recursive'=>-1));

		$faltaF=$this->Assist->find('count',array('conditions'=>array('Assist.date_assist BETWEEN ? AND ? '=>array($inicioPar,$finPar),
			'Assist.course_id'=>$materia_id,
			'Assist.grupo_id'=>$exdata[0]['StudentProfile']['grupo_id'],
			'Assist.user_id'=>$usuario,
			'Assist.status'=>3
			),
			'recursive'=>-1));
		// $derecho=(($asistenciaF * 100)/$porcentajeCien) +(($retardoF * 100)/$porcentajeCien);

		if($parcialN == 1){


			
			$misAsistencias []['Asistencia']=array(
				'materia_id'=>$materia_id,
				'parcial'=>1,
				'total_Asistencias'=>$porcentajeCien,
				'porcentajeAsiste'=>($asistenciaF * 100)/$porcentajeCien,
				'porcentajeRetardo'=>($retardoF * 100)/$porcentajeCien,
				'porcentajeFalta'=>($faltaF * 100)/$porcentajeCien,
				'derecho_examen'=>(($asistenciaF * 100)/$porcentajeCien) +(($retardoF * 100)/$porcentajeCien),
				'inicio'=>$totalAssist['inicio_parcial'],
				'fin'=>$totalAssist['fin_parcial']
				);




		} else if ($parcialN == 2 ){


			$misAsistencias []['Asistencia']=array(
				'materia_id'=>$materia_id,
				'parcial'=>2,
				'total_Asistencias'=>$porcentajeCien,
				'porcentajeAsiste'=>($asistenciaF * 100)/$porcentajeCien,
				'porcentajeRetardo'=>($retardoF * 100)/$porcentajeCien,
				'porcentajeFalta'=>($faltaF * 100)/$porcentajeCien,
				'derecho_examen'=>(($asistenciaF * 100)/$porcentajeCien) +(($retardoF * 100)/$porcentajeCien),
				'inicio'=>$totalAssist['inicio_parcial'],
				'fin'=>$totalAssist['fin_parcial']
				);

		}else if( $parcialN ==3 ){
	

			$misAsistencias []['Asistencia']=array(
				'materia_id'=>$materia_id,
				'parcial'=>3,
				'total_Asistencias'=>$porcentajeCien,
				'porcentajeAsiste'=>($asistenciaF * 100)/$porcentajeCien,
				'porcentajeRetardo'=>($retardoF * 100)/$porcentajeCien,
				'porcentajeFalta'=>($faltaF * 100)/$porcentajeCien,
				'derecho_examen'=>(($asistenciaF * 100)/$porcentajeCien) +(($retardoF * 100)/$porcentajeCien),
				'inicio'=>$totalAssist['inicio_parcial'],
				'fin'=>$totalAssist['fin_parcial']
				);

		}





		endforeach;

		$this->set(compact('misAsistencias'));

		}

}


public function vercalificaciones() {

	$rango=$this->Auth->User('group_id');
	if($rango == 6){


	$infocarreras=[];
	$user_id=$this->Auth->User('id');


	$carreras=$this->Usrcareer->find('all',array('conditions'=>array('Usrcareer.user_id'=>$user_id),'fields'=>'Usrcareer.career_id'));

	// $nombrecarrera=$this->Career->find('all',array('conditions'=>array('Career.id'=>$carreras)));

	foreach($carreras as $x => $carrera):
		// echo $carrera['Usrcareer']['career_id'];
		array_push($infocarreras,$this->Career->find('all',array('conditions'=>array(
			'Career.id'=>$carrera['Usrcareer']['career_id']),
			'fields'=>array(
				'Career.id','Career.abrev','Career.name'))));

		endforeach;

	$this->set(compact('infocarreras'));
	}else if($rango == 5){
		$infocarreras=$this->Career->find('all');
	$this->set(compact('infocarreras'));

	}

}

public function materiasporgerarquia($career_id,$cuatrimestre){

$this->RequestHandler->respondAs('json');
$materias=$this->Course->find('all',array('conditions'=>array(
	'Course.career_id'=>$career_id,
	'Course.semester'=>$cuatrimestre),
'fields'=>array(
	'Course.id','Course.name'),
	'recursive'=>-1

));

$this->set(compact('materias'));

$this->layout='ajax';

}

//funcion ajax para hacer la busqueda de calificaciones vista coordinador vercalificaciones
// public function consultarcalificaciones($career_id,$cuatrimestre,$course_id,$parcial,$grupo) {
// 	$this->RequestHandler->respondAs('json');
// 	$this->layout='ajax';

// 	if($this->request->is('ajax')){
// 		$calificacionesObtenidas=[];
// 	$promedioPorAlumno=[];
// 	$suma=array();

// 	$arrayFinal=array();
// 	//para los criterios de evaluacion sacar el intervalo de inicio y fin de semestre
// 	//para que muestre los criterios de evaluacion en el cuatrimestre actual

// 	//variable para opbtener el semestre mas actual
// 	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));

// 	//convierte a datetime un date
// 	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
// 	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

// 	// echo $inicio; Assist.date_assist BETWEEN ? AND ?

// 	//busca los criterios de evaluacion del cuatrimestre actual
// 	$goals=$this->Goal->find('all',array('conditions'=>array('Goal.created BETWEEN ? AND ? '=>array($inicio,$fin),
// 	'Goal.course_id'=>$course_id,
// 	'Goal.grupo_id'=>$grupo,
// 	'Goal.parcial'=>$parcial)));

// 	//aqui agregar la variable de grupo
// 	$estudiantes=$this->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
// 		'StudentProfile.semester'=>$cuatrimestre,
// 		)
// 		// 'fields'=>'StudentProfile.user_id'
// 	));




// 	//for para obtener la calificacion por criterios de evaluacion obtenidos por estudiante

// 	for($e=0; $e <  sizeof($estudiantes); $e++ ){

// 		$estudiant=$estudiantes[$e]['StudentProfile']['user_id'];
		

// 		for($g=0; $g <  sizeof($goals); $g++){

// 			$criterio=$goals[$g]['Goal']['id'];
			
// 			// $this->Obtainedgoal->virtualField['total']='SUM(Obtainedgoal.percentage_obtained)';

// 			array_push($calificacionesObtenidas,$this->Obtainedgoal->find('list',array(
// 				'conditions'=>array(
// 					'Obtainedgoal.user_id'=>$estudiant,
// 					'Obtainedgoal.goal_id'=>$criterio),
// 					'fields'=>array(
// 						'Obtainedgoal.user_id','Obtainedgoal.percentage_obtained'))));

		


// }}
// 	// pr($calificacionesObtenidas);

// 	$contador=sizeof($calificacionesObtenidas);

	

// 	if($contador > 0 && sizeof($calificacionesObtenidas[0]) !== 0){

// 		foreach ($calificacionesObtenidas as $k => $calif):
		
// 		foreach ($calif as $id => $value):
// 			// echo $value;
// 			// echo $id;
// 			if(!isset($suma[$id])){
		
// 				$suma[$id]=0;
// 			}
// 			$suma[$id]+=$value/10;

// 			endforeach;

// 		endforeach;

// 		// pr($suma);


// 		for($E=0; $E<sizeof($estudiantes); $E++){

// 			$id=$estudiantes[$E]['StudentProfile']['user_id'];
// 			$nombre=$estudiantes[$E]['User']['name'];



// 			foreach ($suma as $key => $sum):
// 				if($id==$key && isset($key)):
// 					$calif=$sum;
// 				endif;
// 				endforeach;

// 				$arrayFinal[]=array(
// 						"id"=>$id,
// 						"nombre"=>$nombre,
// 						"calificacion"=>$calif);

// 		}

	




// 	$this->set(compact('arrayFinal',$arrayFinal));

// 	} 
// 	else {
	
// 	$this->set(compact('arrayFinal',$arrayFinal));


// 	}
	





// }


// 	}

public function consultarcalificaciones($career_id,$cuatrimestre,$course_id,$parcial,$grupo){

	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$arrayFinal=[];
	if($this->request->is('ajax')){
	$estudiantes=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.grupo_id'=>$grupo,
		'StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester'=>$cuatrimestre)));

	for($x=0;$x<sizeof($estudiantes);$x++){

		$calificacion=$this->PartialScore->find('all',array('conditions'=>array(
			'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
			'PartialScore.user_id'=>$estudiantes[$x]['User']['id'],
			'PartialScore.partial'=>$parcial,
			'PartialScore.grupo_id'=>$estudiantes[$x]['StudentProfile']['grupo_id'],
			'PartialScore.course_id'=>$course_id)));

		if (sizeof($calificacion)>0){
		
		$obtenido=$calificacion[0]['PartialScore']['final_score'];

		$arrayFinal[]=array(
			'id'=>$estudiantes[$x]['User']['id'],
			'nombre'=>$estudiantes[$x]['User']['name'],
			'calificacion'=>$calificacion[0]['PartialScore']['final_score'],
			'grupo_id'=>$estudiantes[$x]['StudentProfile']['grupo_id'],
			'partial'=>$calificacion[0]['PartialScore']['partial'],
			'id_calif'=>$calificacion[0]['PartialScore']['id'],
			'course_id'=>$calificacion[0]['PartialScore']['course_id']
			);
		}
	}

	$this->set(compact('arrayFinal'));


	}else {
	$this->set(compact('arrayfinal'));

	}




}


public function consultarasistencias($materia=null,$grupo=null,$fecha1=null,$fecha2=null){

	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
	// $XD= $materia.' '.$grupo.' '.$fecha1.' '.$fecha2;
	// $this->set(compact('XD'));

	if($fecha1 !== null && $fecha2 == null){

	$asistencias=$this->Assist->find('all',array('conditions'=>array(
		'Assist.grupo_id'=>$grupo,
		'Assist.course_id'=>$materia,
		'Assist.date_assist'=>$fecha1)));

	$this->set(compact('asistencias'));
	}else if( $fecha1 !== null && $fecha2 !== null){

		$fech1=date('Y-m-d H:i:s',strtotime($fecha1));
		$fech2=date('Y-m-d H:i:s',strtotime($fecha2.'+1 day'));

		$asistenciasDos=$this->Assist->find('all',array('conditions'=>array(
		'Assist.created BETWEEN ? AND ?'=>array($fech1,$fech2),
		'Assist.grupo_id'=>$grupo,
		'Assist.course_id'=>$materia,
		)));

	$this->set(compact('asistenciasDos'));

	}

}

public function verasistencias(){

	if($this->Auth->User('group_id')==5){
		$carreras=$this->Career->find('all');
		$this->set(compact('carreras'));
	}else if($this->Auth->User('group_id')==6){
		$carreras=[];
		$getId=$this->Usrcareer->find('all',array('conditions'=>array(
			'Usrcareer.user_id'=>$this->Auth->User('id'))));

		for($x=0;$x<sizeof($getId);$x++){
			$mat=$this->Career->find('all',array('conditions'=>array(
				'Career.id'=>$getId[$x]['Usrcareer']['career_id'])));

			$carreras[]=array(
				'career_id'=>$getId[$x]['Usrcareer']['career_id'],
				'career_name'=>$mat[0]['Career']['name'],
				'career_abrev'=>$mat[0]['Career']['abrev']);

		}

		$this->set(compact('carreras'));


	}

}

public function fechashorarios($grupo_id=null,$opcion=null){
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
	$this->RequestHandler->respondAs('json');
	$this->layout='ajax';
	$tipo=[];

	if($grupo_id !==null && $opcion=='hExamenes'){

		$fechasExamen=[];
		$fechas=$this->Exam->find('all',array('conditions'=>array(
			'Exam.created BETWEEN ? AND ?'=>array($inicio,$fin),
			'Exam.grupo_id'=>$grupo_id)));
		

		for($x=0;$x<sizeof($fechas);$x++){

			$nombreMat=$this->Course->find('all',array('conditions'=>array(
				'Course.id'=>$fechas[$x]['Exam']['course_id'])));

			$fechasExamen[]['Examen']=array(
				'id'=>$fechas[$x]['Exam']['id'],
				'course_id'=>$fechas[$x]['Exam']['course_id'],
				'course_name'=>$nombreMat[0]['Course']['name'],
				'partial'=>$fechas[$x]['Exam']['partial'],
				'fecha'=>$fechas[$x]['Exam']['fecha'],
				'inicio'=>$fechas[$x]['Exam']['start_time']);
		}


		$this->set(compact('fechasExamen'));

	}else if($grupo_id !==null && $opcion=='hClases'){

		$horarioClases=$this->CourseModule->find('all',array('conditions'=>array(
			'CourseModule.created BETWEEN ?AND ?'=>array($inicio,$fin),
			'CourseModule.grupo_id'=>$grupo_id)));

		$this->set(compact('horarioClases'));

	}



}


public function consultarhorarios(){

	$usuario=$this->Auth->User('id');
	$rol=$this->Auth->User('group_id');

	if($rol == 5 ){

		$carreras=$this->Career->find('all');
		$this->set(compact('carreras'));

	}else if($rol ==6){

		$carreras=[];
		$getId=$this->Usrcareer->find('all',array('conditions'=>array(
			'Usrcareer.user_id'=>$this->Auth->User('id'))));

		for($x=0;$x<sizeof($getId);$x++){
			$mat=$this->Career->find('all',array('conditions'=>array(
				'Career.id'=>$getId[$x]['Usrcareer']['career_id'])));

			$carreras[]=array(
				'career_id'=>$getId[$x]['Usrcareer']['career_id'],
				'career_name'=>$mat[0]['Career']['name'],
				'career_abrev'=>$mat[0]['Career']['abrev']);

		}

		$this->set(compact('carreras')); 

	}
}


public function cuatrimestral($course_id,$semester,$career_id,$parcial,$grupo){
	
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$sumaParciales=[];
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
	$materia=$this->Course->find('all',array('conditions'=>array(
		'Course.id'=>$course_id)));
	$alumnos=$this->User->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.grupo_id'=>$grupo,
		'StudentProfile.semester'=>$semester,
		'StudentProfile.career_id'=>$career_id)));

	$previo=$this->PartialScore->find('count',array('conditions'=>array(
		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'PartialScore.partial BETWEEN ? AND ?'=>array(1,3),
		'PartialScore.grupo_id'=>$grupo,
		'PartialScore.course_id'=>$course_id
		)));


	
	// agregar condicion si no es = a 3 redirect porque no se han registrado los primeros 3 parciales
	 $existen=$previo/sizeof($alumnos);

	 $registrado=$this->PartialScore->find('count',array(
	 	'conditions'=>array(
	 		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
	 		'PartialScore.partial'=>4,
	 		'PartialScore.course_id'=>$course_id,
	 		'PartialScore.grupo_id'=>$grupo)));

	 // echo $registrado;
	 // echo $existen;

	 // echo $existen;

	 if($existen !== 3 && $registrado == 0){

	 	$this->Session->setFlash('Aun no has calificado los parciales anteriores','default',array('class'=>'mensajeError'));
	 	$this->redirect(array('action'=>'index'));
	 }
	 else if($existen == 3 && $registrado >0 ){
	 	$this->Session->setFlash('Ya has calificado el cuatrimestral','default',array('class'=>'mensajeError'));
	 	$this->redirect(array('action'=>'index'));


	 }


	 else if( $existen == 3 && $registrado == 0){

	 //luego de pasar la condicion y sea = 3 sacar la suma de sus 3 parciales si es > 18 se califica con cuatrimestral si no :v es = 0


	 for($x=0; $x<sizeof($alumnos);$x++){

	 	$idAlumno=$alumnos[$x]['User']['id'];

	 	$suma=$this->PartialScore->find('all',array('conditions'=>array(
		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'PartialScore.partial BETWEEN ? AND ?'=>array(1,3),
		'PartialScore.user_id'=>$idAlumno,
		'PartialScore.grupo_id'=>$grupo,
		'PartialScore.course_id'=>$course_id,

		),
		'fields'=>array('sum(PartialScore.final_score) as total_suma')
	));

	 	$sumaParciales[$idAlumno]=array(
	 		'user_id'=>$idAlumno,
	 		'user_name'=>$alumnos[$x]['User']['name'],
	 		'suma_parciales'=>$suma[0][0]['total_suma']
	 		);


	 }

	 // pr($sumaParciales);

	 

	$this->set(compact('alumnos','materia','parcial','grupo','career_id','sumaParciales'));

	if($this->request->is('post')):
		if($this->PartialScore->saveAll($this->request->data['PartialScore'])):
			$this->Session->setFlash('cuatrimestral calificado ','default',array('class'=>'mensajeOk'));
			$this->redirect(array('action'=>'index'));
		endif;
	endif;
	 }





}


public function editarasistencia($assist_id){

	$this->Assist->id=$assist_id;

	if($this->request->is('get')){

		$this->request->data=$this->Assist->read();
}
		else {
			if($this->Assist->save($this->request->data)){
				$this->Session->setFlash('Asistencia modificada','default',array('class'=>'mensajeOk'));
				$this->redirect(array('action'=>'index'));
			}
		}
	



}


public function editarcalificacion($score_id,$partial,$materia,$grupo){

	$this->PartialScore->id=$score_id;
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$existe=$this->PartialScore->find('count',array('conditions'=>array(
		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'PartialScore.grupo_id'=>$grupo,
		'PartialScore.partial'=>4,
		'PartialScore.course_id'=>$materia)));

	if(($partial <= 3 && $existe==0) || ($partial == 5 && $existe >1) ){

	if($this->request->is('get')){
		$this->request->data=$this->PartialScore->read();
	}else {
		if($this->PartialScore->save($this->request->data)){
			$this->Session->setFlash('Calificacion modificada','default',array('class'=>'mensajeOk'));
			$this->redirect(array('action'=>'index'));

		}
	}
	}else {
		$this->Session->setFlash('No se pudo modificar porque ya califico el cuatrimestral, edite la calificacion final','default',array('class'=>'mensajeError'));
			$this->redirect(array('action'=>'index'));
	}
}


public function misclases(){

		$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));
	$maestro=$this->Auth->User('id');
	$dias=['lunes','martes','miercoles','jueves','viernes'];
	$horarios=[];
	$datos=$this->Teachercourse->find('all',array('conditions'=>array(
		'Teachercourse.user_id'=>$maestro)));
	// echo sizeof($datos);
	$count=sizeof($datos);

	for($w=0;$w<$count;$w++){



		$grupo=$this->Grupo->find('all',array('conditions'=>array(
			'Grupo.id'=>$datos[$w]['Teachercourse']['grupo_id']),'recursive'=>-1));

		

		$materia = $datos[$w]['Teachercourse']['course_id'];
		$grup=$grupo[0]['Grupo']['id'];
		$grupN=$grupo[0]['Grupo']['name'];
		
		$hrs=$this->CourseModule->find('all',array('conditions'=>array('CourseModule.created BETWEEN ? AND ?'=>array($inicio,$fin),
			'CourseModule.course_id'=>$materia,
			'CourseModule.grupo_id'=>$grup)));

		$tamaño=sizeof($hrs);

		for($x=0;$x<$tamaño;$x++){
			$horarios[]=array(
				'course_name'=>$hrs[$x]['Course']['name'],
				'grupo'=>$grupN,
				'hrs'=>$hrs[$x]['CourseModule']['start_time'].' a '.$hrs[$x]['CourseModule']['end_time'],
				'dia'=>$hrs[$x]['CourseModule']['day']
				);
		}


}

	$this->set(compact('horarios','dias'));







}


public function extraordinario($materia,$carrera,$grupo,$cuatrimestre){

	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));

	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

$alumnos=$this->User->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.grupo_id'=>$grupo,
		'StudentProfile.semester'=>$cuatrimestre,
		'StudentProfile.career_id'=>$carrera)));

$previo=$this->PartialScore->find('count',array('conditions'=>array(
		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'PartialScore.partial'=>5,
		'PartialScore.grupo_id'=>$grupo,
		'PartialScore.course_id'=>$materia,
		'PartialScore.note'=>'default'

		)));
$nombreMateria=$this->Course->find('all',array('conditions'=>array(
	'Course.id'=>$materia),
	'recursive'=>-1,
	'fields'=>'name'));
$examenExtra=[];

 $existen=$previo/sizeof($alumnos);

// echo $existen;
 if($existen == 1 ){

 	$extraOr=$this->PartialScore->find('all',array('conditions'=>array(
		'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
		'PartialScore.partial'=>5,
		'PartialScore.grupo_id'=>$grupo,
		'PartialScore.course_id'=>$materia,
		'PartialScore.note'=>'default',
		'PartialScore.final_score BETWEEN ? AND ?'=>array(1,5))));

 	// pr($extraOr);

 	for($x=0;$x<sizeof($extraOr);$x++){
 		$estudiante=$extraOr[$x]['PartialScore']['user_id'];
 		$nombre=$this->User->find('all',array('conditions'=>array(
 			'User.id'=>$estudiante),
 			'fields'=>'name',
 			'recursive'=>-1));

 		

 		$examenExtra[]['PartialScore']=array(
 			'id'=>$extraOr[$x]['PartialScore']['id'],
 			'nombre'=>$nombre[0]['User']['name'],
 			'course_id'=>$extraOr[$x]['PartialScore']['course_id'],
 			'grupo_id'=>$extraOr[$x]['PartialScore']['grupo_id'],
 			'note'=>'ExamenExtraordinario',
 			'final_score'=>$extraOr[$x]['PartialScore']['final_score']
 			);


 	}

 	// pr($examenExtra);

 	$this->set(compact('examenExtra','nombreMateria'));


 	if($this->request->is('post')){
 		if($this->PartialScore->saveAll($this->request->data['PartialScore'])){
 			$this->Session->setFlash('Examen extraoirdinario calificado','default',array('class'=>'mensajeOk'));
			$this->redirect(array('action'=>'index'));


 		}
 	}



 }else {

$this->Session->setFlash('Ya has evaluado/o no hay candidatos a extraordinario','default',array('class'=>'mensajeError'));
			$this->redirect(array('action'=>'index'));



 }



}


public function cerrarcuatri($user_id){


	// NOTA : REQUISITO QUE ESTEN TODOS LOS GRUPOS PARA C/CARRERA REGISTRADOS ,YA QUE ESTEN EN PRODUCCION AGREGAR ACCION A PERMISOS DEL DIRECTOR Y HACER UN FOR PARA SACAR TODS LOS ALUMNOS :v 

	$alumno=$this->User->StudentProfile->find('all',array('conditions'=>array(
		'User.id'=>$user_id)));
	preg_match_all("/[A-Z]/",$alumno[0]['Grupo']['name'], $letras);


	$perfil=$alumno[0]['StudentProfile']['id'];
	$id_usuario=$alumno[0]['User']['id'];

	$grupo_letra=implode($letras[0]);
	$grupoCuatri=$alumno[0]['Grupo']['period']+1;
	$gCarrera=$alumno[0]['StudentProfile']['career_id'];

	// echo $grupoCuatri;
	// echo 'grupo proximo: '.$grupoCuatri.' '.$grupo_letra;
	
	$nextG=$this->Grupo->find('all',array('conditions'=>array(
		'Grupo.career_id'=>$gCarrera,
		'Grupo.period'=>$grupoCuatri,
		'Grupo.name'=>$grupoCuatri.' '.$grupo_letra)));


	// pr($nextG);

	$data=array('id'=>$perfil,'semester'=>$grupoCuatri,'grupo_id'=>$nextG[0]['Grupo']['id']);

	// if($this->StudentProfile->save($data,false)){
	// 	echo "actualizado";
	// }
	
	// pr($alumno);

	
}
public function consultacalif($course_id,$grupo,$cuatri){


	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	$calificaciones=[];

	$estudiantes=$this->User->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.grupo_id'=>$grupo,
		'StudentProfile.semester'=>$cuatri)));
	$materia=$this->Course->find('all',array('conditions'=>array(
		'Course.id'=>$course_id)));
	$gpo=$this->Grupo->find('all',array('conditions'=>array(
		'Grupo.id'=>$grupo)));

	for($x=0;$x<sizeof($estudiantes);$x++){

		$idAlumno=$estudiantes[$x]['User']['id'];

		$calif=$this->PartialScore->find('all',array('conditions'=>array(
			'PartialScore.created BETWEEN ? AND ?'=>array($inicio,$fin),
			'PartialScore.user_id'=>$idAlumno,
			'PartialScore.course_id'=>$course_id)));
		// $partial=$calif[$x]['PartialScore']['partial'];

		array_push($calificaciones, $calif);
		// for($w=0;$w<sizeof($calif);$w++){

		// 	if(array_key_exists($id,))




		// }


	}

	$this->set(compact('calificaciones','estudiantes','materia','gpo'));


}
}




?>