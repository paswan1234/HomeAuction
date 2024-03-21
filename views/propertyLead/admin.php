<?php
/* @var $this PropertyLeadController */
/* @var $model PropertyLead */

$this->breadcrumbs = array(
    'Property Leads' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Check Availability Lead', 'url' => array('admin?type=chk')),
    array('label' => 'Apply Now Lead', 'url' => array('admin?type=apply')),
    array('label' => 'HA Lead', 'url' => array('haLead/admin?type=chk')),
    array('label' => 'Email Lead', 'url' => array('emailLead/admin')),
    array('label' => 'Generate Report', 'url' => array('leadreport')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#property-lead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Property Leads</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
if(isset($_GET['type']))
{
    $type = $_GET['type'];
?>
    <a id="btnExportCsv" name="btnExportCsv" href="<?php echo Yii::app()->createUrl('/propertyLead/leadexport?type='.$type); ?>" >Export To CSV</a>
<?php
}
else
{    
?>
    <a id="btnExportCsv" name="btnExportCsv" href="<?php echo Yii::app()->createUrl('/propertyLead/leadexport'); ?>" >Export To CSV</a>
<?php
}
?>

<?php
$type = '';
if (isset($_GET['type']))
    $type = $_GET['type'];

$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'property-lead-grid',
    'dataProvider' => $model->search($type),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'created_at', 'header' => 'Date', 'value' => '($data->created_at != "" && $data->created_at != "0000-00-00") ? date("m-d-Y",strtotime($data->created_at)) : ""'),
        array('name' => 'leadusername', 'header' => 'From', 'value' => '$data->first_name." ".$data->last_name'),
        array('name' => 'move_date', 'header' => 'Move Date', 'value' => '($data->move_date != "" && $data->move_date != "0000-00-00") ? date("m-d-Y",strtotime($data->move_date)) : ""'),
        'phone',
        array('name' => 'email_address', 'header' => 'Email', 'value' => 'CHtml::link($data->email_address, "javascript:void(0)",array("onclick"=>"window.open(\'leaddetail?leadid=$data->id_property_lead\',\'\',\'width=400,height=500\')"))', 'type' => 'raw'),
        array('name' => 'id_property', 'header' => 'Property Lead ID', 'value' => 'CHtml::link($data->id_property, Yii::app()
 ->createUrl("propertyLead/propertydetail",array("id_property"=>$data->id_property)),array("target"=>"_blank"))', 'type' => 'raw'),
    ),
));
?>

