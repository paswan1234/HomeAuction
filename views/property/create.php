<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs = array(
    'Properties' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Properties', 'url' => array('admin')),
    array('label' => 'Add Property', 'url' => array('create')),
);
?>

<h1>Add Property</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'propertyRating' => $propertyRating, 'propertyContactmodel' => $propertyContactmodel, 'propertyDetailmodel' => $propertyDetailmodel, 'propertyUtilityAllowancemodel' => $propertyUtilityAllowancemodel)); ?>