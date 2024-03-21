<?php
/* @var $this PropertyFloorPlanController */
/* @var $data PropertyFloorPlan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_floor_plan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_floor_plan), array('view', 'id'=>$data->id_floor_plan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floor_plan_name')); ?>:</b>
	<?php echo CHtml::encode($data->floor_plan_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beds')); ?>:</b>
	<?php echo CHtml::encode($data->beds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('baths')); ?>:</b>
	<?php echo CHtml::encode($data->baths); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('square_feet_from')); ?>:</b>
	<?php echo CHtml::encode($data->square_feet_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('square_feet_to')); ?>:</b>
	<?php echo CHtml::encode($data->square_feet_to); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rent_from')); ?>:</b>
	<?php echo CHtml::encode($data->rent_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rent_to')); ?>:</b>
	<?php echo CHtml::encode($data->rent_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('required_deposit')); ?>:</b>
	<?php echo CHtml::encode($data->required_deposit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposit_description')); ?>:</b>
	<?php echo CHtml::encode($data->deposit_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_fee')); ?>:</b>
	<?php echo CHtml::encode($data->application_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_status')); ?>:</b>
	<?php echo CHtml::encode($data->display_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floor_plan_diagram')); ?>:</b>
	<?php echo CHtml::encode($data->floor_plan_diagram); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floor_plan_photo')); ?>:</b>
	<?php echo CHtml::encode($data->floor_plan_photo); ?>
	<br />

	*/ ?>

</div>