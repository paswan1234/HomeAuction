<?php
/* @var $this PropertyAmenitiesController */
/* @var $model PropertyAmenities */

$this->breadcrumbs=array(
	'Property Amenities'=>array('index'),
	$model->id_property_amenities=>array('view','id'=>$model->id_property_amenities),
	'Update',
);

$this->menu=array(
	array('label'=>'List PropertyAmenities', 'url'=>array('index')),
	array('label'=>'Create PropertyAmenities', 'url'=>array('create')),
	array('label'=>'View PropertyAmenities', 'url'=>array('view', 'id'=>$model->id_property_amenities)),
	array('label'=>'Manage PropertyAmenities', 'url'=>array('admin')),
);
?>

<h1>Update PropertyAmenities <?php echo $model->id_property_amenities; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>