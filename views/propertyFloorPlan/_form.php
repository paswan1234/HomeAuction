<style>
    #amenityrow label{
        width:200px;
        margin-left:0px
    }
    .clear{
        clear:both;
    }
</style>
<script>
    function showother(val){
        if(val == 'Other')
            $('#rdother').show();
        else
            $('#rdother').hide();
    }
   
</script>
<?php
/* @var $this PropertyFloorPlanController */
/* @var $model PropertyFloorPlan */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'property-floor-plan-form',
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
    <?php echo CHtml::hiddenField('PropertyFloorPlan[id_property]', $id_property); ?>


    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'floor_plan_name', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row" style="float:left;width:100px">
        <?php echo $form->textFieldRow($model, 'units'); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'beds', Constants::$bed_array1); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'baths', Constants::$bath_array); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <label>Square Foot</label>
        <?php if($model->square_feet_from == 0 && !$model->isNewRecord) $sqft = 'N/A'; else $sqft = $model->square_feet_from;?>
        <?php if($model->square_feet_to == 0 && !$model->isNewRecord) $sqft_to = 'N/A'; else $sqft_to = $model->square_feet_to;?>
        <?php echo $form->textField($model, 'square_feet_from',array('value'=>$sqft, 'style' => 'width: 70px;')); ?>
        <span style="margin-top: -10px;"> to </span> <?php echo $form->textField($model, 'square_feet_to',array('value' => $sqft_to, 'style' => 'width: 70px;')); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php
        $flag = '';
        if ($model->required_deposit != '' && $model->required_deposit != 'One Month Rent' && $model->required_deposit != 'Please Call' && $model->required_deposit != 'Income Based') {
            $default_selected = array('Other' => array('selected' => 'selected'));
            $flag = 'Other';
        }

        echo $form->dropDownListRow($model, 'required_deposit', array("One Month Rent" => "One Month's Rent", "Please Call" => "Please Call",
            "Income Based" => "Income Based", "Other" => "Other"), array('onchange' => 'showother(this.value)', 'options' => $default_selected));
        ?>
    </div>
    <div class="row" id="rdother" style="<?php ($flag == 'Other') ? print ''  : print 'display:none'  ?>">
        <label for="rqotherval">Required Deposit Value</label>
        <?php echo CHtml::textField('rqotherval', $model->required_deposit); ?>
    </div>
    <div class="clear"></div>
    
    <div class="row" style="float:left;">
        
        <?php 
        $opt1 = false;
        $opt2 = false;
        $opt3 = false;
        $flat = '';
        $from = '';
        $to = '';
        $override = '';
        
        if($model->rent_from == $model->rent_to)
        {
            $opt1 = true;
            $flat = $model->rent_from;
        }
        if($model->rent_from != $model->rent_to)
        {
            $opt2 = true;
            $from = $model->rent_from;
            $to = $model->rent_to;
        }
        if($model->rent_from == 0 && $model->rent_to == 0)
        {
            $opt3 = true;
            $override = $model->deposit_description;
        }
        ?>

        <div style="float:left;width:150px">
            <label>Flat Rent Amount</label>
            <div style="float:left"><?php echo CHtml::radioButton('rent_optionA', $opt1, array('value' => 1, 'id' => 'rent_optionA1')); ?>&nbsp;&nbsp;</div>
            <div style="float:left"><label for="rent_optionA1"><?php echo CHtml::textField('rent_flatA', $flat, array('style' => 'width:100px')) ?></label></div>
        </div>
        <div style="float:left;width:150px">

            <label style="width:150px">Rent From</label>
            <div style="float:left"><?php echo CHtml::radioButton('rent_optionA', $opt2, array('value' => 2, 'id' => 'rent_optionA2')); ?>&nbsp;&nbsp;</div>
            <div style="float:left"><label for="rent_optionA2"><?php echo CHtml::textField('rent_fromA', $from, array('style' => 'width:100px')) ?></label></div>
            &nbsp;-&nbsp;
        </div>
        <div style="float:left;width:150px">

            <label style="width:150px">Rent To</label>
            <div style="float:left"><label for="rent_optionA2"><?php echo CHtml::textField('rent_toA', $to, array('style' => 'width:100px')) ?></label></div>
        </div>
        <div style="float:left;width:250px">
            <label>Rent Override</label>
            <div style="float:left"> <?php echo CHtml::radioButton('rent_optionA', $opt3, array('value' => 3, 'id' => 'rent_optionA3')); ?>&nbsp;&nbsp;</div>
            <div>   <label for="rent_optionA3"><?php echo CHtml::dropDownList('rent_overrideA', $override, array('Please Call' => 'Please Call', 'Income Based' => 'Income Based'), array('prompt' => '- Select -')) ?></label></div>
        </div>
    </div>
    
    <div class="clear"></div>
    <div class="row">
        <?php echo $form->textFieldRow($model, 'application_fee'); ?>
    </div>

    <div class="row">
        <?php echo $form->radioButtonListInlineRow($model, 'display_status', array('Active' => 'Active', 'Inactive' => 'Inactive')); ?>
    </div>

    <div class="row" id="diagramFiles">
        <div>
            <?php
            if (Yii::app()->controller->action->id == 'update'):
                echo CHtml::image(Tools::getBaseUrl() . $model->floor_plan_photo, '', array('width' => 100));
                echo CHtml::hiddenField('PropertyFloorPlan[old_plan_photo]', $model->floor_plan_photo);
            endif;
            ?>
        </div>
        <div style="float: left">
            <?php echo $form->fileFieldRow($model, 'floor_plan_photo', array('size' => 60, 'maxlength' => 256)); ?>
        </div>    

        <div style="padding-left:15px;">
            <?php echo $form->textFieldRow($model, 'floor_plan_photo_caption', array('size' => 60, 'maxlength' => 256)); ?>
        </div>    
    </div>

    <div>
        <?php
        if (Yii::app()->controller->action->id == 'updaterent'):
            echo CHtml::image(Tools::getBaseUrl() . $model->floor_plan_diagram, '', array('width' => 100));
            echo CHtml::hiddenField('PropertyFloorPlan[old_plan_diagrame]', $model->floor_plan_diagram);
        endif;
        ?>
    </div>

    <div class="row">
        <?php echo $form->fileFieldRow($model, 'floor_plan_diagram', array('size' => 60, 'maxlength' => 256)); ?>
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
