<?php
/* @var $this StructureTypeController */
/* @var $model StructureType */

$this->breadcrumbs=array(
	'Structure Types'=>array('index'),
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
	'id'=>'structure-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered',
	'columns'=>array(
		'name',
		'value',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}',
		),
	),
)); ?>

<h1>Add Structure Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>