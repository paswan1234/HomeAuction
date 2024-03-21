<style>
    .red {background-color: red !important}
    .green {background-color: green !important}
    .yellow {background-color: yellow !important}
</style>
<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs = array(
    'Properties' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'Manage Properties', 'url' => array('admin')),
    array('label' => 'Add Property', 'url' => array('create')),
    array('label' => 'Properties Queue', 'url' => array('admin?status=queue')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#property-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Properties</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
$status = '';
if (isset($_GET['status']))
    $status = $_GET['status'];

$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'property-grid',
    'dataProvider' => $model->search($status),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'id_property', 'header' => 'Property Id', 'value' => 'CHtml::link($data->id_property, Yii::app()
 ->createUrl("property/update",array("id"=>$data->id_property)),array("target"=>"_blank"))', 'type' => 'raw', 'htmlOptions' => array('width' => '80px')),
        array(
            'name' => 'status',
            'header' => 'Status',
            'value' => '$data->status',
            'cssClassExpression' => '($data->status == "Pending")? "yellow":(($data->status == "Approved")? "green": "red")',
            'htmlOptions' => array('width' => '60px')
        ),
        array('name' => 'property_type', 'header' => 'Property Type', 'value' => '($data->property_type == "premium")?"Premium":"General"', 'htmlOptions' => array('width' => '80px')),
        array('name' => 'property_title', 'header' => 'Property Title', 'value' => 'CHtml::link($data->property_title, Yii::app()
 ->createUrl("property/update",array("id"=>$data->id_property)),array("target"=>"_blank"))', 'type' => 'raw', 'htmlOptions' => array('width'=>'120px')),
        'property_address',
        array('name' => 'property_zip', 'header' => 'Property Zip', 'value' => '($data->property_zip)?$data->property_zip:"NA"', 'htmlOptions' => array('width' => '75px')),
        'property_city',
        array('name' => 'property_state', 'header' => 'State', 'htmlOptions' => array('width' => '60px')),
        array('name' => 'mgmcompany', 'header' => 'Management Company', 'value' => '$data->idMgm->name', 'htmlOptions' => array('width' => '160px')),
        array('name' => 'created_at', 'header' => 'Created', 'value' => '$data->created_at', 'htmlOptions' => array('width' => '80px')),
        array('name' => 'updated_at', 'header' => 'Updated', 'value' => '$data->updated_at', 'htmlOptions' => array('width' => '80px')),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}{view}',
            'buttons' => array(
                'view' => array
                    (
                    'label' => 'View',
                    'url' => '($data->property_type == "premium") ? Tools::getBaseUrl()."property/view/id/$data->id_property?token=".Tools::getAdminToken() : Tools::getBaseUrl()."property/view/general/id/$data->id_property?token=".Tools::getAdminToken()',
                    'options' => array('target' => '_blank'),
                ),
            ),
        ),
    ),
));
?>

