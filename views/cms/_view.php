<?php
/* @var $this CmsController */
/* @var $data Cms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cms')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cms), array('view', 'id'=>$data->id_cms)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_title')); ?>:</b>
	<?php echo CHtml::encode($data->page_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />


</div>