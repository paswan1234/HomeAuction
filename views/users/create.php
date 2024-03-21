<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Renters' => array('manageRenter'),
    'Create',
);
if ($type == 'renter') {
    $useraction = array(
        array('label' => 'List Renters', 'url' => array('manageRenter')),
        array('label' => 'Add Renter', 'url' => array('createRenter')),
    );
}

if ($type == 'pm') {
    $useraction = array(
        array('label' => 'List Property Manager', 'url' => array('managePM')),
        array('label' => 'Add Property Manager', 'url' => array('createPM')),
    );
}

$this->menu = $useraction;
?>


<h1>Add <?php ($type == 'renter') ? print "Renter"  : print "Property Manager"; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'type' => $type,)); ?>