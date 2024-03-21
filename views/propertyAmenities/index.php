<?php
/* @var $this PropertyAmenitiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Amenities',
);

$this->menu=array(
	array('label'=>'Create PropertyAmenities', 'url'=>array('create')),
	array('label'=>'Manage PropertyAmenities', 'url'=>array('admin')),
);
?>

<h1>Property Amenities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
