<?php
/* @var $this SponsersController */
/* @var $model Sponsers */

$this->breadcrumbs=array(
	'Sponsers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Sponsers', 'url'=>array('index')),
	array('label'=>'Create Sponsers', 'url'=>array('create')),
	array('label'=>'Update Sponsers', 'url'=>array('update', 'id'=>$model->id_sponser)),
	array('label'=>'Delete Sponsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sponser),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sponsers', 'url'=>array('admin')),
);
?>

<h1>View Sponsers #<?php echo $model->id_sponser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sponser',
		'id_referer',
		'id_property',
		'concession_amout',
		'name',
		'phone',
		'email',
		'address',
		'city',
		'state',
		'zip',
		'status',
		'created_at',
	),
)); ?>
