<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div style="font-family: arial">
    <h4>Lead Detail for Ha ID <?php echo $model->ha_id ?></h4>

    <p style="margin:20px">
    <ul>
        <li><strong>First Name :</strong> <?php echo $model->fname ?></li>

        <li><strong>Last Name :</strong> <?php echo $model->lname ?></li>

        <li><strong>Email Address : </strong><?php echo $model->email ?></li>

        <li><strong>Home Phone :</strong> <?php echo $model->home_phone ?></li>

        <?php if ($model->lead_type == 'preweblead'): ?>

            <li><strong>Prefix : </strong><?php echo $model->prefix ?></li>

            <li><strong>Suffix :</strong> <?php echo $model->sufix ?></li>

            <li><strong>Address :</strong> <?php echo $model->address ?></li>

            <li><strong>City :</strong> <?php echo $model->city ?></li>

            <li><strong>State :</strong> <?php echo $model->state ?></li>

            <li><strong>Zip :</strong> <?php echo $model->zip ?></li>

            <?php if ($model->move_date != '' && $model->move_date != '0000-00-00'): ?>
                <li><strong>Move-in Date :</strong> <?php echo date('m-d-Y', strtotime($model->move_date)) ?></li>
            <?php endif; ?>

            <li><strong>Adult Over 18 :</strong> <?php echo $model->number_over_18 ?></li>

            <li><strong>Minors Under 18 :</strong> <?php echo $model->number_under_18 ?></li>

            <li><strong>Total Numbers of Occupants :</strong> <?php echo $model->number_occupent ?></li>

            <li><strong>Business Phone :</strong> <?php echo $model->bussiness_phone ?></li>

            <li><strong>Cell Phone :</strong> <?php echo $model->cell_phone ?></li>

            <li><strong>Gross Annual Household Income :</strong> <?php echo $model->gross_annual_household_income ?></li>

            <li><strong>Estimated Total Annual Income  :</strong> <?php echo $model->estimated_total_income ?></li>

            <li><strong>Head Type :</strong> <?php echo $model->head_type ?></li>

            <li><strong>Interested In :</strong> <?php echo $model->interested_in ?></li>

        <?php endif; ?>

    </ul>
</p>
</div>
