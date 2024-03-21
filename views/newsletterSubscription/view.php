<?php
/* @var $this NewsletterSubscriptionController */
/* @var $model NewsletterSubscription */

$this->breadcrumbs=array(
	'Newsletter Subscriptions'=>array('index'),
	$model->id_newsletter,
);

$this->menu=array(
	array('label'=>'List NewsletterSubscription', 'url'=>array('index')),
	array('label'=>'Create NewsletterSubscription', 'url'=>array('create')),
	array('label'=>'Update NewsletterSubscription', 'url'=>array('update', 'id'=>$model->id_newsletter)),
	array('label'=>'Delete NewsletterSubscription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_newsletter),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsletterSubscription', 'url'=>array('admin')),
);
?>

<h1>View NewsletterSubscription #<?php echo $model->id_newsletter; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_newsletter',
		'email',
		'created_date',
		'reply',
	),
)); ?>
