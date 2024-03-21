<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div style="font-family: arial">
    <h4>Lead Detail for Email Lead ID <?php echo $model->id_email_lead ?></h4>

    <p style="margin:20px">
    <ul>
        <li><strong>Property ID :</strong> <?php echo $model->id_property ?></li>

        <li><strong>Name :</strong> <?php echo $model->name ?></li>

        <li><strong>Email : </strong><?php echo $model->email ?></li>

        <li><strong>Reply To :</strong> <?php echo $model->reply_to ?></li>


            <li><strong>Phone : </strong><?php echo $model->phone ?></li>

            <li><strong>Property Address :</strong> <?php echo $model->property_address ?></li>


            <li><strong>Property City :</strong> <?php echo $model->property_city ?></li>

            <li><strong>Property State :</strong> <?php echo $model->property_state ?></li>

            <li><strong>Property Zip :</strong> <?php echo $model->property_zip ?></li>


            <li><strong>Lead Source :</strong> <?php echo $model->lead_source ?></li>

            <li><strong>Affiliate Source :</strong> <?php echo $model->affiliate_source ?></li>

            <?php if ($model->created_at != '' && $model->created_at != '0000-00-00'): ?>
                <li><strong>Created At :</strong> <?php echo date('m-d-Y', strtotime($model->created_at)) ?></li>
            <?php endif; ?>

            <li><strong>Message :</strong> <?php echo $model->message ?></li>
            
            <li><strong>Status :</strong> <?php echo $model->status ?></li>


    </ul>
</p>
</div>
