<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Sr','Name', 'Email Address'));


// loop over the rows, outputting them
$row=array();
$count=0;
foreach($dataProvider->getData() as $leadData)
{    
    $count++;
    fputcsv($output,array($count, $leadData->first_name.' '.$leadData->last_name, $leadData->email_address ));  
}    
    
//fputcsv($output, $row);
?>
