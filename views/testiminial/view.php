<?php
/* @var $this TestiminialController */
/* @var $model Testiminial */

$this->breadcrumbs=array(
	'Testiminials'=>array('index'),
	$model->id_testimonial,
);

$this->menu=array(
	array('label'=>'List Testiminial', 'url'=>array('index')),
	array('label'=>'Create Testiminial', 'url'=>array('create')),
	array('label'=>'Update Testiminial', 'url'=>array('update', 'id'=>$model->id_testimonial)),
	array('label'=>'Delete Testiminial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_testimonial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Testiminial', 'url'=>array('admin')),
);
?>

<h1>View Testiminial #<?php echo $model->id_testimonial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_testimonial',
		'id_property',
		'date',
		'fname',
		'lname',
		'email',
		'testimonail',
		'status',
	),
)); ?>
