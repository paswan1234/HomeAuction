<?php
/* @var $this RentersDetailController */
/* @var $model RentersDetail */

$this->breadcrumbs=array(
	'Renters Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RentersDetail', 'url'=>array('index')),
	array('label'=>'Manage RentersDetail', 'url'=>array('admin')),
);
?>

<h1>Create RentersDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>