<?php
/* @var $this PropertyDealsController */
/* @var $model PropertyDeals */

$this->breadcrumbs=array(
	'Property Deals'=>array('index'),
	$model->id_property_delas,
);

$this->menu=array(
	array('label'=>'List PropertyDeals', 'url'=>array('index')),
	array('label'=>'Create PropertyDeals', 'url'=>array('create')),
	array('label'=>'Update PropertyDeals', 'url'=>array('update', 'id'=>$model->id_property_delas)),
	array('label'=>'Delete PropertyDeals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_property_delas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyDeals', 'url'=>array('admin')),
);
?>

<h1>View PropertyDeals #<?php echo $model->id_property_delas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_property_delas',
		'id_property',
		'header_description',
		'special',
		'time_frame_from',
		'time_frame_to',
		'id_floor_plan',
	),
)); ?>
