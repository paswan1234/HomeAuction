<?php
/* @var $this PropertyDetailController */
/* @var $model PropertyDetail */

$this->breadcrumbs = array(
    'Property Details' => array('index'),
    $model->id_property_detail => array('view', 'id' => $model->id_property_detail),
    'Update',
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
<h3>Update Property Amenities</h3>

<?php
echo $this->renderPartial('_form', array('model' => $model,
    'amenities' => $amenities,
    'amenitiesU' => $amenitiesU,
    'otheramenities' => $otheramenities,
    'otherunitamenities' => $otherunitamenities,
    'id_property' => $id_property,));
?>