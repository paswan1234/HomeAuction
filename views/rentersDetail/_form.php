<?php
/* @var $this RentersDetailController */
/* @var $model RentersDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'renters-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moving_address'); ?>
		<?php echo $form->textField($model,'moving_address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'moving_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moving_city'); ?>
		<?php echo $form->textField($model,'moving_city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'moving_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moving_state'); ?>
		<?php echo $form->textField($model,'moving_state',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'moving_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moving_zip'); ?>
		<?php echo $form->textField($model,'moving_zip',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'moving_zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->