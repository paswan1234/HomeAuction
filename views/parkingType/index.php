<?php
/* @var $this ParkingTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parking Types',
);

$this->menu=array(
	array('label'=>'Create ParkingType', 'url'=>array('create')),
	array('label'=>'Manage ParkingType', 'url'=>array('admin')),
);
?>

<h1>Parking Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
