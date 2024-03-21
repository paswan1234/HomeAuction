<?php
/* @var $this StateController */
/* @var $model State */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'state-form',
                'enableAjaxValidation' => false,
            )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>100,'readonly'=>true)); ?>

	<?php echo $form->ckEditorRow($model, 'info', array('rows' => 6, 'cols' => 50)); ?>

<?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => $model->isNewRecord ? 'Add' : 'Save',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
<?php $this->endWidget(); ?>

</div><!-- form -->
