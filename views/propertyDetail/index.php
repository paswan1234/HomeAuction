<?php
/* @var $this PropertyDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Details',
);

$this->menu=array(
	array('label'=>'Create PropertyDetail', 'url'=>array('create')),
	array('label'=>'Manage PropertyDetail', 'url'=>array('admin')),
);
?>

<h1>Property Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
