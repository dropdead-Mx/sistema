<h3>Consultar horarios de examenes y clases</h3>

<select id="carreraHorario">
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


<select  id="cuatriHorario">
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