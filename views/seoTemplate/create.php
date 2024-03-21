<?php
/* @var $this SeoTemplateController */
/* @var $model SeoTemplate */

$this->breadcrumbs=array(
	'Seo Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SeoTemplate', 'url'=>array('index')),
	array('label'=>'Manage SeoTemplate', 'url'=>array('admin')),
);
?>

<h1>Create SeoTemplate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>