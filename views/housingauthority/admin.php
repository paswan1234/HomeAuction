<?php
/* @var $this HousingauthorityController */
/* @var $model Housingauthority */

$this->breadcrumbs = array(
    'Housingauthorities' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage Housing Authority', 'url' => array('admin')),
    array('label' => 'Add Housing Authority', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#housingauthority-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Housing Authorities</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'housingauthority-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'ha_id', 'header' => 'HA Id', 'htmlOptions' => array('width' => '80px')),
        array('name' => 'name', 'header' => 'Property Title', 'value' => 'CHtml::link($data->name, Yii::app()->createUrl("housingauthority/update",array("id"=>$data->id)),array("target"=>"_blank"))', 'type' => 'raw'),
        'service_type',
        'address',
        'city',
        array('name' => 'state', 'header' => 'State', 'htmlOptions' => array('width' => '80px')),
        array('name' => 'create_time', 'header' => 'Created On', 'value' => '($data->create_time)? date("Y-m-d H:i:s", $data->create_time):"NA"', 'htmlOptions' => array('width' => '80px')),
        array('name' => 'update_time', 'header' => 'Updated On', 'value' => '($data->update_time)? date("Y-m-d H:i:s", $data->update_time):"NA"', 'htmlOptions' => array('width' => '80px')),
        /*  array(
          'class' => 'bootstrap.widgets.TbButtonColumn',
          'template' => '{update}{delete}',
          ), BY LMS 28-07 */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}{view}',
            'buttons' => array(
                'view' => array
                    (
                    'label' => 'View',
                    'url' => '(1) ? Tools::getBaseUrl()."housingauthority/view/id/$data->id?token=".Tools::getAdminToken() : Tools::getBaseUrl()."housingauthority/view/general/id/$data->id?token=".Tools::getAdminToken()',
                    'options' => array('target' => '_blank'),
                ),
            ),
        ),
    ),
));
?>
