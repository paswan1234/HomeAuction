<?php
/* @var $this HousingauthorityController */
/* @var $model Housingauthority */

$this->breadcrumbs=array(
	'Housingauthorities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Housingauthority', 'url'=>array('index')),
	array('label'=>'Create Housingauthority', 'url'=>array('create')),
	array('label'=>'Update Housingauthority', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Housingauthority', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Housingauthority', 'url'=>array('admin')),
);
?>

<h1>View Housing Authority #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ha_id',
		'service_type',
		'premium',
		'rating',
		'num_units',
		'hours',
		'name',
		'about_us',
		'mission_statement',
		'address',
		'address2',
		'city',
		'state',
		'zip',
		'zip4',
		'phone',
		'fax',
		'email',
		'url',
		'contact',
		'formatted_address',
		'lat',
		'lng',
		'location_type',
		'google_num_results',
		'status',
		'create_time',
		'update_time',
		'author_id',
	),
)); ?>
