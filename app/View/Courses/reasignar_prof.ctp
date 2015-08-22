<h3>Reasignar profesor para la materia: <?php echo $materia[0]['Course']['name'];?></h3>

<?php 

echo $this->Form->create('Course');
echo $this->Form->hidden('Teachercourse.id');
echo $this->Form->hidden('Teachercourse.course_id',array('type'=>'text','value'=>$materia[0]['Course']['id']));
echo $this->Form->input('Teachercourse.user_id',array('options'=>$profesores,'label'=>'Profesores','empty'=>'seleccione a un profesor'));
echo $this->Form->hidden('Teachercourse.grupo_id',array('value'=>$grupo_id,'type'=>'text'));
echo $this->Form->end('Reasignar profesor');

?>