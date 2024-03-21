<?php
/* @var $this AmenitiesController */
/* @var $data Amenities */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_amenity')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_amenity), array('view', 'id'=>$data->id_amenity)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat')); ?>:</b>
	<?php echo CHtml::encode($data->cat); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>