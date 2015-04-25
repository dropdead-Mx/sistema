<h3>Bienvenido <?php echo implode($nombre); ?></h3>
<?php 

// pr($cuatrimestre);
// pr($materia);
foreach ($materia as $k =>$materias):
?>
<table>
	<tr>
		<th>Materia</th>
		<th>impartida por:</th>
	</tr>

	<tr>
		<td><?php echo $materias['Course']['name']; ?></td>
		<td><?php echo $materias['User']['name']; ?></td>
	</tr>
</table>

<?php endforeach;?>