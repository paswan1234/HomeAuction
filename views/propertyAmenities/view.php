<?php
/* @var $this PropertyAmenitiesController */
/* @var $model PropertyAmenities */

$this->breadcrumbs=array(
	'Property Amenities'=>array('index'),
	$model->id_property_amenities,
);

$this->menu=array(
	array('label'=>'List PropertyAmenities', 'url'=>array('index')),
	array('label'=>'Create PropertyAmenities', 'url'=>array('create')),
	array('label'=>'Update PropertyAmenities', 'url'=>array('update', 'id'=>$model->id_property_amenities)),
	array('label'=>'Delete PropertyAmenities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_property_amenities),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyAmenities', 'url'=>array('admin')),
);
?>

<h1>View PropertyAmenities #<?php echo $model->id_property_amenities; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_property_amenities',
		'id_property',
		'id_floor_plan',
		'id_amenity',
	),
)); ?>
