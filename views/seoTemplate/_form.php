<?php
/* @var $this SeoTemplateController */
/* @var $model SeoTemplate */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'seo-template-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'home'); ?>
<?php echo $form->dropDownList($model, 'home', array('Senior Housing' => 'Senior Housing', 'Section 8 Housing' => 'Section 8 Housing', 'Affordable housing' => 'Affordable housing', 'Housing authority' => 'Housing authority'), array('prompt' => 'Select Home Type')); ?>
<?php echo $form->error($model, 'home'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'state'); ?>
        <?php
        echo CHtml::dropDownList('SeoTemplate[state]', $model->state, CHtml::listData(State::model()->findAll(array('order' => 'name ASC')), 'abbr', 'name'), array(
            'prompt' => 'Select a State',
            'ajax' => array('type' => 'POST',
                'url' => $this->createUrl('getCity'), // here for a specific item, there should be different URL
                'update' => '#city', // here for a specific item, there should be different update
                'data' => array('state_id' => 'js:this.value','hidden_city'=>$model->city),
        )));
        ?>
        <?php echo $form->error($model, 'state'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::hiddenField('hidden_city',$model->city);?>
        <?php echo $form->labelEx($model, 'city'); ?>
<?php
echo CHtml::dropDownList('SeoTemplate[city]', 'city', array(), array(
    'prompt' => 'Select a City', 'id' => 'city'
));
?>
        <?php echo $form->error($model, 'city'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'individual_type'); ?>
        <?php echo $form->dropDownList($model, 'individual_type', array('Property' => 'Property', 'Housing Authority' => 'Housing Authority'), array('prompt' => 'Select Detail Type')); ?>
        <?php echo $form->error($model, 'individual_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textArea($model, 'title', array('rows' => 10, 'cols' => 100,'style'=>'width:500px')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'keyword'); ?>
        <?php echo $form->textArea($model, 'keyword', array('rows' => 10, 'cols' => 100,'style'=>'width:500px')); ?>
        <?php echo $form->error($model, 'keyword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
<?php echo $form->textArea($model, 'description', array('rows' => 10, 'cols' => 100,'style'=>'width:500px')); ?>
    <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<?php
if (!$model->isNewRecord):
Yii::app()->clientScript->registerScript('countryload', 'jQuery(function($) {
            $("#SeoTemplate_state").trigger("change"); 
            $("#city").val(\''.$model->city.'\');
    });
');
endif;
?>