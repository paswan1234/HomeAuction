<style>
    .clear{
        clear: both;
    }
</style>
<?php
/* @var $this PropertyContactController */
/* @var $model PropertyContact */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'property-contact-form',
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

    <?php echo CHtml::hiddenField('PropertyContact[id_property]', $id_property); ?>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'contact_first_name', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'contact_last_name', array('size' => 60, 'maxlength' => 256)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textAreaRow($model, 'address', array('rows' => 1, 'cols' => 50)); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'city', array('size' => 15, 'maxlength' => 15)); ?>
    </div>
    <div class="clear"></div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'state', array('size' => 15, 'maxlength' => 15)); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'zip', array('size' => 15, 'maxlength' => 15)); ?>
    </div>
    <div class="clear"></div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'phone', array('size' => 15, 'maxlength' => 15)); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'fax', array('size' => 15, 'maxlength' => 15)); ?>
    </div>
    <div class="clear"></div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'email', array('size' => 60, 'maxlength' => 150)); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'cc_email', array('size' => 60, 'maxlength' => 150)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'billing_contact_fname', array('size' => 60, 'maxlength' => 256)); ?>
    </div>


    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'billing_contact_lname', array('size' => 60, 'maxlength' => 256)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'billing_cc_invoice_one', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'billing_cc_invoice_two', array('size' => 60, 'maxlength' => 256)); ?>
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