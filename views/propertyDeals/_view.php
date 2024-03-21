<?php
/* @var $this PropertyDealsController */
/* @var $data PropertyDeals */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_delas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_delas), array('view', 'id'=>$data->id_property_delas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header_description')); ?>:</b>
	<?php echo CHtml::encode($data->header_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special')); ?>:</b>
	<?php echo CHtml::encode($data->special); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_frame_from')); ?>:</b>
	<?php echo CHtml::encode($data->time_frame_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_frame_to')); ?>:</b>
	<?php echo CHtml::encode($data->time_frame_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_floor_plan')); ?>:</b>
	<?php echo CHtml::encode($data->id_floor_plan); ?>
	<br />


</div>