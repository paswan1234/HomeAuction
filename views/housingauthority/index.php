<?php
/* @var $this HousingauthorityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Housingauthorities',
);

$this->menu=array(
	array('label'=>'Create Housingauthority', 'url'=>array('create')),
	array('label'=>'Manage Housingauthority', 'url'=>array('admin')),
);
?>

<h1>Housingauthorities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
