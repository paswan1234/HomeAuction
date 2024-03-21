<?php
/* @var $this PropertyPhotoController */
/* @var $model PropertyPhoto */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'property-photo-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>

    
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <label>Management Company</label>
        <?php echo CHtml::dropDownList('managed_by', '', CHtml::listData(Mgmtcompany::model()->findAll(array('order' => 'name')), 'id', 'name'), array('prompt' => '- Select -')); ?>
    </div>
    <div class="row">
        <label>Upload CSV File</label>
        <?php echo CHtml::fileField('uploadfile'); ?>
    </div>


    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Upload CSV',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
