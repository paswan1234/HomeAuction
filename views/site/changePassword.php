<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Change Password';
$this->breadcrumbs = array(
    'Change Password',
);

$this->menu = array(
    array('label' => 'Change Password', 'url' => array('changePassword')),
    array('label' => 'Add/Edit Parking Type', 'url' => array('parkingType/create')),
    array('label' => 'Add/Edit Structure Type', 'url' => array('structureType/create')),
    array('label' => 'Add/Edit Amenities', 'url' => array('amenities/create')),
    array('label' => 'Site Settings', 'url' => array('settings/add')),
    array('label' => 'Manage Banner', 'url' => array('banner/admin')),
    array('label' => 'Manage Newsletter Subscription', 'url' => array('newsletterSubscription/admin')),
    array('label' => 'State SEO Info', 'url' => array('state/admin')),
    array('label' => 'City SEO Info', 'url' => array('city/admin')),
    array('label' => 'Landing Pages Seo', 'url' => array('seoSettings/add')),
    array('label' => 'Search Pages Seo', 'url' => array('seoSettings/metaTags')),
    array('label' => 'Seo Template', 'url' => array('seoTemplate/index')),
);
?>

<h1>Change Password</h1>

<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'change-password-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'oldpassword'); ?>
    <?php echo $form->textFieldRow($model, 'newpassword'); ?>
    <?php echo $form->textFieldRow($model, 'retypepassword'); ?>


    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Change Password',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

