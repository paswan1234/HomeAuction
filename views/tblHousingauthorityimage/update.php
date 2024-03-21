<?php
/* @var $this PropertyPhotoController */
/* @var $model PropertyPhoto */

$this->breadcrumbs=array(
	'Housing Authority Photos'=>array('create'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Housing Authority', 'url'=>array('housingauthority/admin')),
	array('label'=>'Add Housing Authority', 'url'=>array('housingauthority/create')),
	array('label'=>'Manage HA Photos', 'url'=>array('TblHousingauthorityimage/create','housingauthority_id'=>$housingauthority_id)),
);
?>

<h1><?php echo Tools::getHAName($housingauthority_id); ?></h1>
<h3>Update Housing Authority Photo</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model,'housingauthority_id'=>$housingauthority_id)); ?>