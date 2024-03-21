<?php
/* @var $this PropertyTypeController */
/* @var $model PropertyType */

$this->breadcrumbs=array(
	'Property Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id_property_type),
	'Update',
);

$this->menu=array(
	array('label'=>'List PropertyType', 'url'=>array('index')),
	array('label'=>'Create PropertyType', 'url'=>array('create')),
	array('label'=>'View PropertyType', 'url'=>array('view', 'id'=>$model->id_property_type)),
	array('label'=>'Manage PropertyType', 'url'=>array('admin')),
);
?>

<h1>Update PropertyType <?php echo $model->id_property_type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>