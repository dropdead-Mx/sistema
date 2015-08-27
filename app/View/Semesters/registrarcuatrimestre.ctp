<h3>Registrar Cuatrimestre </h3>


<?php 

echo $this->Form->create('Semester',array('action'=>'registrarcuatrimestre', 'id'=>'registrarCuatrimestre'));
echo $this->Form->input('inicio',array('label'=>'Fecha de inicio de cuatrimestre','class'=>'datepicker','type'=>'text','div'=>false,'id'=>'inicioCuatri'));
echo $this->Form->input('fin',array('label'=>'Fecha de termino de cuatrimestre','class'=>'datepicker','type'=>'text','div'=>false,'id'=>'finCuatrimestre'));
echo $this->Form->end('Registrar cuatrimestre');

echo $this->Html->script('scripts');

?>