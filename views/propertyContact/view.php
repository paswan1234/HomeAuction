<?php
/* @var $this PropertyContactController */
/* @var $model PropertyContact */

$this->breadcrumbs=array(
	'Property Contacts'=>array('index'),
	$model->id_property_contact,
);

$this->menu=array(
	array('label'=>'List PropertyContact', 'url'=>array('index')),
	array('label'=>'Create PropertyContact', 'url'=>array('create')),
	array('label'=>'Update PropertyContact', 'url'=>array('update', 'id'=>$model->id_property_contact)),
	array('label'=>'Delete PropertyContact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_property_contact),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PropertyContact', 'url'=>array('admin')),
);
?>

<h1>View PropertyContact #<?php echo $model->id_property_contact; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_property_contact',
		'id_property',
		'contact_first_name',
		'contact_last_name',
		'address',
		'city',
		'state',
		'zip',
		'phone',
		'fax',
		'email',
		'billing_contact_fname',
		'billing_contact_lname',
		'billing_cc_invoice_one',
		'billing_cc_invoice_two',
	),
)); ?>
