<?php
/* @var $this PropertyDetailController */
/* @var $model PropertyDetail */

$this->breadcrumbs=array(
	'Property Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PropertyDetail', 'url'=>array('index')),
	array('label'=>'Create PropertyDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#property-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Property Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'property-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered',
	'columns'=>array(
		'id_property_detail',
		'id_property',
		'lease_length',
		'subsidized',
		'income_limit_one_person',
		'income_limit_two_person',
		/*
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
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
