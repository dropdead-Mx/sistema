<?php 

echo $this->Form->create();
?>
<table>
<tr>
	<th>Coordinador</th>
	<th>Carrera</th>
</tr>
<?php

		foreach($careers as $K =>$carreras):

			?>
			
			<tr>
			
			<td><?php  echo implode($teacher) ?></td>
			<td>
			<?php echo $this->Form->input('Usrcareer.'.$K.'.career_id',array('value'=>$carreras['Career']['id'],'hiddenField' => false,'label'=>$carreras['Career']['name'],'div'=>false,'multiple'=>true,'type'=>'checkbox'));?>
			</td>

			</tr>

			<?php echo $this->Form->hidden('Usrcareer.'.$K.'.user_id',array('value'=>$id,'div'=>false));?>
		
		<?php 
		endforeach;
		?>

			</table>
<?php
echo $this->Form->end('Asignar carreras');
		


?>