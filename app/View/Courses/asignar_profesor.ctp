<?php 

// pr($profesores);
// pr($grupos);
// pr($datos);
?>

<h3>Asignar profesor a la materia: <?php echo $datos[0]['Course']['name'];?> </h3>

<?php 

echo $this->Form->create('Course');
echo $this->Form->hidden('Teachercourse.course_id',array('type'=>'text','value'=>$datos[0]['Course']['id']));
echo $this->Form->input('Teachercourse.user_id',array('options'=>$profesores,'label'=>'Profesores','empty'=>'Asigne un profesor para esta materia'));
echo $this->Form->input('Teachercourse.grupo_id',array('options'=>$grupos,'empty'=>'--Seleccione el grupo a asignar--'));
echo $this->Form->end('Asignar profesor');

?>