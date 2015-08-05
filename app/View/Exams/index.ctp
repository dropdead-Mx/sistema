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
					<option value="1">1er cuatri</option>
					<option value="2">2do cuatri</option>
					<option value="3">3er cuatri </option>
					<option value="4">4to cuatri </option>
					<option value="5">5to cuatri </option>
					<option value="6">6to cuatri </option>
					<option value="7">7mo cuatri </option>
					<option value="8">8vo cuatri </option>
					<option value="9">9no cuatri </option>
					<option value="10">10mo cuatri </option>
				</select>
			</td>
			<td>
				<select  class="materiasExamen"  disabled>
					<option value='txt'>--Sin materias disponibles--</option>
				</select>
			</td>

			<td class='link' disabled>


				
				

			</td>

		</tr>

<?php endforeach; ?>
	</table>
	
