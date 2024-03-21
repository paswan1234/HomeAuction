<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'banner-form',
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

    <?php
    if (Yii::app()->controller->action->id == 'update'):
        echo CHtml::image(Tools::getBaseUrl() . $model->image, '', array('width' => 100));
        echo CHtml::hiddenField('Banner[old_image]', $model->image);
    endif;
    ?>
    <?php echo $form->fileFieldRow($model, 'image'); ?>
    
    <?php echo $form->dropDownListRow($model, 'status',array('Active'=>'Active','Inactive'=>'Inactive')); ?>


    

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