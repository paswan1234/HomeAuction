<?php
/* @var $this MgmtcompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mgmtcompanies',
);

$this->menu=array(
	array('label'=>'Create Mgmtcompany', 'url'=>array('create')),
	array('label'=>'Manage Mgmtcompany', 'url'=>array('admin')),
);
?>

<h1>Mgmtcompanies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
