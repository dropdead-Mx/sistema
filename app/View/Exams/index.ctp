<h3>Asignar Fechas de examenes</h3>

<?php 
$contador=count($careers);

echo $this->Html->script('scripts');
?>
<span class="userId" data-id=<?php echo $id; ?> hidden></span>
	<table>
		<tr>
			<th>Carrera</th>
			<th>Cuatrimestre</th>
			<th>Materia</th>
			<th>Grupo</th>
			<th>Crear fechas de examen</th>
		</tr>
 <?php  
 // for($x=1; $x<= $contador ; $x++){ 
 	foreach($careers2 as $key => $carrera):
 	?>
	

		<tr>
			<td>
			<p class="carreraSetExams" data-id =<?php echo $carrera['Career']['id']; ?> >
						
			<?php echo $carrera['Career']['name']; ?>	
			</p>

			</td>
			<td>
				<select name="cuatimestres" class="selectCuatri">
					<option value='txt'>--Selecciona el Cuatrimestre</option>
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
			</td>
			<td>
				<select  class="materiasExamen"  disabled>
					<option value='txt'>--Sin materias disponibles--</option>
				</select>
			</td>
			<td>
				<select class="gruposExamen" disabled>
					<option value="txt">--Sin grupos--</option>
				</select>
			</td>

			<td class='link' disabled>


				
				

			</td>

		</tr>

<?php endforeach; ?>
	</table>
	
