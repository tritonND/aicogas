<?php
include "dbconnect.php";
session_start();

$days = date("M-Y-d");
$filename =  $days."_UgbowoPhoneNumbers.csv";
$fp = fopen('php://output', 'w');

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

$query = "SELECT phone FROM ug";

$result = mysqli_query($con, $query);
while($row = mysqli_fetch_row($result))
    {
          fputcsv($fp, $row);
    }
exit;
?>