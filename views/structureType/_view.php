<?php
/* @var $this StructureTypeController */
/* @var $data StructureType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_structure_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_structure_type), array('view', 'id'=>$data->id_structure_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>