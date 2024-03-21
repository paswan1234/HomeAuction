<?php
/* @var $this TblHousingauthorityimageController */
/* @var $model TblHousingauthorityimage */

$this->breadcrumbs=array(
	'Tbl Housingauthorityimages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblHousingauthorityimage', 'url'=>array('index')),
	array('label'=>'Create TblHousingauthorityimage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-housingauthorityimage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Housingauthorityimages</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-housingauthorityimage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'housingauthority_id',
		'path',
		'filename',
		'title',
		'alt',
		/*
		'caption',
		'type',
		'sort',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
