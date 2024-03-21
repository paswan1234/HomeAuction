<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->property_title => array('view','id'=>$model->id_property),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Properties', 'url'=>array('admin')),
	array('label'=>'Add Property', 'url'=>array('create')),
        array('label'=>'General Property Information', 'url'=>array('update','id'=>$model->id_property)),
	array('label'=>'Property Floor Plan', 'url'=>array('propertyFloorPlan/create', 'propertyId'=>$model->id_property)),
	array('label'=>'Property Amenities', 'url'=>array('propertyDetail/index', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Photos', 'url'=>array('propertyPhoto/create', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Contacts', 'url'=>array('propertyContact/index', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Deals/Specials', 'url'=>array('propertyDeals/create', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Testimonials', 'url'=>array('testiminial/create', 'propertyId'=>$model->id_property)),
);
?>

<h1>Create/Update Credentials for <?php echo $model->property_title;?></h1>

<?php
/* @var $this PropertyController */
/* @var $model Property */
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
        <?php echo CHtml::textField('Credentails[username]', $userdetail['username']); ?>
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

</div>
