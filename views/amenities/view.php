<?php
/* @var $this AmenitiesController */
/* @var $model Amenities */

$this->breadcrumbs=array(
	'Amenities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Amenities', 'url'=>array('index')),
	array('label'=>'Create Amenities', 'url'=>array('create')),
	array('label'=>'Update Amenities', 'url'=>array('update', 'id'=>$model->id_amenity)),
	array('label'=>'Delete Amenities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_amenity),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Amenities', 'url'=>array('admin')),
);
?>

<h1>View Amenities #<?php echo $model->id_amenity; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_amenity',
                'type',
                'cat',
		'name',
		'description',
	),
)); ?>
