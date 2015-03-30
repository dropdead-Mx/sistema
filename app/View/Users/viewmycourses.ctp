<h4>cursos impartidos Actualmente</h4>

<table>
	<tr>
		
		<th>Materia</th>
		<th>Cuatrimestre</th>
		<th>Carrera</th>
		<th>Criterios de evaluacion Por parcial</th>
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
			// echo $acciones;
			if($acciones ==='100') {
				echo '1er parcial registrado';
				echo' ';
				
				echo $this->Html->link('Registrar 2do parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],2));
				echo' ';

				echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],3));
				
			}else if($acciones==='010') {

				echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],1));
				
				echo' ';

				echo '2do parcial registrado';
				
				echo' ';


				echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],3));

				} else if($acciones==='001'){

				echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],1));
				echo' ';


				echo $this->Html->link('Registrar 2do parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],2));
				echo' ';

				echo '3do parcial registrado';

				}else if($acciones ==='000'){

				echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],1));
				echo' ';


				echo $this->Html->link('Registrar 2do parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],2));
				echo' ';


				echo $this->Html->link('Registrar 3er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],3));
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
					$course['User']['id'],$course['Course']['id'],3));

				}else if($acciones==='011'){

					echo $this->Html->link('Registrar 1er parcial',array('controller'=>'goals','action'=>'add',
					$course['User']['id'],$course['Course']['id'],1));
				echo' ';

					echo '2do parcial registrado';
				echo' ';

					echo '3er parcial registrado';

				}


			 ?>
			</td>
			<td><?php echo $this->Html->link('1er parcial',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Career']['id'],1));?>

				<?php echo $this->Html->link('2do parcial',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Career']['id'],2));?>

				<?php echo $this->Html->link('3er parcial',array('controller'=>'users','action'=>'calificar',$course['Course']['id'],$course['Course']['semester'],$course['Career']['id'],3));?>


			</td>
		</tr>
	<?php endforeach;?>
</table>