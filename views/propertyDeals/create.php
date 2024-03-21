<?php
/* @var $this PropertyDealsController */
/* @var $model PropertyDeals */

$this->breadcrumbs = array(
    'Property Deals' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Properties', 'url' => array('property/admin')),
    array('label' => 'Add Property', 'url' => array('property/create')),
    array('label' => 'General Property Information', 'url' => array('property/update', 'id' => $id_property)),
    array('label' => 'Property Floor Plan', 'url' => array('propertyFloorPlan/create', 'propertyId' => $id_property)),
    array('label' => 'Property Amenities', 'url' => array('propertyDetail/index', 'propertyId' => $id_property)),
    array('label' => 'Property Photos', 'url' => array('propertyPhoto/create', 'propertyId' => $id_property)),
    array('label' => 'Property Contacts', 'url' => array('propertyContact/index', 'propertyId' => $id_property)),
    array('label' => 'Property Deals/Specials', 'url' => array('propertyDeals/create', 'propertyId' => $id_property)),
    array('label' => 'Property Testimonials', 'url' => array('testiminial/create', 'propertyId' => $id_property)),
    array('label'=>'Create/Update Credentials', 'url'=>array('property/credentials/'.$id_property)),
);
?> 
<h1><?php echo Tools::getPropertyTitle($id_property); ?></h1>
<!--<h3>Manage Property Deals/Specials</h3>-->

<?php echo $this->renderPartial('_form', array('model' => $model, 'header_desc' => $header_desc, 'header_value' => $header_value,
    'specials' => $specials, 'specials_value' => $specials_value, 'time_frame_from' => $time_frame_from, 'time_frame_to' => $time_frame_to)); ?>