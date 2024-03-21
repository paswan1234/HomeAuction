<?php
/* @var $this TblHousingauthorityimageController */
/* @var $model TblHousingauthorityimage */

$this->breadcrumbs=array(
	'Tbl Housingauthorityimages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List TblHousingauthorityimage', 'url'=>array('index')),
	array('label'=>'Create TblHousingauthorityimage', 'url'=>array('create')),
	array('label'=>'Update TblHousingauthorityimage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblHousingauthorityimage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblHousingauthorityimage', 'url'=>array('admin')),
);
?>

<h1>View TblHousingauthorityimage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'housingauthority_id',
		'path',
		'filename',
		'title',
		'alt',
		'caption',
		'type',
		'sort',
	),
)); ?>
