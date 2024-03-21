<?php
/* @var $this ParkingTypeController */
/* @var $model ParkingType */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'parking-type-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 150)); ?>
<?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'value'); ?>
<?php echo $form->textField($model, 'value', array('size' => 60, 'maxlength' => 150)); ?>
<?php echo $form->error($model, 'value'); ?>
    </div>

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