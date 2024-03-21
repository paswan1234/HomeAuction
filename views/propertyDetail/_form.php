<style>
    #amenityrow label{
        width:200px;
        margin-left: 0px;
    }

    #additional-pinputs li{list-style-type: none}

    #additional-uinputs li{list-style-type: none}

    .clear{clear:both}

</style>
<?php
/* @var $this PropertyDetailController */
/* @var $model PropertyDetail */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScript('textFieldAdder', '$("#additional-plink").bind("click",function(){
    var id="optional_ptext";
    var size=$("#additional-pinputs > li input").size();
    $("#additional-pinputs").append("<li><input type=text id="+id+size+" name="+id+"["+size+"]></li>");
    })');

Yii::app()->clientScript->registerScript('textFieldAdder1', '$("#additional-ulink").bind("click",function(){
    var id="optional_utext";
    var size=$("#additional-uinputs > li input").size();
    $("#additional-uinputs").append("<li><input type=text id="+id+size+" name="+id+"["+size+"]></li>");
    })');
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'property-detail-form',
                'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div id="errorcontainer">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php echo CHtml::hiddenField('PropertyDetail[id_property]', $id_property); ?>
    <fieldset>
        <legend><?php echo $form->labelEx($model, 'amenities'); ?></legend>
        <div class="row" id="amenityrow">
            <?php echo $form->inputsList(true, $model, 'amenities', CHtml::listData($amenities, 'id_amenity', 'name'), array('inline' => true)); ?>
            <?php
            if (!empty($otheramenities)):
                echo $form->inputsList(true, $model, 'otheramenities', CHtml::listData($otheramenities, 'other', 'other'), array('inline' => true));
            endif;
            ?>
            <?php echo $form->error($model, 'amenities'); ?>
        </div>

        <?php echo CHtml::link('Add More Property Amenities', 'javascript:void(0)', array('id' => 'additional-plink')); ?>
        <div id="additional-pinputs">

        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo $form->labelEx($model, 'unitamenities'); ?></legend>
        <div class="row" id="amenityrow">

            <?php echo $form->inputsList(true, $model, 'unitamenities', CHtml::listData($amenitiesU, 'id_amenity', 'name'), array('inline' => true)); ?>

            <?php
            if (!empty($otherunitamenities)):
                echo $form->inputsList(true, $model, 'unitotheramenities', CHtml::listData($otherunitamenities, 'other', 'other'), array('inline' => true));
            endif;
            ?>        
            <?php echo $form->error($model, 'unitamenities'); ?>
        </div>

        <?php echo CHtml::link('Add More Unit Amenities', 'javascript:void(0)', array('id' => 'additional-ulink')); ?>
        <div id="additional-uinputs">

        </div>
    </fieldset>
    <fieldset>
        <legend>Pet Detail</legend>
        <div class="row">
            <?php echo $form->radioButtonListInlineRow($model, 'pet_allowed', array('Yes' => 'Yes', 'No' => 'No', 'Contact' => 'Please contact the manager regarding the pet policy')); ?>
            <?php echo $form->error($model, 'pet_allowed'); ?>
        </div>

        <div class="row" style="width:150px;float: left">
            <?php echo $form->checkBoxRow($model, 'cats_ok'); ?>
            <?php echo $form->error($model, 'cats_ok'); ?>
        </div>

        <div class="row" style="width:150px;float: left">
            <?php echo $form->checkBoxRow($model, 'dogs_ok'); ?>
            <?php echo $form->error($model, 'dogs_ok'); ?>
        </div>

        <div class="row" style="width:150px;float: left">
            <?php echo $form->checkBoxRow($model, 'campnion_aminal'); ?>
            <?php echo $form->error($model, 'campnion_aminal'); ?>
        </div>

        <div class="row" style="width:150px;float: left">
            <?php echo $form->checkBoxRow($model, 'service_animal'); ?>
            <?php echo $form->error($model, 'service_animal'); ?>
        </div>
        <div class="clear"></div>
        <div class="row" style="width:250px;float: left">
            <?php echo $form->textFieldRow($model, 'maximum__pet_weight', array('size' => 15, 'maxlength' => 15)); ?>
            <?php echo $form->error($model, 'maximum__pet_weight'); ?>
        </div>

        <div class="row" style="width:250px;float: left">
            <?php echo $form->textFieldRow($model, 'max_pet'); ?>
            <?php echo $form->error($model, 'max_pet'); ?>
        </div>
        <div class="clear"></div>
        <div class="row" style="width:250px;float: left">
            <?php echo $form->textFieldRow($model, 'pet_deposit'); ?>
            <?php echo $form->error($model, 'pet_deposit'); ?>
        </div>

        <div class="row" style="width:250px;float: left">
            <?php echo $form->textAreaRow($model, 'other_term', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'other_term'); ?>
        </div>
        <div class="clear"></div>
    </fieldset>

    <fieldset>
        <legend>Parking Detail</legend>
        <div class="row" style="width:250px;float: left">
            <?php echo $form->dropDownListRow($model, 'parking_type', Constants::$parking_type); ?>
            <?php echo $form->error($model, 'parking_type'); ?>
        </div>

        <div class="row" style="width:250px;float: left">
            <?php echo $form->radioButtonListInlineRow($model, 'assigned_parking', array('Yes' => 'Yes', 'No' => 'No')); ?>
            <?php echo $form->error($model, 'assigned_parking'); ?>
        </div>
        <div class="clear"></div>
        <div class="row" style="width:250px;float: left">
            <?php echo $form->textFieldRow($model, 'parking_fee', array('size' => 8, 'maxlength' => 8)); ?>
            <?php echo $form->error($model, 'parking_fee'); ?>
        </div>

        <div class="row" style="width:250px;float: left">
            <?php echo $form->textAreaRow($model, 'parking_comments', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'parking_comments'); ?>
        </div>
        <div class="clear"></div>
    </fieldset>

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
