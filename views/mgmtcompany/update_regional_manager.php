<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */

$this->breadcrumbs = array(
    'Mgmtcompanies' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Regional Manager' => array('addRegionalManager', 'id' => $model->id),
    'Update Regional Manager',
);

$this->menu = array(
    array('label' => 'Manage Management Company', 'url' => array('admin')),
    array('label' => 'Update ' . $model->name, 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Add Management Company', 'url' => array('create')),
    array('label' => 'Regional Manager', 'url' => array('addRegionalManager', 'id' => $model->id)),
);
?>

<h2>Update Regional Manager</h2>

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
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>


    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        First Name<br />
        <?php echo CHtml::textField('Credentails[fname]', $userModel->fname); ?>
    </div>
    <div class="row">
        Last Name<br />
        <?php echo CHtml::textField('Credentails[lname]', $userModel->lname); ?>
    </div>
    <div class="row">
        Email<br />
        <?php echo CHtml::textField('Credentails[email]', $userModel->email); ?>
    </div>
    <div class="row">
        Username<br />
        <?php echo CHtml::textField('Credentails[username]', $userModel->username); ?>
    </div>

    <div class="row">
        Password<br />
        <?php echo CHtml::textField('Credentails[password]', ''); ?>
    </div>


    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Update',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
