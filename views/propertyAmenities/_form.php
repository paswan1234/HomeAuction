<?php
/* @var $this PropertyAmenitiesController */
/* @var $model PropertyAmenities */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'property-amenities-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_property'); ?>
		<?php echo $form->textField($model,'id_property'); ?>
		<?php echo $form->error($model,'id_property'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_floor_plan'); ?>
		<?php echo $form->textField($model,'id_floor_plan'); ?>
		<?php echo $form->error($model,'id_floor_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_amenity'); ?>
		<?php echo $form->textField($model,'id_amenity'); ?>
		<?php echo $form->error($model,'id_amenity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->