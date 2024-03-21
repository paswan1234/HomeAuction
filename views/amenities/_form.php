<?php
/* @var $this AmenitiesController */
/* @var $model Amenities */
/* @var $form CActiveForm */
?>
<style>
.prop-amenity ul {
  list-style: outside none none;
  margin-left: -20px;
}

.prop-amenity ul li {
  height: 32px;  
  padding: 0 0 4px;
}

.prop-amenity ul li img {
  margin: 0 0 0 10px;
  vertical-align: middle;
}
</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'amenities-form',
                'enableAjaxValidation' => false,
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
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->dropDownList($model, 'type', array('Unit' => 'Unit', 'Property' => 'Property')); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cat'); ?>
        <?php echo $form->dropDownList($model, 'cat', array('General' => 'General', 'Baths' => 'Baths','Kitchen' => 'Kitchen','Luandry'=>'Luandry','Outdoor' => 'Outdoor','Entry' => 'Entry','Leisure' => 'Leisure','Parking' => 'Parking','Utility'=>'Utility')); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>
    
    
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <div class="prop-amenity">
        <?php echo $form->labelEx($model, 'amenity_icon'); ?>
        <?php
            $allowed_types = array('png','jpg','jpeg','gif'); //Allowed types of files
            $imgData = CFileHelper::findFiles('images/amenity_icons',array('','','',false));
            //$imgData = scandir($imgdir);
            echo '<div class="span1"><ul>';
            $count=1;
            foreach($imgData as $imgVal)
            {
                $iconName = substr($imgVal, strrpos($imgVal, "/")+1);
                $titleArr = explode(".png", $iconName);
                if($model->amenity_icon==$iconName)
                    $checked = "checked='checked'";
                else
                    $checked = '';
                
                echo "<li title='".$titleArr[0]."'><input type='radio' name='Amenities[amenity_icon]' id='Amenities_amenity_icon_".$count."' value='$iconName' $checked><img src='/".$imgVal."'></li>";
                if($count%8==0)
                {
                    //echo $count%4;
                    echo "</ul></div>";
                    echo '<div class="span1"><ul>';
                }    
                $count++;
            }    
            echo "</ul></div>";
            //print_r($imgdir);
            //exit;
        ?>
        
        
        <?php //echo $form->textField($model, 'amenity_icon'); ?>
        <?php //echo $form->error($model, 'amenity_icon'); ?>
        </div>    
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
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