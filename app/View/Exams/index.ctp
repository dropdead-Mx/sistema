<h3>Asignar Fechas de examenes</h3>

<?php $contador=count($careers);

?>

				<?php echo $this->Html->script('jquery');?>

				<?php $link = $this->Js->buffer('jQuery(function(){
					


					$("select.selectCuatri").on("change",function(){
						carrera=$(this).val();
						// $(" td a ").attr("href");
						var link = $(this).parent("td").parent("tr").children("td.link").children("a");
						link.css("color","red");
						
						link.attr("href",link.attr("href").replace(/(\d+)(?!.*\d)/,""+carrera));


					});

					});',array('inline'=>false));

					// echo $link; ?>

 <?php  
 // for($x=1; $x<= $contador ; $x++){ 
 	foreach($careers2 as $key => $carrera):
 	?>
	<table>
		<tr>
			<th>Carrera</th>
			<th>Cuatrimestre</th>
		
			<th>Crear fechas de examen</th>
		</tr>

		<tr>
			<td><?php echo $carrera['Career']['name']; ?></td>
			<td>
				<select name="cuatimestres" class="selectCuatri">
					<option value>--Selecciona el Cuatrimestre</option>
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
			
			<td class='link'>



				<?php echo $this->Html->link('Asignar fechas',array('action'=>'add',$carrera['Career']['id'],$id,1));
				?>

			</td>

		</tr>


	</table>

	<br>
<?php endforeach; ?>
	
