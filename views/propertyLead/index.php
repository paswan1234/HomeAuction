<?php
/* @var $this PropertyLeadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Property Leads',
);

$this->menu=array(
	array('label'=>'Create PropertyLead', 'url'=>array('create')),
	array('label'=>'Manage PropertyLead', 'url'=>array('admin')),
);
?>

<h1>Property Leads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
