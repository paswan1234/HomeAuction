<?php
/* @var $this PropertyPhotoController */
/* @var $model PropertyPhoto */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'housingauthority-photo-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php echo CHtml::hiddenField('TblHousingauthorityimage[housingauthority_id]', $housingauthority_id); ?>

    <?php
    if (Yii::app()->controller->action->id == 'update'):
        echo CHtml::image(Tools::getBaseUrl() . $model->path.'/'.$model->filename, '', array('width' => 100));
        echo CHtml::hiddenField('TblHousingauthorityimage[old_photo]', $model->filename);
    endif;
    ?>
    <?php echo $form->fileFieldRow($model, 'filename'); ?>

    <?php echo $form->textFieldRow($model, 'caption', array('size' => 60)); ?>

    <?php echo $form->textFieldRow($model, 'sort', array('size' => 6)); ?>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Save',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->