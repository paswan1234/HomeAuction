<?php
/* @var $this SeoTemplateController */
/* @var $model SeoTemplate */

$this->breadcrumbs=array(
	'Seo Templates'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SeoTemplate', 'url'=>array('index')),
	array('label'=>'Create SeoTemplate', 'url'=>array('create')),
	array('label'=>'View SeoTemplate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SeoTemplate', 'url'=>array('admin')),
);
?>

<h1>Update SeoTemplate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>