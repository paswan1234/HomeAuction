<?php
/* @var $this TestiminialController */
/* @var $model Testiminial */

$this->breadcrumbs = array(
    'Testiminials' => array('index'),
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
<h3>Manage Property Testimonials</h3>

<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'testiminial-grid',
    'dataProvider' => $model->searchPropertyTestimonial($id_property),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'testimonialDate', 'value' => '$data->date', 'header' => 'Date'),
        'fname',
        'lname',
        'status',
        'testimonail',
        /*
          'testimonail',
          'status',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));
?>

<?php echo $this->renderPartial('_form', array('model' => $model, 'id_property' => $id_property)); ?>