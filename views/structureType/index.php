<?php
/* @var $this StructureTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Structure Types',
);

$this->menu=array(
	array('label'=>'Create StructureType', 'url'=>array('create')),
	array('label'=>'Manage StructureType', 'url'=>array('admin')),
);
?>

<h1>Structure Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
