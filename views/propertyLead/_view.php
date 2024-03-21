<?php
/* @var $this PropertyLeadController */
/* @var $data PropertyLead */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_lead')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_lead), array('view', 'id'=>$data->id_property_lead)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
	<?php echo CHtml::encode($data->email_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('move_date')); ?>:</b>
	<?php echo CHtml::encode($data->move_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupants')); ?>:</b>
	<?php echo CHtml::encode($data->occupants); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('yearly_income')); ?>:</b>
	<?php echo CHtml::encode($data->yearly_income); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_type')); ?>:</b>
	<?php echo CHtml::encode($data->lead_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_status')); ?>:</b>
	<?php echo CHtml::encode($data->lead_status); ?>
	<br />

	*/ ?>

</div>