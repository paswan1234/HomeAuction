<?php
/* @var $this PropertyFloorPlanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Floor Plans',
);

$this->menu=array(
	array('label'=>'Create PropertyFloorPlan', 'url'=>array('create')),
	array('label'=>'Manage PropertyFloorPlan', 'url'=>array('admin')),
);
?>

<h1>Property Floor Plans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
