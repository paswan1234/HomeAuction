<?php
/* @var $this PropertyDealsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Deals',
);

$this->menu=array(
	array('label'=>'Create PropertyDeals', 'url'=>array('create')),
	array('label'=>'Manage PropertyDeals', 'url'=>array('admin')),
);
?>

<h1>Property Deals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
