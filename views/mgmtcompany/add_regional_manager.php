<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */

$this->breadcrumbs = array(
    'Mgmtcompanies' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Regional Manager' => array('addRegionalManager', 'id' => $model->id),
    'Add Regional Manager',
);

$this->menu = array(
    array('label' => 'Manage Management Company', 'url' => array('admin')),
    array('label' => 'Update ' . $model->name, 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Add Management Company', 'url' => array('create')),
    array('label' => 'Regional Manager', 'url' => array('addRegionalManager', 'id' => $model->id)),
);
?>

<h1>Add Regional Manager for <?php echo $model->name; ?></h1>

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
        <?php echo CHtml::textField('Credentails[fname]', $userdetail['fnmae']); ?>
    </div>
    <div class="row">
        Last Name<br />
        <?php echo CHtml::textField('Credentails[lname]', $userdetail['lname']); ?>
    </div>
    <div class="row">
        Email<br />
        <?php echo CHtml::textField('Credentails[email]', $userdetail['email']); ?>
    </div>
    <div class="row">
        Username<br />
        <?php echo CHtml::textField('Credentails[username]', $userdetail['username']); ?>
    </div>

    <div class="row">
        Password<br />
        <?php echo CHtml::textField('Credentails[password]', ''); ?>
    </div>


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

<?php
//CVarDumper::dump($managers,10,true);
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'rm-grid',
    'dataProvider' => $userModel->searchRPM($model->id),
    'filter' => $userModel,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'name', 'value' => '$data->fname." ".$data->lname', 'header' => 'Name'),
        'email',
        'username',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{updateRegionalManager}{deleteRegionalManager}',
            'buttons' => array(
                'updateRegionalManager' => array(
                    'label' => '',
                    'options' => array('class' => 'icon-edit'),
                    'url' => 'Yii::app()->createUrl("mgmtcompany/updateRegionalManager",array("id" => '.$model->id.', "user_id"=>"$data->id_user"))'  
                ),
                'deleteRegionalManager' => array(
                    'label' => '',
                    'options' => array('class' => 'icon-remove'),
                    'url' => 'Yii::app()->createUrl("mgmtcompany/deleteRegionalManager",array("id"=>"$data->id_user"))'                    
                ),
            ),
            'header' => 'Action'
        ),
    ),
));
?>