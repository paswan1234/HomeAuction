<?php
/* @var $this TblHousingauthorityimageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Housingauthorityimages',
);

$this->menu=array(
	array('label'=>'Create TblHousingauthorityimage', 'url'=>array('create')),
	array('label'=>'Manage TblHousingauthorityimage', 'url'=>array('admin')),
);
?>

<h1>Tbl Housingauthorityimages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
