<?php
/* @var $this ParkingTypeController */
/* @var $data ParkingType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parking_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parking_type), array('view', 'id'=>$data->id_parking_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>