<div>
    <h4>Balance Summery</h4>
    <div>
        Current Balance : $<?php ($paidamount == '') ? print '0' : print $paidamount ?><br>
        Total Balance Due : $<?php echo $pendingamount ?><br>
        </br>
    </div>
</div>

<h4>Property Balances</h4>
<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'property-grid',
    'dataProvider' => $model->getBillingList(),
    'type' => 'striped bordered',
    'enablePagination' => true,
    'columns' => array(
        array('header' => 'Property', 'value' => '$data->title'),
        array('header' => 'Balance', 'value' => 'number_format($data->amount)'),
        array('header' => 'Balance Type', 'value' => '$data->type'),
        array('header' => 'Invoice Date', 'value' => 'date("m-d-Y",strtotime($data->invoice_date))'),
        array('header' => 'Payment Status', 'value' => 'ucfirst(strtolower($data->status))'),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}',
            'buttons' => array(
                'update' => array(
                    'url' => 'Yii::app()->createUrl("billing/changestatus", array("id"=>$data->id_billing))',
                    'label'=>'Change Status',
                )
            ),
        ),
        )));
?>

