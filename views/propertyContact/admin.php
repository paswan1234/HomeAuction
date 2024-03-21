<?php
/* @var $this PropertyContactController */
/* @var $model PropertyContact */

$this->breadcrumbs=array(
	'Property Contacts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PropertyContact', 'url'=>array('index')),
	array('label'=>'Create PropertyContact', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#property-contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Property Contacts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'property-contact-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered',
	'columns'=>array(
		'id_property_contact',
		'id_property',
		'contact_first_name',
		'contact_last_name',
		'address',
		'city',
		/*
		'state',
		'zip',
		'phone',
		'fax',
		'email',
		'billing_contact_fname',
		'billing_contact_lname',
		'billing_cc_invoice_one',
		'billing_cc_invoice_two',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
