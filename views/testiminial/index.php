<?php
/* @var $this TestiminialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Testiminials',
);

$this->menu=array(
	array('label'=>'Create Testiminial', 'url'=>array('create')),
	array('label'=>'Manage Testiminial', 'url'=>array('admin')),
);
?>

<h1>Testiminials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
