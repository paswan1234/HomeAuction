<?php
/* @var $this PropertyPhotoController */
/* @var $data PropertyPhoto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_photo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_photo), array('view', 'id'=>$data->id_property_photo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caption')); ?>:</b>
	<?php echo CHtml::encode($data->caption); ?>
	<br />


</div>