<?php
/* @var $this PropertyController */
/* @var $data Property */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property), array('view', 'id'=>$data->id_property)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_title')); ?>:</b>
	<?php echo CHtml::encode($data->property_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_address')); ?>:</b>
	<?php echo CHtml::encode($data->property_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_city')); ?>:</b>
	<?php echo CHtml::encode($data->property_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_state')); ?>:</b>
	<?php echo CHtml::encode($data->property_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_zip')); ?>:</b>
	<?php echo CHtml::encode($data->property_zip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('property_type')); ?>:</b>
	<?php echo CHtml::encode($data->property_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_line')); ?>:</b>
	<?php echo CHtml::encode($data->tag_line); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>
