<?php
// output headers so that the file is downloaded rather than displayed


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

include "dbconnect.php";
session_start();

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id', 'cnum', 'name','phone','addr','id','REGDATE'));
$query = "SELECT * FROM ".$_SESSION['brid'];

$rows = mysqli_query($con, $query);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows))
{
    fputcsv($output, $row);
}