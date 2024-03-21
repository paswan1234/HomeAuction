<?php
/* @var $this PropertyPhotoController */
/* @var $model PropertyPhoto */

$this->breadcrumbs=array(
	'Property Photos'=>array('index'),
	$model->id_property_photo,
);

$this->menu=array(
	array('label'=>'List PropertyPhoto', 'url'=>array('index')),
	array('label'=>'Create PropertyPhoto', 'url'=>array('create')),
	array('label'=>'Update PropertyPhoto', 'url'=>array('update', 'id'=>$model->id_property_photo)),
	array('label'=>'Delete PropertyPhoto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_property_photo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyPhoto', 'url'=>array('admin')),
);
?>

<h1>View PropertyPhoto #<?php echo $model->id_property_photo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_property_photo',
		'id_property',
		'photo',
		'caption',
	),
)); ?>
