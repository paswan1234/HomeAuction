<?php
/* @var $this StateController */
/* @var $model State */

$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List State', 'url'=>array('index')),

	array('label'=>'Update State', 'url'=>array('update', 'id'=>$model->state_id)),

	array('label'=>'Manage State', 'url'=>array('admin')),
);
?>

<h1>View State #<?php echo $model->state_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'state_id',
		'name',
		'abbr',
		'info',
	),
)); ?>
