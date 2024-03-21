<style>
    .clear{
        clear: both;
    }
    label{
        font-weight: normal;
    }
</style>
<script>
    function setFocus(id){
        $('#'+id).attr('checked',true);
    }
</script>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'property-form',
            'enableAjaxValidation' => false,
        ));

$header_value21 = '';
$header_value31 = '';
$header_value32 = '';
$header_value33 = '';
$header_value34 = '';
$header_value41 = '';
$header_value42 = '';
$header_value43 = '';
$header_value51 = '';
$header_value61 = '';
$header_value62 = '';
$header_value63 = '';
$header_value71 = '';
$header_value72 = '';
$header_value73 = '';
$special_value11 = '';
$special_value51 = '';
$special_value61 = '';
$special_value71 = '';
?>
<div>
    <h3>Manage Deal/Specials</h3>
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="successinfo">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <div>
        <h4>Header Description</h4>
        <p>
            Please select a header preference: <br><br>
            <?php /* Custom Title, body and deals */ ?>
            <?php
            if ($header_desc == 7) {
                $select = true;
                $header_value71 = $header_value[0];
                $header_value72 = $header_value[1];
                $header_value73 = $header_value[2];
            }
            else
                $select = false;
            
            echo CHtml::radioButton('header', $select, array('value' => '7', 'id' => 'header7', 'style' => 'float:left'));
            echo "<label for='header1'>";
            echo " &nbsp Title: ";
            echo CHtml::textfield('ah71', $header_value71, array('style' => 'width:160px','onfocus'=>'setFocus("header7")'));
            echo " &nbsp Body: ";
            echo CHtml::textArea('ah72', $header_value72, array('style' => 'width:170px','onfocus'=>'setFocus("header7")'));
            echo " &nbsp;Deals: ";
            echo CHtml::textfield('ah73', $header_value73, array('style' => 'width:140px','onfocus'=>'setFocus("header7")'));
            echo '</label>';
            ?>            
            <br>
            
            <?php
            if ($header_desc == 1)
                $select = true;
            else
                $select = false;

            echo CHtml::radioButton('header', $select, array('value' => '1', 'id' => 'header1', 'style' => 'float:left'));
            echo "<label for='header1'>&nbsp;Affordable Housing: If you qualify, the Federal Government may subsidized you rent</label>"
            ?><br><br>

            <?php
            if ($header_desc == 2) {
                $select = true;
                $header_value21 = $header_value[0];
            }
            else
                $select = false;

            echo CHtml::radioButton('header', $select, array('value' => '2', 'id' => 'header2', 'style' => 'float:left'));
            echo "&nbsp;Affordable Housing: If you qualify, you may pay $ ";

            echo CHtml::textfield('ah2', $header_value21, array('style' => 'width:50px','onfocus'=>'setFocus("header2")'));
            ?>

            <br><br>

            <?php
            if ($header_desc == 3) {
                $select = true;
                $header_value31 = $header_value[0];
                $header_value32 = $header_value[1];
                $header_value33 = $header_value[2];
                $header_value34 = $header_value[3];
            }
            else
                $select = false;

            echo CHtml::radioButton('header', $select, array('value' => '3', 'id' => 'header3', 'style' => 'float:left'));
            echo '&nbsp;Affordable Housing: ' . CHtml::dropDownList('ah31', $header_value31, Constants::$bed_array, array('style' => 'width:85px','onfocus'=>'setFocus("header3")'));
            echo " bedroom, ";
            echo '&nbsp;' . CHtml::dropDownList('ah34', $header_value34, Constants::$bath_array, array('style' => 'width:85px','onfocus'=>'setFocus("header3")'));
            echo " bath unit for ";
            echo CHtml::textfield('ah32', $header_value32, array('style' => 'width:50px','onfocus'=>'setFocus("header3")'));
            echo "&nbsp; If you qualify, you may pay $ ";
            echo CHtml::textfield('ah33', $header_value33, array('style' => 'width:50px','onfocus'=>'setFocus("header3")'));
            ?>

            <br><br>

            <?php
            if ($header_desc == 4) {
                $select = true;
                $header_value41 = $header_value[0];
                $header_value42 = $header_value[1];
                $header_value43 = $header_value[2];
            }
            else
                $select = false;

            echo CHtml::radioButton('header', $select, array('value' => '4', 'id' => 'header4', 'style' => 'float:left'));
            echo '&nbsp;Rental Deal: ' . CHtml::dropDownList('ah41', $header_value41, Constants::$bed_array, array('style' => 'width:85px','onfocus'=>'setFocus("header4")'));
            echo " bedroom unit for ";
            echo " $" . CHtml::textfield('ah42', $header_value42, array('style' => 'width:50px','onfocus'=>'setFocus("header4")'));
            echo ", If you qualify, you may pay $ ";
            echo CHtml::textfield('ah43', $header_value43, array('style' => 'width:50px','onfocus'=>'setFocus("header4")'));
            ?>

            <br><br>

            <?php
            if ($header_desc == 6) {
                $select = true;
                $header_value6 = $header_value[0];
                /* $header_value42 = $header_value[1];
                  $header_value43 = $header_value[2];
                  $header_value44 = $header_value[3]; */
            }
            else
                $select = false;

            echo CHtml::radioButton('header', $select, array('value' => '6', 'id' => 'header6', 'style' => 'float:left'));
            echo '&nbsp;Rental Deal: ';
            /*  echo " bedroom, ";
              echo CHtml::dropDownList('ah44', $header_value44, Constants::$bath_array, array('style' => 'width:85px'));
              echo " bath unit for ";
              echo CHtml::textfield('ah41', $header_value41, array('style' => 'width:50px')); */
            echo "  If you qualify, you may pay $ ";
            echo CHtml::textfield('ah6', $header_value6, array('style' => 'width:50px','onfocus'=>'setFocus("header6")'));
            ?>

            <br><br>

            <?php
            if ($header_desc == 5) {
                $select = true;
                $header_value51 = $header_value[0];
            }
            else
                $select = false;

            echo CHtml::radioButton('header', $select, array('value' => '5', 'id' => 'header5', 'style' => 'float:left'));
            echo '&nbsp;Rental Deal: Find out the current Specials at ' . CHtml::textfield('ah51', $header_value51, array('style' => 'width:100px','onfocus'=>'setFocus("header5")'));
            ?>

            <br><br>
        </p>

        </br>
    </div>

    <div>
        <h4>Add Specials</h4>
        <p>
            Please select a current specials preference: <br><br>
            <?php
            if ($specials == 1) {
                $select = true;
                $special_value11 = $specials_value[0];
            }
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '1', 'id' => 'specials1', 'style' => 'float:left'));
            echo "&nbsp;$ ";
            echo CHtml::textfield('sp1', $special_value11, array('style' => 'width:50px','onfocus'=>'setFocus("specials1")'));
            echo " Moves you in."
            ?><br><br>

            <?php
            if ($specials == 2)
                $select = true;
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '2', 'id' => 'specials2', 'style' => 'float:left'));
            echo "<label for='specials2'>&nbsp;Application Fee Waived</label>";
            ?><br><br>


            <?php
            if ($specials == 3)
                $select = true;
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '3', 'id' => 'specials3', 'style' => 'float:left'));
            echo "<label for='specials3'>&nbsp;No Security Deposit</label>";
            ?><br><br>

            <?php
            if ($specials == 4)
                $select = true;
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '4', 'id' => 'specials4', 'style' => 'float:left'));
            echo "<label for='specials4'>&nbsp;First month Free</label>";
            ?><br><br>

            <?php
            if ($specials == 5) {
                $select = true;
                $special_value51 = $specials_value[0];
            }
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '5', 'id' => 'specials5', 'style' => 'float:left'));
            echo "&nbsp; $ " . CHtml::textfield('sp5', $special_value51, array('style' => 'width:50px','onfocus'=>'setFocus("specials5")'));
            echo " off your 1st month's rent";
            ?><br><br>

            <?php
            if ($specials == 6) {
                $select = true;
                $special_value61 = $specials_value[0];
            }
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '6', 'id' => 'specials6', 'style' => 'float:left'));
            echo "&nbsp;" . CHtml::textfield('sp6', $special_value61, array('style' => 'width:50px','onfocus'=>'setFocus("specials6")'));
            echo " weeks free rent";
            ?><br><br>

            <?php
            if ($specials == 7) {
                $select = true;
                $special_value71 = $specials_value[0];
            }
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '7', 'id' => 'specials7', 'style' => 'float:left'));
            echo "&nbsp;" . CHtml::textfield('sp7', $special_value71, array('style' => 'width:150px','onfocus'=>'setFocus("specials7")'));
            ?><br><br>

            <?php
            if ($specials == 8)
                $select = true;
            else
                $select = false;

            echo CHtml::radioButton('specials', $select, array('value' => '8', 'id' => 'specials8', 'style' => 'float:left'));
            echo "<label for='specials8'> No Current Specials</label>";
            ?><br><br>


        </p>

        </br>
    </div>

    <div>
        <h4>Add Time Frame to Specials</h4>
        <div>

            <?php echo $form->datepickerRow($model, 'time_frame_from', array('value' => $time_frame_from, 'options' => array('format' => 'mm-dd-yyyy'))) ?><br>
        </div>    
        <div>
            <?php echo $form->datepickerRow($model, 'time_frame_to', array('value' => $time_frame_to, 'options' => array('format' => 'mm-dd-yyyy'))) ?><br>
        </div>
        <div>
            <div style="float:left">
                Floor Plan :
            </div>
            <div style="float:left;margin-left:20px;">
                <ul style="list-style: none;width:510px" class="floorplanspecial">
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => 'all')) ?>&nbsp;All Floor Plans&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '3ba1bh')) ?>&nbsp;3 Bed 1 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '4ba2.5bh')) ?>&nbsp;4 Bed 2.5 Bath</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '1ba1bh')) ?>&nbsp;1 Bed 1 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '3ba1.5bh')) ?>&nbsp;3 Bed 1.5 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '4ba3bh')) ?>&nbsp;4 Bed 3 Bath</li>

                    <li> <?php echo CHtml::checkBox('floorplan[]', false, array('value' => '2ba1bh')) ?>&nbsp;2 Bed 1 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '3ba2bh')) ?>&nbsp;3 Bed 2 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '4ba3.5bh')) ?>&nbsp;4 Bed 3.5 Bath</li>

                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '2ba1.5bh')) ?>&nbsp;2 Bed 1.5 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '3ba2.5bh')) ?>&nbsp;3 Bed 2.5 Bath&nbsp;&nbsp;</li>

                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '2ba2bh')) ?>&nbsp;2 Bed 2 Bath&nbsp;&nbsp;</li>
                    <li><?php echo CHtml::checkBox('floorplan[]', false, array('value' => '4ba2bh')) ?>&nbsp;4 Bed 2 Bath&nbsp;&nbsp;</li>
                </ul>
            </div>

        </div>
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

        </br>
    </div>

</div>
<?php $this->endWidget(); ?>



