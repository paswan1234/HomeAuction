<?php
/* @var $this PropertyFloorPlanController */
/* @var $model PropertyFloorPlan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_floor_plan'); ?>
		<?php echo $form->textField($model,'id_floor_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_property'); ?>
		<?php echo $form->textField($model,'id_property'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'floor_plan_name'); ?>
		<?php echo $form->textField($model,'floor_plan_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beds'); ?>
		<?php echo $form->textField($model,'beds',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'baths'); ?>
		<?php echo $form->textField($model,'baths',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'square_feet_from'); ?>
		<?php echo $form->textField($model,'square_feet_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'square_feet_to'); ?>
		<?php echo $form->textField($model,'square_feet_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rent_from'); ?>
		<?php echo $form->textField($model,'rent_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rent_to'); ?>
		<?php echo $form->textField($model,'rent_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'required_deposit'); ?>
		<?php echo $form->textField($model,'required_deposit',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deposit_description'); ?>
		<?php echo $form->textArea($model,'deposit_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_fee'); ?>
		<?php echo $form->textField($model,'application_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'display_status'); ?>
		<?php echo $form->textField($model,'display_status',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'floor_plan_diagram'); ?>
		<?php echo $form->textField($model,'floor_plan_diagram',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'floor_plan_photo'); ?>
		<?php echo $form->textField($model,'floor_plan_photo',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->