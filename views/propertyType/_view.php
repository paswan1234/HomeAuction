<?php
/* @var $this PropertyTypeController */
/* @var $data PropertyType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_type), array('view', 'id'=>$data->id_property_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>