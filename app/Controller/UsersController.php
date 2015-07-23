<?php 

class UsersController extends AppController {

public $helpers=array('Html','Form','Js');
public $components=array('Session','RequestHandler');
public $uses = array('User', 'StudentProfile','Career','Grupo','EmployeeProfile','Group','Course','Goal','Obtainedgoal','Usrcareer','CourseModule','Assist','Exam','Semester');


public function index() {

$this->layout='coordinador';

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

			if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Estudiante agregado');
			// debug($existe);
			$this->redirect(array('action'=>'indexStudent'));
			endif;}


	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		// pr($careers);
		$this->set(compact('careers'));
}

public function editStudent($id=null) {
		$this->User->id=$id;
	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();
		


	else:
		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Estudiante agregado');
			$this->redirect(array('action'=>'indexStudent'));
			endif;
	endif;

		$careers = $this->User->StudentProfile->Career->find('list');
		$grupos  = $this->User->StudentProfile->Grupo->find('list');
		$this->set(compact('careers','grupos'));


}

public function deleteStudent($id){
	$this->User->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->User->delete($id)):
			$this->Session->setFlash('Estudiante eliminado');
			$this->redirect(array('action'=>'indexStudent'));
		endif;
	endif;
		

}
public function indexStudent() {

	$this->set('estudiantes',$this->User->StudentProfile->find('all',array('conditions'=>array('User.group_id'=>8))));
}


public function addTeacher(){
	$this->User->virtualFields['name']='User.name';


	if($this->request->is('post')):
	$this->User->create();

	$nombre=$this->request->data['User']['name'];
	$ap=$this->request->data['User']['apat'];
	$am=$this->request->data['User']['amat'];
	$correo=$this->request->data['User']['email'];
	$matricula=$this->request->data['StudentProfile']['matricula'];


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

		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Maestro agregado');
			$this->redirect(array('action'=>'indexTeacher'));
			endif;
		}
	endif;


}


public function editTeacher($id= null){

			$this->User->id=$id;


	$this->User->virtualFields['name']='User.name';

	if($this->request->is('get')):
		$this->request->data=$this->User->read();

	else:
		if($this->User->saveAssociated($this->request->data)):
			$this->Session->setFlash('Perfil actualizado');
			$this->redirect(array('action'=>'indexTeacher'));
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
public function indexTeacher() {
	$this->set('maestros',$this->User->EmployeeProfile->find('all',array('conditions'=>array('User.group_id'=>'7'))));

}

public function viewmycourses($id){
$this->User->id=$id;
$courses=$this->User->Course->find('all',array('conditions'=>array('Course.user_id'=>$id)));
$this->set('courses',$courses);
}

public function calificar($course_id=null,$semester=null,$career_id=null,$parcial){

	$this->Course->id=$course_id;
	$this->Course->semester=$semester;
	$this->Career->id=$career_id;


	if($this->request->is('post')):
		if($this->User->Obtainedgoal->saveAll($this->request->data['Obtainedgoal'])):
			$this->Session->setFlash('Calificaciones Asignadas correctamente');
			$this->redirect(array('action'=>'index'));
			endif;
		endif;

	$estudiantes=$this->User->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester '=>$semester)
		));
	// Agregar funcion ajax para criterios de evaluacion por parcial
	$critdevaluacion=$this->Goal->find('all',array('conditions'=>array(
		'Goal.course_id'=>$course_id,'Goal.parcial'=>$parcial)));
	$materia = $this->Course->find('list',array('conditions'=>array('Course.id'=>$course_id)));

	$this->set(compact('estudiantes','critdevaluacion','materia','partial'));

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
	$this->redirect(array('action'=>'indexcoordinator'));

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
			$this->redirect(array('action'=>'indexcoordinator'));

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

public function eliminacc($id,$user_id){
	$this->Usrcareer->id=$id;
	if($this->request->is('get')):
		throw new MethodNotAllowedException();
	else:
		if($this->Usrcareer->delete($id)):
			$this->Session->setFlash('Carrera liberada');
			$this->redirect(array('action'=>'vercarreras',$user_id));
			endif;
		endif;

}


public function asistencias($career_id, $semester, $id_materia, $id){


 // $id=$this->User->id;
// array_push($arreglo,$id);
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


$imparte=$this->CourseModule->find('count',array('conditions'=>array(
	'CourseModule.course_id'=>$id_materia,
	'CourseModule.day'=>$dia
	)));

if ($imparte === 0){
	$this->Session->setFlash('Hoy no impartes esta materia');
	$this->redirect(array('action'=>'viewmycourses',$id));
}else if ($imparte > 0){


if($this->request->is('post')):
	$this->Assist->create();
	
	$fecha=$this->request->data['Assist'][0]['date_assist'];
	$modulo=$this->request->data['Assist'][0]['course_id'];
	$grupo=$this->request->data['Assist'][0]['grupo_id'];

	$existe=$this->Assist->find('count',array('conditions'=>array(
		'Assist.date_assist'=>$fecha,
		'Assist.grupo_id'=>$grupo,
		'Assist.course_id'=>$modulo)));

	if($existe > 0 ){
		$this->Session->setFlash('Ya pasaste asistencia de esta materia solo se permite 1 vez');
		$this->redirect(array('controller'=>'users','action'=>'viewmycourses',$id));

	}else {

	
	if($this->Assist->saveAll($this->request->data['Assist'])):
		$this->Session->setFlash("asistencia guardada");
		$this->redirect(array('controller'=>'users','action'=>'viewmycourses',$id));
	endif;

}

endif;
}
	$modulos=$this->CourseModule->find('all',array('conditions'=>array('CourseModule.course_id'=>$id_materia,'CourseModule.day'=>$dia)));
	// pr($modulos);
	$estudiantes=$this->User->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester '=>$semester)
		));
	$this->set(compact('estudiantes','modulos','id_materia'));

}



//funcion para vista de estudiantes falta ver que elementos tendra el layout dl alumnno

public function alumno($user_id){
	$goals=[];
	$examenes=[];
	$cuatrimestre=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$user_id
		),'fields'=>array('StudentProfile.semester','StudentProfile.career_id','StudentProfile.user_id')));

	$materia=$this->Course->find('all',array('conditions'=>array(
		'Course.semester'=>$cuatrimestre[0]['StudentProfile']['semester'],'Course.career_id'=>$cuatrimestre[0]['StudentProfile']['career_id'])));

	$nombre=$this->User->find('list',array('conditions'=>array('User.id'=>$cuatrimestre[0]['StudentProfile']['user_id']),'fields'=>'User.name'));

	$calif=$this->Obtainedgoal->find('list',array('conditions'=>array('Obtainedgoal.user_id'=>$user_id),'fields'=>array(
		'Obtainedgoal.goal_id','Obtainedgoal.percentage_obtained')));


	$contador= sizeof($materia);

	// echo $materia[0]['Course']['name'];

	for($x=0;$x<$contador; $x++){

		array_push($goals,$this->Goal->find('list',array('conditions'=>array(
			'Goal.course_id'=>$materia[$x]['Course']['id']),'fields'=>array('Goal.id','Goal.description','Goal.parcial',))));

		array_push($examenes,$this->Exam->find('all',array('conditions'=>array(
			'Exam.course_id'=>$materia[$x]['Course']['id']))));

	}
		

	// $goals=$this->Goal->find('all',array('conditions'=>array('Goal.course_id'=>$materia)));
	$this->set(compact('cuatrimestre','materia','nombre','goals','calif','examenes','user_id'));




}

public function examenes($id){
		$examenes=[];
		$cuatrimestre=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$id
		),'fields'=>array('StudentProfile.semester','StudentProfile.career_id','StudentProfile.user_id')));

		$materia=$this->Course->find('all',array('conditions'=>array(
		'Course.semester'=>$cuatrimestre[0]['StudentProfile']['semester'],'Course.career_id'=>$cuatrimestre[0]['StudentProfile']['career_id'])));

	$contador= sizeof($materia);

		for($x=0;$x<$contador; $x++){


		array_push($examenes,$this->Exam->find('all',array('conditions'=>array(
			'Exam.course_id'=>$materia[$x]['Course']['id']))));

	}

	$this->set(compact('examenes','materia','id'));

} 

public function horario($id){

		$modulos=[];
		$dias=['lunes','martes','miercoles','jueves','viernes'];
		$cuatrimestre=$this->StudentProfile->find('all',array('conditions'=>array(
		'StudentProfile.user_id'=>$id
		),'fields'=>array('StudentProfile.semester','StudentProfile.career_id','StudentProfile.user_id')));

		$materia=$this->Course->find('list',array('conditions'=>array(
		'Course.semester'=>$cuatrimestre[0]['StudentProfile']['semester'],'Course.career_id'=>$cuatrimestre[0]['StudentProfile']['career_id'])));

			$contador= sizeof($materia);

		// for($x=0;$x<$contador; $x++){
		foreach ($materia as $k =>$materias):
		// echo $k;

		array_push($modulos,$this->CourseModule->find('all',array('conditions'=>array(
			'CourseModule.course_id'=>$k),
		'fields'=>array(
			'CourseModule.course_id','CourseModule.day','.CourseModule.start_time','CourseModule.end_time'))));

	// }
	endforeach;


	$this->set(compact('modulos','materia','dias','cuatrimestre'));


}


public function getassists($inicio,$fin,$user,$materia){

$this->RequestHandler->respondAs('json');


$fechas=$this->Assist->find('all',array('conditions'=>array(
	'Assist.date_assist BETWEEN ? AND ? '=>array($inicio,$fin),
	'Assist.user_id'=>$user,
	'Assist.course_id'=>$materia),
	'fields'=>array(
		'Assist.user_id','Assist.date_assist','Assist.status','Assist.note')
	));

$this->set('fechas',$fechas);
$this->layout='ajax';
}



public function vercalificaciones($user_id) {

	$infocarreras=[];

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

}

public function materiasporgerarquia($career_id,$cuatrimestre){

$this->RequestHandler->respondAs('json');
$materias=$this->Course->find('all',array('conditions'=>array(
	'Course.career_id'=>$career_id,
	'Course.semester'=>$cuatrimestre),
'fields'=>array(
	'Course.id','Course.name')

));

$this->set(compact('materias'));

$this->layout='ajax';

}

//funcion ajax para hacer la busqueda de calificaciones vista coordinador vercalificaciones
public function consultarcalificaciones($career_id,$cuatrimestre,$course_id,$parcial) {
	$this->RequestHandler->respondAs('json');
	$calificacionesObtenidas=[];
	$promedioPorAlumno=[];
	$suma=array();

	$arrayFinal=array();
	//para los criterios de evaluacion sacar el intervalo de inicio y fin de semestre
	//para que muestre los criterios de evaluacion en el cuatrimestre actual

	//variable para opbtener el semestre mas actual
	$cuatriInicio=$this->Semester->find('first',array('order'=>'id DESC'));

	//convierte a datetime un date
	$inicio=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['inicio']));
	$fin=date('Y-m-d H:i:s',strtotime($cuatriInicio['Semester']['fin']));

	// echo $inicio; Assist.date_assist BETWEEN ? AND ?

	//busca los criterios de evaluacion del cuatrimestre actual
	$goals=$this->Goal->find('all',array('conditions'=>array('Goal.created BETWEEN ? AND ? '=>array($inicio,$fin),
	'Goal.course_id'=>$course_id,
	'Goal.parcial'=>$parcial )));

	$estudiantes=$this->StudentProfile->find('all',array('conditions'=>array('StudentProfile.career_id'=>$career_id,
		'StudentProfile.semester'=>$cuatrimestre,
		)
		// 'fields'=>'StudentProfile.user_id'
	));




	//for para obtener la calificacion por criterios de evaluacion obtenidos por estudiante

	for($e=0; $e <  sizeof($estudiantes); $e++ ){

		$estudiant=$estudiantes[$e]['StudentProfile']['user_id'];
		

		for($g=0; $g <  sizeof($goals); $g++){

			$criterio=$goals[$g]['Goal']['id'];
			
			// $this->Obtainedgoal->virtualField['total']='SUM(Obtainedgoal.percentage_obtained)';

			array_push($calificacionesObtenidas,$this->Obtainedgoal->find('list',array(
				'conditions'=>array(
					'Obtainedgoal.user_id'=>$estudiant,
					'Obtainedgoal.goal_id'=>$criterio),
					'fields'=>array(
						'Obtainedgoal.user_id','Obtainedgoal.percentage_obtained'))));

		


}}

	$contador=sizeof($calificacionesObtenidas);

	if($contador > 0 ){

		foreach ($calificacionesObtenidas as $k => $calif):
		
		foreach ($calif as $id => $value):
			// echo $value;
			// echo $id;
			if(!isset($suma[$id])){
		
				$suma[$id]=0;
			}
			$suma[$id]+=$value/10;

			endforeach;

		endforeach;

		// pr($suma);


		for($E=0; $E<sizeof($estudiantes); $E++){

			$id=$estudiantes[$E]['StudentProfile']['user_id'];
			$nombre=$estudiantes[$E]['User']['name'];



			foreach ($suma as $key => $sum):
				if($id==$key && isset($key)):
					$calif=$sum;
				endif;
				endforeach;

				$arrayFinal[]=array(
						"id"=>$id,
						"nombre"=>$nombre,
						"calificacion"=>$calif);

		}

		$this->layout='ajax';
		// pr($arrayFinal);




	$this->set(compact('arrayFinal',$arrayFinal));

	}else {
	$this->set(compact('arrayFinal',$arrayFinal));

	}
	


	



}






}




?>