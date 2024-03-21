<?php
/* @var $this PropertyFloorPlanController */
/* @var $model PropertyFloorPlan */

$this->breadcrumbs=array(
	'Property Floor Plans'=>array('index'),
	$model->id_floor_plan,
);

$this->menu=array(
	array('label'=>'List PropertyFloorPlan', 'url'=>array('index')),
	array('label'=>'Create PropertyFloorPlan', 'url'=>array('create')),
	array('label'=>'Update PropertyFloorPlan', 'url'=>array('update', 'id'=>$model->id_floor_plan)),
	array('label'=>'Delete PropertyFloorPlan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_floor_plan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyFloorPlan', 'url'=>array('admin')),
);
?>

<h1>View PropertyFloorPlan #<?php echo $model->id_floor_plan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_floor_plan',
		'id_property',
		'floor_plan_name',
		'beds',
		'baths',
		'square_feet_from',
		'square_feet_to',
		'rent_from',
		'rent_to',
		'required_deposit',
		'deposit_description',
		'application_fee',
		'display_status',
		'floor_plan_diagram',
		'floor_plan_photo',
	),
)); ?>
