<h3>Subir nuevo examen</h3>

<?php 

echo $this->Form->create('Uploadtest',array('type'=>'file','novalidate'=>'novalidate','id'=>'formSubirExamen'));
echo $this->Form->select('course_id',$options,array('id'=>'materiaExamen','empty'=>'--Seleccione una materia--',
	'label'=>'Materia'));
echo $this->Form->hidden('grupo_id',array('type'=>'text','id'=>'examenUpload'));
echo $this->Form->input('coordi_id',array('type'=>'select','label'=>'Coordinador','id'=>'selectCoordi','hidden'=>true));
echo $this->Form->hidden('user_id',array('type'=>'text','value'=>$maestro));
echo $this->Form->input('partial',array('type'=>'select','options'=>array(
	'0'=>'--Seleccione un periodo --',
	'1'=>'Primer parcial',
	'2'=>'Segundo parcial',
	'3'=>'Tercer parcial',
	'4'=>'Cuatrimestral'),
'id'=>'parcialExamen',
'label'=>'Periodo'));
echo $this->Form->input('examen',array('type'=>'file','label'=>'Seleccione un archivo'));
echo $this->Form->input('examen_dir',array('type'=>'hidden'));

echo $this->Form->hidden('Message.remitente',array('value'=>$maestro,'type'=>'text'));
echo $this->Form->hidden('Message.destinatario',array('label'=>'para','id'=>'examenPara'));
echo $this->Form->hidden('Message.subject',array('label'=>'asunto','id'=>'examenAsunto','type'=>'text'));
echo $this->Form->hidden('Message.mensaje',array('label'=>'texto','id'=>'examenTexto','type'=>'text'));
echo $this->Form->hidden('Message.hora',array('type'=>'timestamp'));

echo $this->Form->end('Subir examen');


?>

<?php echo $this->Html->script('scripts');?>