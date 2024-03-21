<?php
/* @var $this AmenitiesController */
/* @var $model Amenities */

$this->breadcrumbs=array(
	'Amenities'=>array('index'),
	$model->name=>array('view','id'=>$model->id_amenity),
	'Update',
);

$this->menu=array(
	array('label'=>'Change Password', 'url'=>array('site/changePassword')),
        array('label'=>'Add/Edit Parking Type', 'url'=>array('parkingType/create')),
        array('label'=>'Add/Edit Structure Type', 'url'=>array('structureType/create')),
        array('label'=>'Add/Edit Amenities', 'url'=>array('amenities/create')),
);
?>

<h1>Update Amenities <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>