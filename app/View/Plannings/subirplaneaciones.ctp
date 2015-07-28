<h3>Subir planeaciones</h3>

<!-- <?php pr($materias) ?> -->
<?php 
echo $this->Form->create('Planning',array('type'=>'file','novalidate'=>'novalidate','id'=>'formularioPlaneaciones'));
echo $this->Form->input('course_id',array('label'=>'Materia','type'=>'select','empty'=>'seleccione una materia','options'=>$materias,'id'=>'materiaPlaneacion'));
echo $this->Form->input('coordi_id',array('type'=>'select','label'=>'Cordinador a enviar','disabled'=>false,'id'=>'selectCoordi','hidden'=>true));
echo $this->Form->hidden('career_id',array('type'=>'text','empty'=>'seleccione una carrera','id'=>'carreraPlaneacion'));
echo $this->Form->hidden('teacher_id',array('value'=>$maestro,'type'=>'text'));
echo $this->Form->input('description',array('label'=>'Descripcion','type'=>'text','placeholder'=>'Describa el archivo a subir ejemplo: zip con planeaciones semana 1 2 3'));
echo $this->Form->input('planeacion',array('type'=>'file','label'=>'seleccione planeacion/es'));
echo $this->Form->input('planeacion_dir',array('type'=>'hidden'));


// formulario oculto para enviar mensajes

echo $this->Form->end('subir planeacion')



?>

<?php echo $this->Html->script('scripts');?>