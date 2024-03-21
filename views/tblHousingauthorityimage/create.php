<?php
/* @var $this PropertyPhotoController */
/* @var $model PropertyPhoto */

$this->breadcrumbs=array(
	'Property Photos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Housing Authority', 'url'=>array('housingauthority/admin')),
	array('label'=>'Add Housing Authority', 'url'=>array('housingauthority/create')),
        array('label'=>'Update Housing Authority', 'url'=>array('housingauthority/update','id'=>$housingauthority_id)),
);

?>

<h1><?php echo Tools::getHAName($housingauthority_id); ?></h1>
<h3>Add Housing Authority Photo</h3>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'property-photo-grid',
	'dataProvider'=>$model->search($housingauthority_id),
        'type'=>'striped bordered',
        'enablePagination'=>true,
	'columns'=>array(
		array('name'=>'filename','value'=>'CHtml::image("'.Tools::getBaseUrl().'$data->path/$data->filename","",array("width"=>100))','type'=>'raw',),
		'caption',
                'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
		),
	),
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'housingauthority_id'=>$housingauthority_id)); ?>