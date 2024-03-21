<?php
/* @var $this AmenitiesController */
/* @var $model Amenities */

$this->breadcrumbs=array(
	'Amenities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Change Password', 'url'=>array('site/changePassword')),
        array('label'=>'Add/Edit Parking Type', 'url'=>array('parkingType/create')),
        array('label'=>'Add/Edit Structure Type', 'url'=>array('structureType/create')),
        array('label'=>'Add/Edit Amenities', 'url'=>array('amenities/create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'amenities-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered',
	'columns'=>array(
                'type',
                'cat',
		array('name' => 'name', 'header' => 'Amenity Name'),
		'description',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}',
		),
	),
)); ?>

<h1>Add Amenities</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>