<h3>Descargar Planeaciones</h3>

<select id="carreraCoordi" >
	<option value="rxt">--Selecciona una carrera--</option>
<?php 
	
	foreach($carreras as $k =>$carrera):

		echo '<option value="'.$carrera[0]['Career']['id'].'">'.$carrera[0]['Career']['name'].'</option>';

		endforeach;

?>
</select>

<select id="indexUploadExam">
	
	<option value="txt">Selecciona un cuatrimestre</option>
	<option value="1">1ro</option>
	<option value="2">2do</option>
	<option value="3">3ro</option>
	<option value="4">4to</option>
	<option value="5">5to</option>
	<option value="6">6to</option>
	<option value="7">7mo</option>
	<option value="8">8vo</option>
	<option value="9">9no</option>
	<option value="10">10mo</option>

</select>

<select id="apendExam"disabled>
	<option value="txt" >--Sin materias disponibles--</option>
</select>

<select id="parcialUploadTest" disabled>
	<option value="txt">--Seleccione un parcial--</option>
	<option value="1">Primer parcial</option>
	<option value="2">Segundo Parcial</option>
	<option value="3">Tercer parcial</option>
	<option value="4">Cuatrimestral</option>
</select>



<table id="tablaDeExamenes" data-identifier="<?php echo $user_id ?>" hidden >
	<thead>
		<tr>
			<th>Remitente</th>
			<th>Fecha de envio: </th>
			<th>Descripcion</th>
			<th>Descarga</th>
			
		</tr>
	</thead>

	<tbody id="tablaBodyExamenes">
		
	</tbody>


</table>


<?php  echo $this->Html->script('scripts');?>