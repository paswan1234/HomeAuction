<?php
/* @var $this RentersDetailController */
/* @var $model RentersDetail */

$this->breadcrumbs=array(
	'Renters Details'=>array('index'),
	$model->id_renter_detail=>array('view','id'=>$model->id_renter_detail),
	'Update',
);

$this->menu=array(
	array('label'=>'List RentersDetail', 'url'=>array('index')),
	array('label'=>'Create RentersDetail', 'url'=>array('create')),
	array('label'=>'View RentersDetail', 'url'=>array('view', 'id'=>$model->id_renter_detail)),
	array('label'=>'Manage RentersDetail', 'url'=>array('admin')),
);
?>

<h1>Update RentersDetail <?php echo $model->id_renter_detail; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>