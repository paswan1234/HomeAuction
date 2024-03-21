<?php
/* @var $this PropertyAmenitiesController */
/* @var $data PropertyAmenities */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_amenities')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_amenities), array('view', 'id'=>$data->id_property_amenities)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_floor_plan')); ?>:</b>
	<?php echo CHtml::encode($data->id_floor_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_amenity')); ?>:</b>
	<?php echo CHtml::encode($data->id_amenity); ?>
	<br />


</div>