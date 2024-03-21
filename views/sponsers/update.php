<?php
/* @var $this SponsersController */
/* @var $model Sponsers */

$this->breadcrumbs=array(
	'Sponsers'=>array('index'),
	$model->name=>array('view','id'=>$model->id_sponser),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sponsers', 'url'=>array('index')),
	array('label'=>'Create Sponsers', 'url'=>array('create')),
	array('label'=>'View Sponsers', 'url'=>array('view', 'id'=>$model->id_sponser)),
	array('label'=>'Manage Sponsers', 'url'=>array('admin')),
);
?>

<h1>Update Sponsers <?php echo $model->id_sponser; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>