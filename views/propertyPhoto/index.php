<?php
/* @var $this PropertyPhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Photos',
);

$this->menu=array(
	array('label'=>'Create PropertyPhoto', 'url'=>array('create')),
	array('label'=>'Manage PropertyPhoto', 'url'=>array('admin')),
);
?>

<h1>Property Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
