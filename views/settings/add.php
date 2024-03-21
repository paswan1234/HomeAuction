<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs = array(
    'Site Settings' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Change Password', 'url' => array('changePassword')),
    array('label' => 'Add/Edit Parking Type', 'url' => array('parkingType/create')),
    array('label' => 'Add/Edit Structure Type', 'url' => array('structureType/create')),
    array('label' => 'Add/Edit Amenities', 'url' => array('amenities/create')),
    array('label' => 'Site Settings', 'url' => array('settings/add')),
);
?>

<h1>Site Settings</h1>


<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'property-form',
                'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <?php foreach ($settings as $setting): ?>
        <?php echo CHtml::label($setting->display_text, $setting->setting_key); ?>
        <?php echo CHtml::textField('Settings['.$setting->setting_key.']',$setting->value); ?>
    <?php endforeach; ?>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Save',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->