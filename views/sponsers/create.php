<?php
/* @var $this SponsersController */
/* @var $model Sponsers */

$this->breadcrumbs=array(
	'Sponsers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sponsers', 'url'=>array('index')),
	array('label'=>'Manage Sponsers', 'url'=>array('admin')),
);
?>

<h1>Create Sponsers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>