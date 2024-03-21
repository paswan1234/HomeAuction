<?php
/* @var $this SeoTemplateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seo Templates',
);

$this->menu=array(
	array('label'=>'Create SeoTemplate', 'url'=>array('create')),
	array('label'=>'Manage SeoTemplate', 'url'=>array('admin')),
);
?>

<h1>Seo Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
