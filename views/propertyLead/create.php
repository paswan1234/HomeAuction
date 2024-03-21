<?php
/* @var $this PropertyLeadController */
/* @var $model PropertyLead */

$this->breadcrumbs=array(
	'Property Leads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PropertyLead', 'url'=>array('index')),
	array('label'=>'Manage PropertyLead', 'url'=>array('admin')),
);
?>

<h1>Create PropertyLead</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>