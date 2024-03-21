<?php
/* @var $this TestiminialController */
/* @var $model Testiminial */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'testiminial-form',
                'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php echo CHtml::hiddenField('Testiminial[id_property]', $id_property); ?>


    <div class="row">
        <?php echo $form->datepickerRow($model, 'date', array('prepend' => '<i class="icon-calendar"></i>')); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'fname', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'lname', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'email', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->textAreaRow($model, 'testimonail', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->radioButtonListInlineRow($model, 'status', array('Active' => 'Active', 'Inactive' => 'Inactive')); ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => $model->isNewRecord ? 'Add' : 'Save',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->