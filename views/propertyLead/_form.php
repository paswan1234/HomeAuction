<?php
/* @var $this PropertyLeadController */
/* @var $model PropertyLead */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'property-lead-form',
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
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'move_date'); ?>
		<?php echo $form->textField($model,'move_date'); ?>
		<?php echo $form->error($model,'move_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'occupants'); ?>
		<?php echo $form->textField($model,'occupants'); ?>
		<?php echo $form->error($model,'occupants'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yearly_income'); ?>
		<?php echo $form->textField($model,'yearly_income'); ?>
		<?php echo $form->error($model,'yearly_income'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lead_type'); ?>
		<?php echo $form->textField($model,'lead_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lead_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lead_status'); ?>
		<?php echo $form->textField($model,'lead_status',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'lead_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->