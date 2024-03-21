<?php
/* @var $this PropertyAmenitiesController */
/* @var $model PropertyAmenities */

$this->breadcrumbs=array(
	'Property Amenities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PropertyAmenities', 'url'=>array('index')),
	array('label'=>'Manage PropertyAmenities', 'url'=>array('admin')),
);
?>

<h1>Create PropertyAmenities</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>