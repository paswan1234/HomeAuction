<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Email Lead Id','Date','Name', 'Email Address'));


// loop over the rows, outputting them
$row=array();
$count=0;
foreach($emailLeadData as $lead)
{    
    $count++;
    fputcsv($output,array( $lead->id_email_lead, $lead->created_at ,$lead->name, $lead->email ));  
}    
    
//fputcsv($output, $row);
?>
