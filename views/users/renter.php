<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage Renters',
);

$this->menu = array(
    array('label' => 'List Renters', 'url' => array('manageRenter')),
    array('label' => 'Add Renter', 'url' => array('createRenter')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Renters</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'users-grid',
    'dataProvider' => $model->searchRenter(),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'name', 'value' => '$data->fname." ".$data->lname', 'header' => 'Name'),
        'email',
        'city',
        'state',
        array('value' => 'Users::model()->getUserSubscribeFor($data->id_user)', 'header' => 'Subscribe For'),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));
?>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

