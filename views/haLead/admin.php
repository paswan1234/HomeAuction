<?php
/* @var $this HaLeadController */
/* @var $model HaLead */

$this->breadcrumbs = array(
    'Ha Leads' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Check Availability Lead', 'url' => array('admin?type=chk')),
    array('label' => 'Apply Now Lead', 'url' => array('admin?type=apply')),
    array('label' => 'Property Lead', 'url' => array('propertyLead/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ha-lead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ha Leads</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
if (isset($_GET['type']))
{    
?>   
    <a href="<?php echo Yii::app()->createUrl('/haLead/haleadexport?type='.$_GET['type']); ?>">Export to CSV</a>
<?php
}
else
{
?>   
    <a href="<?php echo Yii::app()->createUrl('/haLead/haleadexport'); ?>">Export to CSV</a>
<?php
}
?>
    
<?php
$type = '';
if (isset($_GET['type']))
    $type = $_GET['type'];

$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'ha-lead-grid',
    'dataProvider' => $model->search($type),
    'filter' => $model,
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('name' => 'created_at', 'header' => 'Date', 'value' => '($data->created_at != "" && $data->created_at != "0000-00-00") ? date("m-d-Y",strtotime($data->created_at)) : ""'),
        array('name' => 'leadusername', 'header' => 'From', 'value' => '$data->fname." ".$data->lname'),
        'home_phone',
        array('name' => 'email', 'header' => 'Email', 'value' => 'CHtml::link($data->email, "javascript:void(0)",array("onclick"=>"window.open(\'leaddetail?leadid=$data->id\',\'\',\'width=600,height=700\')"))', 'type' => 'raw'),
        array('name' => 'ha_id', 'header' => 'HA ID', 'value' => 'CHtml::link($data->ha_id, Yii::app()
 ->createUrl("haLead/hadetail",array("ha_id"=>$data->ha_id)),array("target"=>"_blank"))', 'type' => 'raw'),
    ),
));
?>



