<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
 <tr>

  <th><?php echo CHtml::activeLabelEx(Personas::model(),'nombre'); ?></th>
  <th><?php echo CHtml::activeLabelEx(Personas::model(),'apellido'); ?></th>
  <th><?php echo CHtml::activeLabelEx(Personas::model(),'sexo'); ?></th>
   <th><?php echo CHtml::activeLabelEx(Personas::model(),'cedula'); ?></th>
 </tr>
 <?php foreach($personas as $i=>$persona): ?>
 <tr>
  <td><?php echo CHtml::activeTextField($persona,"[$i]nombre"); ?></td>
  <td><?php echo CHtml::activeTextField($persona,"[$i]apellido"); ?></td>
  <td><?php echo CHtml::activeTextField($persona,"[$i]sexo"); ?></td>
  <td><?php echo CHtml::activeTextField($persona,"[$i]cedula"); ?></td>
  
 </tr>
 <?php endforeach; ?>
</table>

<?php echo CHtml::submitButton('Grabar'); ?>
<?php echo CHtml::endForm(); ?>
</div>