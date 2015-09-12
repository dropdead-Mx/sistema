<section class="carrerasCoordi">


<nav class="vercarreras">
		
	<?php 

	echo $this->element('menu');
	 ?>
	</nav>

<div class="encabezadoCoordi">
<h3>Carreras</h3>
<p class="iconoMenu"></p>	
</div>

<div class="administradas">
<h2>Carreras Administradas por:</h2>
<h3><?php echo implode($nombre);?></h3>
</div>



<table class="carreras">
	


	<?php foreach($todo as $k => $administra): ?>
		
		<tr>
		
		
		<td class="nombre"> <?php echo $career[$administra['Usrcareer']['career_id']];?> </td>
		<td class="accion"> <?php echo $this->Form->postlink('Eliminar',array('action'=>'eliminacc',$administra['Usrcareer']['id'],$administra['Usrcareer']['user_id']),array('confirm'=>'Deceas dar de baja el control de la carrera: '.$career[$administra['Usrcareer']['career_id']].' para este usuario'));?></td>
		</tr>

<?php endforeach;?>

</table>

<!--
<?php echo $this->Html->link('Volver atras',array('controller'=>'users','action'=>'indexcoordinator'));?>  -->
</section>