<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div style="font-family: arial">
    <h4>Lead Detail for Property ID <?php echo $model->id_property ?></h4>

    <p style="margin:20px">
    <ul>
        <li><strong>First Name :</strong> <?php echo $model->first_name ?></li>

        <li><strong>Last Name :</strong> <?php echo $model->last_name ?></li>

        <?php if ($model->lead_type == 'preweblead'): ?>

            <li><strong>Address : </strong><?php echo $model->address ?></li>

            <li><strong>City :</strong> <?php echo $model->city ?></li>

            <li><strong>State :</strong> <?php echo $model->state ?></li>

            <li><strong>Zip :</strong> <?php echo $model->zip ?></li>

        <?php endif; ?>

        <li><strong>Email Address : </strong><?php echo $model->email_address ?></li>

        <li><strong>Phone :</strong> <?php echo $model->phone ?></li>

        <?php if ($model->move_date != '' && $model->move_date != '0000-00-00'): ?>
            <li><strong>Move-in Date :</strong> <?php echo date('m-d-Y', strtotime($model->move_date)) ?></li>
        <?php endif; ?>

        <?php if ($model->lead_type == 'preweblead'): ?>

            <li><strong>Occupants :</strong> <?php echo $model->occupants ?></li>

            <li><strong>Yearly Income :</strong> <?php echo $model->yearly_income ?></li>
        <?php endif; ?>

        <?php if ($model->lead_type != 'preweblead'): ?>
            <li><strong>Message :</strong> <?php echo $model->message ?></li>
        <?php endif; ?>

    </ul>
</p>
</div>
