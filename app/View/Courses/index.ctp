<h2>Listado De Materias</h2>


<select id='carreraCoordiListado'>
	<option value='0'>--Seleccione una carrera --</option>
	<?php 
	for($z=0;$z<= sizeof($carreras)-1;$z++){
		echo '<option value="'.$carreras[$z][0]['Career']['id'].'">'.$carreras[$z][0]['Career']['abrev'].'</option>';
	}

	?>
</select>

<select id='cuatriCoordiListado'>
	<option value="0">--Seleccione un cuatrimestre--</option>
	<option value="1">1°</option>
	<option value="2">2°</option>
	<option value="3">3°</option>
	<option value="4">4°</option>
	<option value="5">5°</option>
	<option value="6">6°</option>
	<option value="7">7°</option>
	<option value="8">8°</option>
	<option value="9">9°</option>
	<option value="10">10°</option>

</select>

<!-- <button id='buscarMaterias'> Buscar Materias</button> -->



<table id='listadoDeMaterias' hidden >

	<tr>
		<!-- <th>Id</th> -->
		<th>Nombre</th>
		<!-- <th>Cuatrimestre</th> -->
		<th>Grupo</th>
		<th>opciones</th>
		<!-- <th>Modulos</th>  -->
		<th>Tiene horario registrado</th>
<!-- 		<th>Carrera</th>
		<th>Impartida por:</th>
		<th>Acciones</th>
		<th>Modulos</th> -->
	</tr>
	
</table>

<?php  echo $this->Html->script(array('scripts'));
// echo $this->Html->link('Agregar Horario',array('action'=>'addModule','idmateria','idcourse')); 

// echo $this->Html->link('Ver modulos',array('action'=>'vermodulos','idmateria'));
 ?>
 <!-- <a href="/sistema/courses/addModule/idmateria/idcourse">Agregar Horario</a> -->
