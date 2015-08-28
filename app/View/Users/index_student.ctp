
<h3>Listar Estudiantes</h3>


	<span id="rango"  hidden data-rango="<?php echo $current_user['group_id']?>"> z</span>
	<select id="carrerasAlumno">
	<option value="txx">Carrera</option>
		<?php 
		if($current_user['group_id']== 6){

		foreach($carreras as $op => $opcion){

			echo '<option value="'.$opcion[0]['Career']['id'].'">'.$opcion[0]['Career']['name'].'</option>';
		}
		}else if($current_user['group_id']== 5){

			foreach($carreras as $op => $opcion){

			echo '<option value="'.$opcion['Career']['id'].'">'.$opcion['Career']['name'].'</option>';
		}

		}
		?>
	</select>

	<select  id="cuatrimestreAlumno">
		<option value="txt">seleccione un cuatrimestre</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	</select>

	<select  id="gruposPorCarreraYCuatri">
		<option value="txt">Sin grupos</option>
	</select>

	<table id="listadoAlumnos" hidden>
		<tr>
			<th>Nombre</th>
			<th>Matricula</th>
			<th>Email</th>
			<?php 
			if($current_user['group_id']==6){
				echo "<th>Opciones</th>";

			}else if($current_user['group_id']==5){

			}
			?>
			
		
		</tr>



	</table>




<?php echo $this->Html->script('scripts');?>