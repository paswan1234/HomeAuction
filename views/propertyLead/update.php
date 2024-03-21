<?php
/* @var $this PropertyLeadController */
/* @var $model PropertyLead */

$this->breadcrumbs=array(
	'Property Leads'=>array('index'),
	$model->id_property_lead=>array('view','id'=>$model->id_property_lead),
	'Update',
);

$this->menu=array(
	array('label'=>'List PropertyLead', 'url'=>array('index')),
	array('label'=>'Create PropertyLead', 'url'=>array('create')),
	array('label'=>'View PropertyLead', 'url'=>array('view', 'id'=>$model->id_property_lead)),
	array('label'=>'Manage PropertyLead', 'url'=>array('admin')),
);
?>

<h1>Update PropertyLead <?php echo $model->id_property_lead; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>