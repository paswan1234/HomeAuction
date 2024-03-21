<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */

$this->breadcrumbs=array(
	'Mgmtcompanies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Mgmtcompany', 'url'=>array('index')),
	array('label'=>'Create Mgmtcompany', 'url'=>array('create')),
	array('label'=>'Update Mgmtcompany', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mgmtcompany', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mgmtcompany', 'url'=>array('admin')),
);
?>

<h1>View Mgmtcompany #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
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
		'status',
		'create_time',
		'update_time',
		'author_id',
	),
)); ?>
