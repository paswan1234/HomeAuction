<?php
/* @var $this RentersDetailController */
/* @var $data RentersDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_renter_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_renter_detail), array('view', 'id'=>$data->id_renter_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moving_address')); ?>:</b>
	<?php echo CHtml::encode($data->moving_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moving_city')); ?>:</b>
	<?php echo CHtml::encode($data->moving_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moving_state')); ?>:</b>
	<?php echo CHtml::encode($data->moving_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moving_zip')); ?>:</b>
	<?php echo CHtml::encode($data->moving_zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />


</div>