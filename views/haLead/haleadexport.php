<?php
//    foreach($haLeadData as $lead)
//    {
//        echo $lead->fname." ".$lead->lname." ".$lead->email."<br>";
//    }    
?>

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
foreach($haLeadData as $lead)
{    
    $count++;
    fputcsv($output,array($count, $lead->fname.' '.$lead->lname, $lead->email ));  
}    
    
//fputcsv($output, $row);
?>
