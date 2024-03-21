<?php
/* @var $this MgmtcompanyController */
/* @var $model Mgmtcompany */

$this->breadcrumbs = array(
    'Mgmtcompanies' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Management Company', 'url' => array('admin')),
    array('label' => 'Add Management Company', 'url' => array('create')),
);
?>

<h1>Add Management Company</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
