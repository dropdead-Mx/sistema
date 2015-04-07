<?php 
// pr($careers);
echo $this->Form->create();
?>
<table>
<tr>
	<th>Coordinador</th>
	<th>Carrera</th>
</tr>
<?php
		$contador = count($careers);
		// echo $contador;
		for ($x=1; $x <= $contador ; $x++){
			$value =$careers[$x+10];?>
			
			<tr>
			
			<td><?php  echo implode($teacher) ?></td>
			<td>
			<?php echo $this->Form->input('Usrcareer.'.$x.'.career_id',array('value'=>$x+10,'hiddenField' => false,'label'=>$value,'div'=>false,'multiple'=>true,'type'=>'checkbox'));?>
			</td>

			</tr>

			<?php echo $this->Form->hidden('Usrcareer.'.$x.'.user_id',array('value'=>$id,'div'=>false));?>
		
		<?php }?>

			</table>
<?php
echo $this->Form->end('Asignar carreras');
		


?>