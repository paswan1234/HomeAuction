<?php
/* @var $this RentersDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Renters Details',
);

$this->menu=array(
	array('label'=>'Create RentersDetail', 'url'=>array('create')),
	array('label'=>'Manage RentersDetail', 'url'=>array('admin')),
);
?>

<h1>Renters Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
