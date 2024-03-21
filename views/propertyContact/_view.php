<?php
/* @var $this PropertyContactController */
/* @var $data PropertyContact */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_contact')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_contact), array('view', 'id'=>$data->id_property_contact)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_contact_fname')); ?>:</b>
	<?php echo CHtml::encode($data->billing_contact_fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_contact_lname')); ?>:</b>
	<?php echo CHtml::encode($data->billing_contact_lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_cc_invoice_one')); ?>:</b>
	<?php echo CHtml::encode($data->billing_cc_invoice_one); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_cc_invoice_two')); ?>:</b>
	<?php echo CHtml::encode($data->billing_cc_invoice_two); ?>
	<br />

	*/ ?>

</div>