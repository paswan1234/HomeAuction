<?php
/* @var $this CmsController */
/* @var $model Cms */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'cms-form',
                'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <?php echo $form->dropDownListRow($model, 'parent_menu', array('Home'=>'Home','Housing Authority'=>'Housing Authority')); ?>

    <?php echo $form->textFieldRow($model, 'page_title', array('size' => 60, 'maxlength' => 256)); ?>

    <?php echo $form->ckEditorRow($model, 'desc', array('rows' => 6, 'cols' => 50)); ?>
    
    <?php echo $form->textFieldRow($model, 'page_slug', array('size' => 60, 'maxlength' => 256)); ?>
    
    <?php echo $form->dropDownListRow($model, 'right_side', array( 'No' => 'No','Yes' => 'Yes')); ?>

    <?php echo $form->dropDownListRow($model, 'status', array('Active' => 'Active', 'Inactive' => 'Inactive')); ?>


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