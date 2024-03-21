<?php
/* @var $this PropertyContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Contacts',
);

$this->menu=array(
	array('label'=>'Create PropertyContact', 'url'=>array('create')),
	array('label'=>'Manage PropertyContact', 'url'=>array('admin')),
);
?>

<h1>Property Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
