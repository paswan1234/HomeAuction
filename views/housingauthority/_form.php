<style>
    .clear{
        clear:both;
    }
</style>
<?php
/* @var $this HousingauthorityController */
/* @var $model Housingauthority */
/* @var $form CActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'housingauthority-form',
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
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'ha_id', array('size' => 10, 'maxlength' => 10,'id'=>'main_ha')); ?>
		 <?php echo $form->hiddenField($dateModel, 'ha_id', array('size' => 10, 'maxlength' => 10,'id'=>'clon_ha')); ?>

    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->dropDownListRow($model, 'service_type', array('Low-Rent' => 'Low-Rent', 'Section 8' => 'Section 8', 'Combined' => 'Combined'), array('prompt' => 'Select Service Type')); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->dropDownListRow($model, 'premium', array('1' => 'Premium', '0' => 'General'), array('prompt' => 'Housing Authority Type')); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->dropDownListRow($model, 'status', array('1' => 'Pending', '2' => 'Approved', '3' => 'Denied'), array('prompt' => '-Status-')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">

        <?php //echo $form->dropDownListRow($model, 'rating', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), array('options' => array('5' => array('selected' => 'selected')))); BY LMS 28-07 ?>

    <?php echo $form->dropDownListRow($model, 'rating', array('0.0' => '0', '1.0' => '1', '2.0' => '2', '3.0' => '3', '4.0' => '4', '5.0' => '5'));?>

    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'num_units', array('size' => 5, 'maxlength' => 5)); ?>
    </div>
    <div class="row" style="width:250px;float:left;margin-top: 45px;">
        <?php echo $form->checkBoxRow($model, 'is_wating_closed'); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'hours', array('size' => 60, 'maxlength' => 128, 'style' => "width:100px;")); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'lat'); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'lng'); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:500px;float:left">
        <?php echo $form->textAreaRow($model, 'about_us', array('rows' => 6, 'cols' => 50,'style'=>'width:457px')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:500px;float:left">
        <?php echo $form->textAreaRow($model, 'additional_information', array('rows' => 6, 'cols' => 50,'style'=>'width:457px')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:500px;float:left">
        <?php echo $form->textAreaRow($model, 'mission_statement', array('rows' => 6, 'cols' => 50,'style'=>'width:457px')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'address', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'city', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'state', array('size' => 2, 'maxlength' => 2)); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'zip', array('size' => 5, 'maxlength' => 5)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'phone', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'fax', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'url', array('size' => 60, 'maxlength' => 255)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($model, 'contact', array('size' => 60, 'maxlength' => 128)); ?>
    </div>
	<div class="clear"></div>
	<label style="color:#324287"> Public housing wait list</label>
	<div class="clear"></div>
    <div class="row" style="width:250px;float:left">

        <?php echo $form->datepickerRow($dateModel, 'open_date_ha', array('value' => $time_frame_from, 'options' => array('format' => 'yyyy-mm-dd g:i A'))) ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php
                $val = '09:00 AM';

            echo $form->dropDownListRow($dateModel, 'open_time_ha', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected')), 'class'=>'time'));
            ?>
    </div>
    <div class="clear"></div>
	<div class="clear"></div>
    <div class="row" style="width:250px;float:left">

        <?php echo $form->datepickerRow($dateModel, 'close_date_ha', array( 'options' => array('format' => 'yyyy-mm-dd g:i A'))) ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php
            $val = '07:00 PM';
            echo $form->dropDownListRow($dateModel, 'close_time_ha', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected')), 'class'=>'time'));
        ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:500px;float:left">
        <?php echo $form->textAreaRow($dateModel, 'description_ha', array('rows' => 4, 'cols' => 50,'style'=>'width:457px','class'=>'element')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($dateModel, 'source_ha', array('size' => 60, 'maxlength' => 255)); ?>
    </div>
	<div class="clear"></div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left;margin-top: 10px;">
     <label style="color:#324287">Section 8 waiting list</label>
    <?php echo $form->radioButtonList($model,'is_section_8_wating_list',array('1'=>'Open','0'=>'Close'),array(
                'separator'=>'&nbsp;',
                 'labelOptions'=>array(
                           'style'=>'display: inline; margin-right: 10px; font-weight: normal;float:left;')))?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->datepickerRow($dateModel, 'open_date', array('value' => $time_frame_from, 'options' => array('format' => 'yyyy-mm-dd g:i A'))) ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php
                $val = '09:00 AM';

            echo $form->dropDownListRow($dateModel, 'open_time', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected')), 'class'=>'time'));
            ?>
    </div>
    <div class="clear"></div>
	<div class="clear"></div>
    <div class="row" style="width:250px;float:left">

        <?php echo $form->datepickerRow($dateModel, 'close_date', array( 'options' => array('format' => 'yyyy-mm-dd g:i A'))) ?>
    </div>
    <div class="row" style="width:250px;float:left">
        <?php
            $val = '05:00 PM';
            echo $form->dropDownListRow($dateModel, 'close_time', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected')), 'class'=>'time'));
        ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:500px;float:left">
        <?php echo $form->textAreaRow($dateModel, 'description', array('rows' => 4, 'cols' => 50,'style'=>'width:457px','class'=>'content')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="width:250px;float:left">
        <?php echo $form->textFieldRow($dateModel, 'source', array('size' => 60, 'maxlength' => 255)); ?>
    </div>
	<div class="clear"></div>
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
<script type="text/javascript">
	$('.time').find('[value="0"]').remove();
	$('.time').find('[value="By Appt"]').remove();
	$('.time').find('[value="Call"]').remove();
	$('#main_ha').keyup(function(){
		var value = this.value;
		$('#clon_ha').val(value);
	})
</script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://rentalhousingdeals.com/css/editor/css/site.css">
<link rel="stylesheet" href="http://rentalhousingdeals.com/css/editor/richtext.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://rentalhousingdeals.com/css/editor/jquery.richtext.js"></script>
<style type="text/css">
  .richText {
    position: inherit !important;
  }
</style>
<script>
$(document).ready(function() {
	$('.content').richText({
		urls: true,
	});
	$('.element').richText();
});
</script>
