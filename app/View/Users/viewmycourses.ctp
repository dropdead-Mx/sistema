<h4>cursos impartidos Actualmente</h4>

<table>
	<tr>
		
		<th>Materia</th>
		<th>Cuatrimestre</th>
		<th>Carrera</th>
		<th>Criterios de evaluacion</th>
		<th>Evaluar</th>
	
	</tr>


	<?php foreach($courses as $k => $course): ?>
		<tr>
			
			<td><?php echo $course['Course']['name'] ?></td>
			<td><?php echo $course['Course']['semester'] ?></td>
			<td><?php echo $course['Career']['name'] ?></td>
			<td>
			<?php $idmat= $course['Course']['id'];

			$acciones= $this->element('tienecrit',array('idmat'=>$idmat));
			if($acciones ==='no') {
				echo $this->Html->link('Aun no tienes algun criterio de evaluacion registrado',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id']));
			}else {
				echo 'Si ';
				// echo $this->Html->link('Agrega Mas criterios',array('controller'=>'goals','action'=>'add'));

			}


			 ?>
			</td>
			<td><?php echo $this->Html->link('Evaluar',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Career']['id']));?></td>
		</tr>
	<?php endforeach;?>
</table>