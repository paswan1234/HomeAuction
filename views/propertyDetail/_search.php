<?php
/* @var $this PropertyDetailController */
/* @var $model PropertyDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_property_detail'); ?>
		<?php echo $form->textField($model,'id_property_detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_property'); ?>
		<?php echo $form->textField($model,'id_property'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_length'); ?>
		<?php echo $form->textField($model,'lease_length',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subsidized'); ?>
		<?php echo $form->textField($model,'subsidized'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_one_person'); ?>
		<?php echo $form->textField($model,'income_limit_one_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_two_person'); ?>
		<?php echo $form->textField($model,'income_limit_two_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_three_person'); ?>
		<?php echo $form->textField($model,'income_limit_three_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_four_person'); ?>
		<?php echo $form->textField($model,'income_limit_four_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_five_person'); ?>
		<?php echo $form->textField($model,'income_limit_five_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_six_person'); ?>
		<?php echo $form->textField($model,'income_limit_six_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_seven_person'); ?>
		<?php echo $form->textField($model,'income_limit_seven_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'income_limit_eight_person'); ?>
		<?php echo $form->textField($model,'income_limit_eight_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_count'); ?>
		<?php echo $form->textField($model,'unit_count',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'structure_type'); ?>
		<?php echo $form->textField($model,'structure_type',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_monday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_monday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_monday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_monday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_tuesday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_tuesday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_tuesday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_tuesday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_wednesday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_wednesday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_wednesday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_wednesday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_thursday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_thursday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_thursday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_thursday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_friday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_friday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_friday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_friday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_sturday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_sturday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_sturday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_sturday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_open_sunday'); ?>
		<?php echo $form->textField($model,'lease_office_time_open_sunday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lease_office_time_close_sunday'); ?>
		<?php echo $form->textField($model,'lease_office_time_close_sunday',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pet_allowed'); ?>
		<?php echo $form->textField($model,'pet_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cats_ok'); ?>
		<?php echo $form->textField($model,'cats_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dogs_ok'); ?>
		<?php echo $form->textField($model,'dogs_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'campnion_aminal'); ?>
		<?php echo $form->textField($model,'campnion_aminal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_animal'); ?>
		<?php echo $form->textField($model,'service_animal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maximum__pet_weight'); ?>
		<?php echo $form->textField($model,'maximum__pet_weight',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_pet'); ?>
		<?php echo $form->textField($model,'max_pet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_term'); ?>
		<?php echo $form->textArea($model,'other_term',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parking_type'); ?>
		<?php echo $form->textField($model,'parking_type',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assigned_parking'); ?>
		<?php echo $form->textField($model,'assigned_parking'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parking_fee'); ?>
		<?php echo $form->textField($model,'parking_fee',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parking_comments'); ?>
		<?php echo $form->textArea($model,'parking_comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->