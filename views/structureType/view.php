<?php
/* @var $this StructureTypeController */
/* @var $model StructureType */

$this->breadcrumbs=array(
	'Structure Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List StructureType', 'url'=>array('index')),
	array('label'=>'Create StructureType', 'url'=>array('create')),
	array('label'=>'Update StructureType', 'url'=>array('update', 'id'=>$model->id_structure_type)),
	array('label'=>'Delete StructureType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_structure_type),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StructureType', 'url'=>array('admin')),
);
?>

<h1>View StructureType #<?php echo $model->id_structure_type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_structure_type',
		'name',
		'value',
	),
)); ?>
