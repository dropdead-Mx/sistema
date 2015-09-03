

<section class="datosCoordi">
<h3>Coordinadores</h3>
	
<?php foreach($coordinators as $k => $coordi):?>

	<article>
		<h2>
<?php echo $coordi['EmployeeProfile']['lv_education'].' '.$coordi['User']['name'].' '.$coordi['User']['amat'].' '.$coordi['User']['apat'] ?>
		</h2>

		<figure>
		<?php echo $this->Html->image('../files/employee_profile/foto/'.$coordi['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$coordi['EmployeeProfile']['foto']) ?>
			
		</figure>
		<div class="textoCoordi">
			<p class="asignaCarrera">Asignar Carreras</p>
			<p class="verCarreras">Ver Carreras</p>
			<p class="editar">Editar Perfil</p>
			<p class="eliminar">Eliminar</p>
	
	
			<?php echo $this->Html->link('Asignar carreras',array('action'=>'assigncareers',$coordi['User']['id'])); ?>
				
			<?php echo $this->Html->link('Ver carreras',array('action'=>'vercarreras',$coordi['User']['id']))?>

	<?php echo $this->Html->link(' Editar perfil', array('action'=>'editacoordinador',$coordi['User']['id'])); ?>
				

				
	<?php echo $this->Form->postlink('Eliminar',array('action'=>'eliminarcoordi',$coordi['User']['id']),array('confirm'=>'Deceas eliminar a este coordinador ?')); ?>
				
		
		</div>


	
	



	</article>

<?php endforeach;?>
	

</section>
