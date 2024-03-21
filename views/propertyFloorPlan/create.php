<?php
/* @var $this PropertyFloorPlanController */
/* @var $model PropertyFloorPlan */

$this->breadcrumbs = array(
    'Property Floor Plans' => array('index'),
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
<h3>Manage Property Floor Plan </h3> 

<?php

$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'property-floor-plan-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        'floor_plan_name',
        'beds',
        'baths',
        array('name' => 'sqft', 'value' => '$data->square_feet_from."-".$data->square_feet_to', 'header' => 'Sqft'),
        array('name' => 'required_deposit', 'value' => '$data->required_deposit', 'header' => 'Deposit'),
        array('name' => 'rent_from', 'value' => '($data->rent_from == 0) ? (stripos($data->deposit_description, "please call") ? print "Please call"  : print $data->deposit_description)  : ((($data->rent_from != $data->rent_to) && $data->rent_to != 0)? print "$" . number_format($data->rent_from)." - $".number_format($data->rent_to) : print "$".number_format($data->rent_from))', 'header' => 'Rent'),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));
?>

<?php
echo $this->renderPartial('_form', array('model' => $model, 'id_property' => $id_property
));
?>
