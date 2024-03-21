<?php
/* @var $this SeoTemplateController */
/* @var $model SeoTemplate */

$this->breadcrumbs=array(
	'Seo Templates'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SeoTemplate', 'url'=>array('index')),
	array('label'=>'Create SeoTemplate', 'url'=>array('create')),
	array('label'=>'Update SeoTemplate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SeoTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SeoTemplate', 'url'=>array('admin')),
);
?>

<h1>View SeoTemplate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'home',
		'state',
		'city',
		'individual_type',
		'title',
		'keyword',
		'description',
	),
)); ?>
