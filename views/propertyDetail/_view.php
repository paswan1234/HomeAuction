<?php
/* @var $this PropertyDetailController */
/* @var $data PropertyDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_property_detail), array('view', 'id'=>$data->id_property_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_length')); ?>:</b>
	<?php echo CHtml::encode($data->lease_length); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subsidized')); ?>:</b>
	<?php echo CHtml::encode($data->subsidized); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_one_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_one_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_two_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_two_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_three_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_three_person); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_four_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_four_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_five_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_five_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_six_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_six_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_seven_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_seven_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_limit_eight_person')); ?>:</b>
	<?php echo CHtml::encode($data->income_limit_eight_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_count')); ?>:</b>
	<?php echo CHtml::encode($data->unit_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('structure_type')); ?>:</b>
	<?php echo CHtml::encode($data->structure_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_monday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_monday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_monday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_monday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_tuesday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_tuesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_tuesday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_tuesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_wednesday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_wednesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_wednesday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_wednesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_thursday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_thursday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_thursday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_thursday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_friday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_friday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_friday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_friday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_sturday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_sturday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_sturday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_sturday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_open_sunday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_open_sunday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lease_office_time_close_sunday')); ?>:</b>
	<?php echo CHtml::encode($data->lease_office_time_close_sunday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->pet_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cats_ok')); ?>:</b>
	<?php echo CHtml::encode($data->cats_ok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dogs_ok')); ?>:</b>
	<?php echo CHtml::encode($data->dogs_ok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campnion_aminal')); ?>:</b>
	<?php echo CHtml::encode($data->campnion_aminal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_animal')); ?>:</b>
	<?php echo CHtml::encode($data->service_animal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maximum__pet_weight')); ?>:</b>
	<?php echo CHtml::encode($data->maximum__pet_weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_pet')); ?>:</b>
	<?php echo CHtml::encode($data->max_pet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_term')); ?>:</b>
	<?php echo CHtml::encode($data->other_term); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parking_type')); ?>:</b>
	<?php echo CHtml::encode($data->parking_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assigned_parking')); ?>:</b>
	<?php echo CHtml::encode($data->assigned_parking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parking_fee')); ?>:</b>
	<?php echo CHtml::encode($data->parking_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parking_comments')); ?>:</b>
	<?php echo CHtml::encode($data->parking_comments); ?>
	<br />

	*/ ?>

</div>