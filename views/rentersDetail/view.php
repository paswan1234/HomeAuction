<?php
/* @var $this RentersDetailController */
/* @var $model RentersDetail */

$this->breadcrumbs=array(
	'Renters Details'=>array('index'),
	$model->id_renter_detail,
);

$this->menu=array(
	array('label'=>'List RentersDetail', 'url'=>array('index')),
	array('label'=>'Create RentersDetail', 'url'=>array('create')),
	array('label'=>'Update RentersDetail', 'url'=>array('update', 'id'=>$model->id_renter_detail)),
	array('label'=>'Delete RentersDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_renter_detail),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RentersDetail', 'url'=>array('admin')),
);
?>

<h1>View RentersDetail #<?php echo $model->id_renter_detail; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_renter_detail',
		'id_user',
		'moving_address',
		'moving_city',
		'moving_state',
		'moving_zip',
		'created_at',
	),
)); ?>
