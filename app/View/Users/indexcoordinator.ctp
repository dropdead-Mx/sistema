

<section class="datosCoordi">
<h3>Coordinadores</h3>
	
<?php foreach($coordinators as $k => $coordi):?>

	<article>
		<h2>
<?php echo $coordi['EmployeeProfile']['lv_education'].' '.$coordi['User']['name']?>
		</h2>

		<figure>
		<?php echo $this->Html->image('../files/employee_profile/foto/'.$coordi['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$coordi['EmployeeProfile']['foto']) ?>
			
		</figure>
		<div class="textoCoordi">
			
	
	
			<?php echo $this->Html->link('Asignar carreras',array('action'=>'assigncareers',$coordi['User']['id'])); ?>
				
			<?php echo $this->Html->link('Ver carreras',array('action'=>'vercarreras',$coordi['User']['id']))?>

	<?php echo $this->Html->link(' Editar perfil', array('action'=>'editacoordinador',$coordi['User']['id'])); ?>
				

				
	<?php echo $this->Form->postlink('Eliminar',array('action'=>'eliminarcoordi',$coordi['User']['id']),array('confirm'=>'Deceas eliminar a este coordinador ?')); ?>
				
		



	
	



	</article>

<?php endforeach;?>
	

</section>
