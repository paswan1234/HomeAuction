<?php
/* @var $this SponsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsers',
);

$this->menu=array(
	array('label'=>'Create Sponsers', 'url'=>array('create')),
	array('label'=>'Manage Sponsers', 'url'=>array('admin')),
);
?>

<h1>Sponsers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
