<?php
/* @var $this PropertyLeadController */
/* @var $model PropertyLead */

$this->breadcrumbs=array(
	'Property Leads'=>array('index'),
	$model->id_property_lead,
);

$this->menu=array(
	array('label'=>'List PropertyLead', 'url'=>array('index')),
	array('label'=>'Create PropertyLead', 'url'=>array('create')),
	array('label'=>'Update PropertyLead', 'url'=>array('update', 'id'=>$model->id_property_lead)),
	array('label'=>'Delete PropertyLead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_property_lead),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyLead', 'url'=>array('admin')),
);
?>

<h1>View PropertyLead #<?php echo $model->id_property_lead; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_property_lead',
		'id_property',
		'first_name',
		'last_name',
		'email_address',
		'move_date',
		'occupants',
		'yearly_income',
		'phone',
		'message',
		'created_at',
		'updated_at',
		'lead_type',
		'lead_status',
	),
)); ?>
