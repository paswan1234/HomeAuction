<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */

$this->breadcrumbs=array(
	'Mgmtcompanies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Credentials',
);

$this->menu=array(
	array('label'=>'Manage Management Company', 'url'=>array('admin')),
	array('label'=>'Add Management Company', 'url'=>array('create')),
	array('label'=>'Update '.$model->name, 'url'=>array('update','id'=>$model->id)),
        array('label'=>'Add Regional Manager', 'url'=>array('addRegionalManager','id'=>$model->id)),

);
?>

<h1>Set Credential for <?php echo $model->name?></h1>

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
    	Username<br />
        <?php echo CHtml::textField('Credentails[username]',$userdetail['username']); ?>
    </div>
    
    <div class="row">
        	Password<br />
                <?php echo CHtml::textField('Credentails[password]',''); ?>
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

