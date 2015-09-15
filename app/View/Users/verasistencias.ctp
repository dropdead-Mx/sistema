<h3>Consultar asistencias</h3>

<select id="asistenciaCarrera" data-tipo="<?php echo $current_user['group_id']; ?>">
	<option value="txt">Seleccione una carrera</option>
	<?php 
	if($current_user['group_id']== 6 ){
		foreach($carreras as $k =>$carrera){
			echo '<option value="'.$carrera['career_id'].'">'.$carrera['career_abrev'].'</option>';
			
		}
	}else if($current_user['group_id']== 5){
		foreach($carreras as $k =>$carrera){
			echo '<option value="'.$carrera['Career']['id'].'">'.$carrera['Career']['abrev'].'</option>';
			
		}
	}

	?>
</select>


<select  id="cuatriAsistencia" >
	<option value="txt">Seleccione un cuatrimestre</option>
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

<select id="materiaAsistencia">
	<option value="txt">Sin materias</option>
</select>

<select  id="asistGrupo">
	<option value="txt">Sin grupos</option>
	
</select>

<button id="buscaAsistencia">Buscar</button>
<form id="opcionBusqueda">
<input type="radio" name="busca" value="dia">Por dia
<input type="radio" name="busca" value="rango">Por rango
</form>




	
<input type="text"  id="fechaAsistencia1" class="datepicker" hidden >
<input type="text"  id="fechaAsistencia2" class="datepicker" hidden>

<div id="seccionAsistencias">
	
<table id="resultadosAsistencias" hidden>

	<tr>
		<th>Nombre</th>
		<th>Fecha</th>
		<th>Estatus</th>
		<th>Nota</th>
		<?php 

		if($current_user['group_id']==6){

		echo "<th>Editar</th>";
		}

		?>
	</tr>
</table>
</div>




<?php 
	// if($current_user['group_id']==6){

echo $this->Html->script('scripts');
	// }
?>