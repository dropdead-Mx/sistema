<h3>Subir planeaciones</h3>

<?php 

echo $this->Form->create('Planning',array('type'=>'file','novalidate'=>'novalidate','id'=>'formularioPlaneaciones'));
echo $this->Form->input('coordi_id',array('type'=>'select','label'=>'Cordinador a enviar','empty'=>'seleccione un coordinador','options'=>$coordinadores,'id'=>'selectCoordi'));
echo $this->Form->input('career_id',array('label'=>'Carrera','type'=>'select','empty'=>'seleccione una carrera','id'=>'carrerasPlaneacion','disabled'=>true));
echo $this->Form->input('teacher_id',array('label'=>'remitente'));
echo $this->Form->input('course_id',array('label'=>'Materia','type'=>'select','empty'=>'seleccione una materia','disabled'=>true));
echo $this->Form->input('description',array('label'=>'Descripcion','type'=>'text','placeholder'=>'Describa el archivo a subir ejemplo: zip con planeaciones semana 1 2 3'));
echo $this->Form->input('planeacion',array('type'=>'file','label'=>'seleccione planeacion/es'));
echo $this->Form->input('planeacion_dir',array('type'=>'hidden'));


// formulario oculto para enviar mensajes

echo $this->Form->end('subir planeacion')



?>

<?php echo $this->Html->script('scripts');?>