<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
            'id' => 'property-lead-form',
            'enableAjaxValidation' => false,
        ));
?>

<div class="form">
    <div class="row">
        <label>
            Select Management Company:
        </label>
        <?php echo CHtml::dropDownList('mgm_id', $mgm_id, CHtml::listData(Mgmtcompany::model()->findAll(array('order' => 'name')), 'id', 'name')); ?>
    </div>

    <div class="row">
        Date From :&nbsp;<?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'from',
            'id' => 'from',
            'value' => date('m/d/Y'),
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        
        To :&nbsp;<?php
        
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'to',
            'id' => 'to',
            'value' => date('m/d/Y'),
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        
    </div>
</div>

<div class="row buttons">
<?php echo CHtml::submitButton('Generate Report', array('name' => 'csv')); ?>
<?php echo CHtml::submitButton('Save to file', array('name' => 'csv', 'value' => 'Save to file')); ?>
</div>
<?php if ($showlink): ?>
    <div class="row" style="margin-top:25px;font-size:14px">
        <b>To download report file <a href="<?php echo Tools::getBaseUrl() ?>csv/leadreport.csv">click here</a></b>
    </div>
<?php endif; ?>

<?php $this->endWidget(); ?>

<div class="row"><hr size="1"/></div>
<div class="row"><h2>Lead report as on <?php echo date('m/d/Y') ?></h2></div>
<div class="row">
    <?php
    if (count($leads) > 0):
        $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'id' => 'property-lead-grid',
            'dataProvider' => $dataProvider,
            'type' => 'striped bordered',
            'enablePagination' => true,
            'columns' => array(
                array('name' => 'pid', 'header' => 'Propety ID', 'value' => $data->pid),
                array('name' => 'pname', 'header' => 'Property', 'value' => $data->pname),
                array('name' => 'name', 'header' => 'Name', 'value' => $data->name),
                array('name' => 'email', 'header' => 'Email', 'value' => $data->email),
                array('name' => 'phone', 'header' => 'Phone', 'value' => $data->phone),
                array('name' => 'date', 'header' => 'Date', 'value' => $data->date),
                array('name' => 'lead_type', 'header' => 'Lead Type', 'value' => $data->lead_type),
            ),
        ));
    endif;
    ?>

</div>


