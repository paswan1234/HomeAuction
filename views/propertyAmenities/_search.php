<?php
/* @var $this PropertyAmenitiesController */
/* @var $model PropertyAmenities */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_property_amenities'); ?>
		<?php echo $form->textField($model,'id_property_amenities'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_property'); ?>
		<?php echo $form->textField($model,'id_property'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_floor_plan'); ?>
		<?php echo $form->textField($model,'id_floor_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_amenity'); ?>
		<?php echo $form->textField($model,'id_amenity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->