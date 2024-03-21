<?php
/* @var $this HousingauthorityController */
/* @var $model Housingauthority */

$this->breadcrumbs = array(
    'Housing Authorities' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Housing Authority', 'url' => array('admin')),
    array('label' => 'Add Housing Authority', 'url' => array('create')),
);
?>

<h1>Add Housing Authority</h1>

<?php echo $this->renderPartial('_form', array('model' => $model,'dateModel' => $dateModel)); ?>