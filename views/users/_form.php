<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'users-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'fname', array('size' => 60, 'maxlength' => 256)); ?>

    <?php echo $form->textFieldRow($model, 'lname', array('size' => 60, 'maxlength' => 256)); ?>

    <?php echo $form->textFieldRow($model, 'email', array('size' => 60, 'maxlength' => 256)); ?>

    <?php echo $form->textFieldRow($model, 'phone_number', array('size' => 60, 'maxlength' => 100)); ?>

    <?php echo $form->textAreaRow($model, 'Address', array('rows' => 6)); ?>

    <?php echo $form->textFieldRow($model, 'city', array('size' => 60, 'maxlength' => 100)); ?>

    <?php echo $form->textFieldRow($model, 'state', array('size' => 60, 'maxlength' => 100)); ?>

    <?php echo $form->textFieldRow($model, 'zip', array('size' => 15, 'maxlength' => 15)); ?>

    <?php echo $form->dropDownListRow($model, 'status', array('Active' => 'Active', 'Deactive' => 'Deactive')); ?>

    <?php echo CHtml::hiddenField('Users[user_type]', $type); ?>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => $model->isNewRecord ? 'Add' : 'Save',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->