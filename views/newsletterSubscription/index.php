<?php
/* @var $this NewsletterSubscriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Newsletter Subscriptions',
);

$this->menu=array(
	array('label'=>'Create NewsletterSubscription', 'url'=>array('create')),
	array('label'=>'Manage NewsletterSubscription', 'url'=>array('admin')),
);
?>

<h1>Newsletter Subscriptions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
