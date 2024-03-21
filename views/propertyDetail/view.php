<?php
/* @var $this PropertyDetailController */
/* @var $model PropertyDetail */

$this->breadcrumbs=array(
	'Property Details'=>array('index'),
	$model->id_property_detail,
);

$this->menu=array(
	array('label'=>'List PropertyDetail', 'url'=>array('index')),
	array('label'=>'Create PropertyDetail', 'url'=>array('create')),
	array('label'=>'Update PropertyDetail', 'url'=>array('update', 'id'=>$model->id_property_detail)),
	array('label'=>'Delete PropertyDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_property_detail),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyDetail', 'url'=>array('admin')),
);
?>

<h1>View PropertyDetail #<?php echo $model->id_property_detail; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_property_detail',
		'id_property',
		'lease_length',
		'subsidized',
		'income_limit_one_person',
		'income_limit_two_person',
		'income_limit_three_person',
		'income_limit_four_person',
		'income_limit_five_person',
		'income_limit_six_person',
		'income_limit_seven_person',
		'income_limit_eight_person',
		'unit_count',
		'structure_type',
		'lease_office_time_open_monday',
		'lease_office_time_close_monday',
		'lease_office_time_open_tuesday',
		'lease_office_time_close_tuesday',
		'lease_office_time_open_wednesday',
		'lease_office_time_close_wednesday',
		'lease_office_time_open_thursday',
		'lease_office_time_close_thursday',
		'lease_office_time_open_friday',
		'lease_office_time_close_friday',
		'lease_office_time_open_sturday',
		'lease_office_time_close_sturday',
		'lease_office_time_open_sunday',
		'lease_office_time_close_sunday',
		'pet_allowed',
		'cats_ok',
		'dogs_ok',
		'campnion_aminal',
		'service_animal',
		'maximum__pet_weight',
		'max_pet',
		'other_term',
		'parking_type',
		'assigned_parking',
		'parking_fee',
		'parking_comments',
	),
)); ?>
