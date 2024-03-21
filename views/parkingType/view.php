<?php
/* @var $this ParkingTypeController */
/* @var $model ParkingType */

$this->breadcrumbs=array(
	'Parking Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ParkingType', 'url'=>array('index')),
	array('label'=>'Create ParkingType', 'url'=>array('create')),
	array('label'=>'Update ParkingType', 'url'=>array('update', 'id'=>$model->id_parking_type)),
	array('label'=>'Delete ParkingType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parking_type),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ParkingType', 'url'=>array('admin')),
);
?>

<h1>View ParkingType #<?php echo $model->id_parking_type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_parking_type',
		'name',
		'value',
	),
)); ?>
