<h4>cursos impartidos Actualmente</h4>

<table>
	<tr>
		
		<th>Materia</th>
		<th>Cuatrimestre</th>
		<th>Carrera</th>
		<th>Criterios de evaluacion Por parcial</th>
		<th>Evaluar</th>
		<th>Asistencias</th>
	
	</tr>


	<?php foreach($courses as $k => $course): ?>
		<tr>
			
			<td><?php echo $course['Course']['name'] ?></td>
			<td><?php echo $course['Course']['semester'] ?></td>
			<td><?php echo $course['Course']['career_name'] ?></td>
			<td>
			<?php 
			$idmat= $course['Course']['id'];
			$grupo=$course['Course']['grupo_id'];
			$usuario=$course['Course']['teacher_id'];

			$acciones= $this->element('tienecrit',array('idmat'=>$idmat,'grupo'=>$grupo,'usuario'=>$usuario));
			// echo $acciones;
			if($acciones ==='100') {
				echo '1er parcial registrado';
				echo' ';
				
				echo $this->Html->link('Registrar 2do parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],2,$course['Course']['grupo_id']));
				echo' ';

				echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],3,$course['Course']['grupo_id']));
				
			}else if($acciones==='010') {

				echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],1,$course['Course']['grupo_id']));
				
				echo' ';

				echo '2do parcial registrado';
				
				echo' ';


				echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],3,$course['Course']['grupo_id']));

				} else if($acciones==='001'){

				echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],1,$course['Course']['grupo_id']));
				echo' ';


				echo $this->Html->link('Registrar 2do parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],2,$course['Course']['grupo_id']));
				echo' ';

				echo '3do parcial registrado';

				}else if($acciones ==='000'){

				echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],1,$course['Course']['grupo_id']));
				echo' ';


				echo $this->Html->link('Registrar 2do parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],2,$course['Course']['grupo_id']));
				echo' ';


				echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],3,$course['Course']['grupo_id']));
				echo' ';

				} else if($acciones==='111'){

				echo '1er parcial registrado';
				echo' ';

				echo '2do parcial registrado';
				echo' ';

				echo '3er parcial registrado';

				} else if($acciones==='110'){

					echo '1er parcial registrado';
				echo' ';

					echo '2do parcial registrado';
				echo' ';

					echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],3,$course['Course']['grupo_id']));

				}else if($acciones==='011'){

					echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['Course']['teacher_id'],$course['Course']['id'],1,$course['Course']['grupo_id']));
				echo' ';

					echo '2do parcial registrado';
				echo' ';

					echo '3er parcial registrado';

				}


			 ?>
			</td>
			<td><?php echo $this->Html->link('1er parcial',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Course']['career_id'],1,$course['Course']['grupo_id']));?>

				<?php echo $this->Html->link('2do parcial',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Course']['career_id'],2,$course['Course']['grupo_id']));?>

				<?php echo $this->Html->link('3er parcial',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Course']['career_id'],3,$course['Course']['grupo_id']));?>


			</td>

			<td><?php echo $this->Html->link('Asistencia',array('controller'=>'users','action'=>'asistencias',$course['Course']['career_id'],$course['Course']['semester'],$course['Course']['id'],$course['Course']['teacher_id'])); ?></td>
		</tr>
	<?php endforeach;?>
</table>