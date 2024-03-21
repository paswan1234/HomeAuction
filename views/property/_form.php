<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }

    .clear{
        clear:both;
    }
</style>

<?php
/* @var $this PropertyController */
/* @var $model Property */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('property', "
if($('#PropertyDetail_subsidized_1').prop('checked'))
{
    $('#incomelimitfieldset').hide();
}
$('#PropertyDetail_subsidized_1').click(function(){
	if($('#PropertyDetail_subsidized_1').prop('checked'))
	{
            $('#incomelimitfieldset').hide();
        }
});
$('#PropertyDetail_subsidized_0').click(function(){
	if($('#PropertyDetail_subsidized_0').prop('checked'))
	{
            if($('#Property_property_type_1').prop('checked')){
                $('#incomelimitfieldset').hide();
            }
            else 
                $('#incomelimitfieldset').show();
        }
});

if($('#Property_property_type_1').prop('checked'))
{
            $('#leaselength').hide();
            $('#max_rentdiv').hide();
            $('#min_rentdiv').hide();
            $('#coqval').hide();
            $('#incomelimitfieldset').hide();
            $('#unitcount').hide();
            $('#structuretype').hide();
            $('#leaseofficehours').hide();
}
$('#Property_property_type_1').click(function(){
	if($('#Property_property_type_1').prop('checked'))
	{
            $('#leaselength').hide();
            $('#max_rentdiv').hide();
            $('#min_rentdiv').hide();
            $('#coqval').hide();
            $('#incomelimitfieldset').hide();
            $('#unitcount').hide();
            $('#structuretype').hide();
            $('#leaseofficehours').hide();
        }
});
$('#Property_property_type_0').click(function(){
	if($('#Property_property_type_0').prop('checked'))
	{
            $('#leaselength').show();
            $('#subsidized').show();
            $('#seniorprop').show();
            $('#unitcount').show();
            $('#structuretype').show();
            $('#coqval').show();
            $('#leaseofficehours').show();
            $('#max_beddiv').show();
            $('#min_beddiv').show();
            $('#max_rentdiv').show();
            $('#min_rentdiv').show();
        }
});

if($('#PropertyDetail_seniorprop_1').prop('checked'))
{
            $('#seniorpropval').hide();
}
$('#PropertyDetail_seniorprop_1').click(function(){
	if($('#PropertyDetail_seniorprop_1').prop('checked'))
	{
            $('#seniorpropval').hide();
        }
});
$('#PropertyDetail_seniorprop_0').click(function(){
	if($('#PropertyDetail_seniorprop_0').prop('checked'))
	{
            $('#seniorpropval').show();
        }
});

", 4);
?>

<div class="form">

    <?php 
    $close_day = explode(',', $propertyDetailmodel->close_day);
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'property-form',
                'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div id="errorcontainer">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php echo CHtml::hiddenField('id_property_contact', $propertyContactmodel->id_property_contact); ?>

    <?php echo CHtml::hiddenField('id_property_detail', $propertyDetailmodel->id_property_detail); ?>
    <?php echo CHtml::hiddenField('pid'); ?>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row" style="float:left;width:250px">
            <?php echo $form->textFieldRow($model, 'id_property', array('size' => 15, 'maxlength' => 256, 'readonly' => 'readonly')); ?>
        </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="row">
        <?php echo $form->radioButtonListInlineRow($model, 'property_type', Constants::$property_type); ?>
    </div>

    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'property_title', array('size' => 15, 'maxlength' => 256)); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'managed_by', CHtml::listData(Mgmtcompany::model()->findAll(array('order' => 'name')), 'id', 'name'), array('prompt' => '- Select -')); ?>
        <?php //echo CHtml::hiddenField('managed_by', $model->managed_by); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'manager_id', CHtml::listData(Users::model()->findAllByAttributes(array('mgm_id' => $model->managed_by, 'user_type' => 'rpm')), 'id_user', 'fullname'), array('prompt' => '- Select -')); ?>
        <?php //echo CHtml::hiddenField('managed_by', $model->managed_by); ?>

    </div>
    
    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'status', array('Approved' => 'Active', 'Denied' => 'Denied', 'Pending' => 'Pending')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'property_address', array('size' => 15, 'maxlength' => 256)); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'property_city', array('size' => 45, 'maxlength' => 45)); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'property_state', CHtml::listData(State::model()->findAll(array('order' => 'abbr')), 'abbr', 'abbr'), array('style' => 'width:90px')); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'property_zip', array('size' => 8, 'maxlength' => 8, 'style' => 'width:100px;')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px" id="min_beddiv">
        <?php echo $form->dropDownListRow($propertyDetailmodel, 'min_bed', Constants::$bed_array1, array('prompt' => '--Select--', 'style' => 'width:130px;')); ?>
    </div>
    <div class="row" style="float:left;width:250px" id="max_beddiv">
        <?php echo $form->dropDownListRow($propertyDetailmodel, 'max_bed', Constants::$bed_array1, array('prompt' => '--Select--', 'style' => 'width:130px;')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px" id="min_rentdiv">
        <?php echo $form->textFieldRow($propertyDetailmodel, 'min_rent', array('size' => 8, 'maxlength' => 8,'style' => 'width:100px;')); ?>
    </div>
    <div class="row" style="float:left;width:250px" id="max_rentdiv">
        <?php echo $form->textFieldRow($propertyDetailmodel, 'max_rent', array('size' => 8, 'maxlength' => 8,'style' => 'width:100px;')); ?>
    </div>
    <div class="clear"></div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'lat'); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->textFieldRow($model, 'lng'); ?>
    </div>
    
    <div class="clear"></div>
    <div class="row" style="float:left;width:400px">
        <?php echo $form->textFieldRow($model, 'facebook_page_url', array('style'=>'width:350px')); ?>
    </div>
    <div class="row" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($model, 'fb_btn_show', array('No', 'Yes'), array('prompt' => '--Select--', 'style' => 'width:120px;')); ?>
    </div>
    
    <div class="clear"></div>
    <div class="row">
        <fieldset>
            <legend>Contact Info.,</legend>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'contact_first_name', array('size' => 60, 'maxlength' => 256)); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'contact_last_name', array('size' => 60, 'maxlength' => 256)); ?>
            </div>
            <div class="clear"></div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($model, 'phone', array('size' => 15, 'maxlength' => 15, 'style' => 'width:110px;')); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($model, 'fax', array('size' => 15, 'maxlength' => 15, 'style' => 'width:110px;')); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'email', array('size' => 60, 'maxlength' => 150)); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'cc_email', array('size' => 60, 'maxlength' => 150)); ?>
            </div>

            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'cc_email_2', array('size' => 60, 'maxlength' => 150)); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'cc_email_3', array('size' => 60, 'maxlength' => 150)); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->textFieldRow($propertyContactmodel, 'cc_email_4', array('size' => 60, 'maxlength' => 150)); ?>
            </div>


            <div class="clear"></div>
        </fieldset>        
    </div>
    <div class="row">
        <fieldset>
            <legend>Description</legend>
            <div class="row">
                <?php echo $form->textFieldRow($model, 'tag_line', array('size' => 6, 'maxlength' => 50)); ?>
            </div>
            <div class="row">
                <?php echo $form->dropDownListRow($propertyRating, 'vote_avg', array('5' => '5', '4' => '4', '3' => '3', '2' => '2', '1' => '1', '0' => '0'), array('style' => 'width:60px;')); ?>
            </div>
            <div class="row" >
                <?php 
                    if($model->scenario=='update')
                    { 
                        if($model->description=='' || $model->description==NULL)
                        {    
                    ?>
                        <label for="Property_description">Description</label>
                        <textarea id="Property_description" name="Property[description]" style="width:400px" cols="100" rows="6"><?php echo ucwords(strtolower($model['property_title'])) ?> apartments is an affordable rental housing community located in <?php echo ucwords(strtolower($model['property_city'])) ?>, <?php echo $model['property_state'] ?>. <?php echo ucwords(strtolower($model['property_title'])) ?> apartments is<?php ($propertyDetailmodel['seniorprop'] == 'Yes') ? print " a Senior"  : print " an "  ?> affordable housing community with <?php echo $beddesc . $progdesc ?> units.Income restrictions may apply, please contact <?php echo ucwords(strtolower($model['property_title'])) ?> apartments for rates, availability and more information or compare to other apartments in <?php echo ucwords(strtolower($model['property_city'])) ?> from the results below.</textarea>
                    <?php
                        }
                        else
                        {
                             echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 100, 'style' => 'width:400px'));
                        }    
                    }
                    else
                        echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 100, 'style' => 'width:400px'));
                    ?>
            </div>
            
    <?php //Utility Allowance Section  ?>
    <div class="row">
        <fieldset>
            <legend>Utility Allowance</legend>
            <div id="electic">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'electric', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"><hr></div>
            <div id="water">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'water', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"><hr></div>
            <div id="sewer">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'sewer', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"><hr></div>
            <div id="hot_water">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'hot_water', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"><hr></div>
            <div id="cooling">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'cooling', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"><hr></div>
            <div id="cooking">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'cooking', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"><hr></div>
            <div id="heat">
                <?php echo $form->radioButtonListInlineRow($propertyUtilityAllowancemodel, 'heat', array('manager' => 'Manager', 'tenant' => 'Tenant', 'N/A' => 'N/A', 'call' => 'Call')); ?>
            </div>
            <div class="clear"></div>
        </fieldset>
    </div>
    <?php // End Utility Allowance Section  ?>
            <br>
            
            <div class="row" style="float:left;width:250px">
                <?php echo $form->dropDownListRow($model, 'rent_type', Constants::$rent_type); ?>
            </div>
            <div class="row" style="float:left;width:250px">
                <?php echo $form->dropDownListRow($model, 'prog_type', Constants::$prog_type); ?>
            </div>
            <div class="clear"></div>
        </fieldset>
    </div>
    <div id="leaselength">
        <?php echo $form->textFieldRow($propertyDetailmodel, 'lease_length', array('maxlength' => 256)); ?>
    </div>
    <div id="seniorprop">
        <?php echo $form->radioButtonListInlineRow($propertyDetailmodel, 'seniorprop', array('Yes' => 'Yes', 'No' => 'No')); ?>
    </div>

    <div id="seniorpropval">
        <?php echo $form->radioButtonListInlineRow($propertyDetailmodel, 'seniorpropval', array('55' => '55+', '62' => '62+')); ?>
    </div>

    <div id="seniorpropval">
        <?php echo $form->radioButtonListInlineRow($propertyDetailmodel, 'handicap', array('Yes' => 'Yes', 'No' => 'No')); ?>
    </div>

    <div id="seniorpropval">
        <?php echo $form->radioButtonListInlineRow($propertyDetailmodel, 'section8', array('Yes' => 'Yes', 'No' => 'No')); ?>
    </div>

    <div id="coqval">
        <?php echo $form->radioButtonListInlineRow($propertyDetailmodel, 'coq', array('Yes' => 'Yes', 'No' => 'No')); ?>
    </div>



    <div id="subsidized">
        <?php echo $form->radioButtonListInlineRow($propertyDetailmodel, 'subsidized', array('Yes' => 'Yes', 'No' => 'No')); ?>
    </div>



    <fieldset id="incomelimitfieldset">
        <br>
        <p>Income Limits</p>
        <p><input type="radio" name="subsival" value="0" id="subsitext" style="float:left" <?php ($propertyDetailmodel->income_limit_one_person == 0) ? print "checked"  : '' ?>><label for="subsitext">&nbsp;Generic Text : Income limits for this community may apply.  Please contact site manager for more details.</label></p>
        <p><input type="radio" name="subsival" value="1" id="subsiamt" style="float:left" <?php ($propertyDetailmodel->income_limit_one_person != 0) ? print "checked"  : '' ?>><label for="subsiamt">&nbsp;Income Value</label></p>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_one_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_two_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_three_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_four_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_five_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_six_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_seven_person', array('class' => 'smallInputText')); ?>
        </div>
        <div class="incomelimitrow">
            <?php echo $form->textFieldRow($propertyDetailmodel, 'income_limit_eight_person', array('class' => 'smallInputText')); ?>
        </div>
    </fieldset>
    <div id="unitcount" style="float:left;width:130px">
        <?php echo $form->textFieldRow($propertyDetailmodel, 'unit_count', array('size' => 8, 'maxlength' => 8, 'style' => 'width:80px;')); ?>
    </div>
    <div id="structuretype" style="float:left;width:250px">
        <?php echo $form->dropDownListRow($propertyDetailmodel, 'structure_type', CHtml::listData(StructureType::model()->findAll(), 'value', 'name')); ?>
    </div>
    <div style="clear:both">
    </div>

    <fieldset id="leaseofficehours">
        <legend>Lease Office Hours</legend>
        <div class="incomelimitrow" style="width:100%;margin-bottom: 20px">

            <?php echo CHtml::checkBox('update_hours', true) ?> <b>Do not update Office hours.</b>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_monday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_monday;

            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_monday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_monday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_monday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_monday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div> 
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_tuesday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_tuesday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_tuesday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_tuesday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_tuesday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_tuesday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div> 

        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_wednesday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_wednesday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_wednesday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_wednesday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_wednesday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_wednesday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div> 

        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_thursday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_thursday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_thursday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_thursday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_thursday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_thursday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div> 

        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_friday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_friday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_friday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_friday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_friday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_friday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div> 

        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_sturday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_sturday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_sturday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_sturday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_sturday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_sturday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div> 

        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_open_sunday == '')
                $val = '09:00 AM';
            else
                $val = $propertyDetailmodel->lease_office_time_open_sunday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_open_sunday', Constants::$open_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>
        <div class="incomelimitrow">
            <?php
            if ($propertyDetailmodel->lease_office_time_close_sunday == '')
                $val = '05:00 PM';
            else
                $val = $propertyDetailmodel->lease_office_time_close_sunday;
            echo $form->dropDownListRow($propertyDetailmodel, 'lease_office_time_close_sunday', Constants::$close_hour_dropdown, array('options' => array($val => array('selected' => 'selected'))));
            ?>
        </div>

        <div class="clear"></div>


    </fieldset>

    <div class="clear"></div>
    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Submit',
            'size' => 'large',
            'type' => 'primary',
            'buttonType' => 'submit',
            'htmlOptions' => array('style' => 'margin-top:15px'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

