<?php
/* @var $this HousingauthorityController */
/* @var $model Housingauthority */

$this->breadcrumbs = array(
    'Housingauthorities' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage Housing Authority', 'url' => array('admin')),
    array('label' => 'Add Housing Authority', 'url' => array('create')),
    array('label'=>'Manage HA Photos', 'url'=>array('TblHousingauthorityimage/create','housingauthority_id'=>$model->id)),
);
?>

<h1>Update Housing Authority</h1>

<?php   echo $this->renderPartial('_form', array('model' => $model, 'dateModel' => $dateModel)); ?>