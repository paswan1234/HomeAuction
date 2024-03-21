<?php
/* @var $this PropertyDealsController */
/* @var $model PropertyDeals */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_property_delas'); ?>
		<?php echo $form->textField($model,'id_property_delas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_property'); ?>
		<?php echo $form->textField($model,'id_property'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'header_description'); ?>
		<?php echo $form->textArea($model,'header_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'special'); ?>
		<?php echo $form->textArea($model,'special',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_frame_from'); ?>
		<?php echo $form->textField($model,'time_frame_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_frame_to'); ?>
		<?php echo $form->textField($model,'time_frame_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_floor_plan'); ?>
		<?php echo $form->textField($model,'id_floor_plan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->