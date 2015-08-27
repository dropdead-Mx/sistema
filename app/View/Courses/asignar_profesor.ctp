

<h3>Asignar profesor a la materia: <?php echo $datos[0]['Course']['name'];?> </h3>

<?php 

echo $this->Form->create('Course');
echo $this->Form->hidden('Teachercourse.course_id',array('type'=>'text','value'=>$datos[0]['Course']['id']));
echo $this->Form->input('Teachercourse.user_id',array('options'=>$profesores,'label'=>'Profesores','empty'=>'seleccione a un profesor'));
echo $this->Form->hidden('Teachercourse.grupo_id',array('value'=>$grupo,'type'=>'text'));
echo $this->Form->end('Asignar profesor');

?>