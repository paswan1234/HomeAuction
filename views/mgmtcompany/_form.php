<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'mgmtcompany-form',
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

    <div class="row">
        <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row">
        <?php echo $form->fileFieldRow($model, 'logo'); ?>
    </div>
    <div class="row">
    <?php
    if (Yii::app()->controller->action->id == 'update'):
        echo CHtml::image(Tools::getBaseUrl() . $model->logo, '', array('width' => 150));        
        echo CHtml::hiddenField('Mgmtcompany[old_logo]', $model->logo);
    endif;
    ?>   
    </div>
    <div class="row">
        <?php echo $form->textFieldRow($model, 'id_number', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row">
        <?php echo $form->textFieldRow($model, 'total_units', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'style' => 'width:450px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'address', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'city', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->dropDownListRow($model, 'state', CHtml::listData(State::model()->findAll(array('order' => 'abbr')), 'abbr', 'abbr'), array('style' => 'width:90px')); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'zip', array('size' => 5, 'maxlength' => 5)); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'phone', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    
    <div class="row">
        <?php echo $form->textFieldRow($model, 'fax', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row">
        <?php echo $form->textFieldRow($model, 'latitude', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row">
        <?php echo $form->textFieldRow($model, 'longitude', array('size' => 60, 'maxlength' => 128)); ?>
    </div>    
    <div class="row">
        <?php echo $form->textFieldRow($model, 'url', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row">
        <?php echo $form->textFieldRow($model, 'video_link', array('size' => 60)); ?>
    </div>
    
    <div class="row">
        <?php echo $form->textFieldRow($model, 'contact', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    
    <div class="row">
        <?php echo $form->textFieldRow($model, 'contact_phone', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    
    <div class="row">
        <?php echo $form->textFieldRow($model, 'contact_email', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    
    <div class="row">
        <?php echo $form->textAreaRow($model, 'note', array('rows' => 6, 'cols' => 50, 'style' => 'width:450px;')); ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Submit',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
