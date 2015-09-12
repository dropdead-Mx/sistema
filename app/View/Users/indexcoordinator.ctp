

<section class="datosCoordi">
<nav>
		
	<?php 

	echo $this->element('menu');
	 ?>
	</nav>
<div class="encabezadoCoordi">
<h3>Coordinadores</h3>
<p class="iconoMenu"></p>	
</div>
	
<?php foreach($coordinators as $k => $coordi):?>

	<article>

		<h2>
<?php echo $coordi['EmployeeProfile']['lv_education'].' '.$coordi['User']['name']?>
		</h2>
		<figure>
		<?php echo $this->Html->image('../files/employee_profile/foto/'.$coordi['EmployeeProfile']['foto_dir'].'/'.'thumb_'.$coordi['EmployeeProfile']['foto']) ?>
			
		</figure>
		<div class="textoCoordi">
			
	
		
		
				
			<?php echo $this->Html->link('Ver Carreras',array('action'=>'vercarreras',$coordi['User']['id']))?>
			
		
	
	
	<?php echo $this->Form->postlink('Eliminar',array('action'=>'eliminarcoordi',$coordi['User']['id']),array('confirm'=>'Deceas eliminar a este coordinador ?')); ?>
	
</div>
				
				
		



	



	</article>

<?php endforeach;?>
	

</section>
