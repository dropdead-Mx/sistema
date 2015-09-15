<h3>Consultar calificaciones </h3>
<span hidden class="rangoUser" data-rango="<?php echo $current_user['group_id'];?>"></span>
<?php 

// pr($carreras);


echo '<select id="infocalif">';
echo '<option value="0" >Seleccione una carrera</option>';

if($current_user['group_id']==6){

foreach($infocarreras as $x => $info):
	echo '<option value='.$info[0]['Career']['id'].'>'.$info[0]['Career']['name'].'</option>';

endforeach;

}else if($current_user['group_id'] ==5){
	
foreach($infocarreras as $x => $info):
	echo '<option value='.$info['Career']['id'].'>'.$info['Career']['name'].'</option>';

endforeach;
}

echo '</select>';
?>

<select  id="cuatrimestre">
	<option value="0">Seleccione un cuatrimestre</option>
	<option value="1">1er Cuatrimestre</option>
	<option value="2">2do Cuatrimestre</option>
	<option value="3">3er Cuatrimestre</option>
	<option value="4">4to Cuatrimestre</option>
	<option value="5">5to Cuatrimestre</option>
	<option value="6">6to Cuatrimestre</option>
	<option value="7">7mo Cuatrimestre</option>
	<option value="8">8vo Cuatrimestre</option>
	<option value="9">9no Cuatrimestre</option>
	<option value="10">10mo Cuatrimestre</option>

</select>


<select  id="materiasporcarrera">
	<option class="noMaterias">--Sin materias--</option>
</select>

<select id="gruposConsultarCalif">
	<option value="txt">--Sin grupos--</option>
</select>
<select  id="parciales">
	<option value="0"> -- Seleccione el parcial -- </option>
	<option value="1"> 1er Parcial </option>
	<option value="2"> 2do Parcial </option>
	<option value="3"> 3er Parcial </option>
	<option value="4"> Cuatrimestral </option>
	<option value="5"> Calificaciones finales</option>
</select>

<button id="buscarCalificaciones">Buscar</button>
<section class='pintaCalificaciones'>
	
</section>
<?php echo $this->Html->script('scripts');?>