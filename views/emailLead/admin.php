<?php
/* @var $this EmailLeadController */
/* @var $model EmailLead */

$this->breadcrumbs = array(
    'Email Leads' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Property Lead', 'url' => array('propertyLead/admin')),
    array('label' => 'HA Lead', 'url' => array('haLead/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#email-lead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Email Leads</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<!--<a id="btnExportCsv" name="btnExportCsv" href="<?php echo Yii::app()->createUrl('/emailLead/leadexport'); ?>" target="_blank">Export To CSV</a>-->
<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'ha-lead-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'created_at', 'header' => 'Date', 'value' => '($data->created_at != "" && $data->created_at != "0000-00-00") ? date("m-d-Y",strtotime($data->created_at)) : ""'),
        array('name' => 'id_email_lead', 'header' => 'Email Lead ID', 'value' => 'CHtml::link($data->id_email_lead, "javascript:void(0)",array("onclick"=>"window.open(\'leaddetail?leadid=$data->id_email_lead\',\'\',\'width=400,height=500\')"))', 'type' => 'raw'),
        'name',
        array('name' => 'email', 'header' => 'Email', 'value' => 'CHtml::link($data->email,"mailto:$data->email",array("target"=>"top"))', 'type' => 'raw'),
        'phone',
        array('name' => 'id_property', 'header' => 'Property ID', 'value' => 'CHtml::link($data->id_property, Yii::app()
 ->createUrl("emailLead/propertydetail",array("id_property"=>$data->id_property)),array("target"=>"_blank"))', 'type' => 'raw'),
        'lead_source',
        'affiliate_source',
    ),
));
?>

