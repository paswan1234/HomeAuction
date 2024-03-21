<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->id_property=>array('view','id'=>$model->id_property),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Properties', 'url'=>array('admin')),
	array('label'=>'Add Property', 'url'=>array('create')),
        array('label'=>'General Property Information', 'url'=>array('update','id'=>$model->id_property)),
	array('label'=>'Property Floor Plan', 'url'=>array('propertyFloorPlan/create', 'propertyId'=>$model->id_property)),
	array('label'=>'Property Amenities', 'url'=>array('propertyDetail/index', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Photos', 'url'=>array('propertyPhoto/create', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Contacts', 'url'=>array('propertyContact/index', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Deals/Specials', 'url'=>array('propertyDeals/create', 'propertyId'=>$model->id_property)),
        array('label'=>'Property Testimonials', 'url'=>array('testiminial/create', 'propertyId'=>$model->id_property)),
        array('label'=>'Create/Update Credentials', 'url'=>array('property/credentials/'.$model->id_property)),
);
?>

<h1>General Property Information for Listing ID <?php echo $model->id_property?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model,'propertyRating' => $propertyRating,'propertyContactmodel'=>$propertyContactmodel,'propertyDetailmodel'=>$propertyDetailmodel, 'propertyUtilityAllowancemodel' => $propertyUtilityAllowancemodel)); ?>