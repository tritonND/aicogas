<?php
include "dbconnect.php";
session_start();

$days = date("M-Y-d");
$filename =  $days."_AirportRoadPhoneNumbers.csv";
$fp = fopen('php://output', 'w');

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $header);

//$query = "SELECT cnum, name, phone, addr, REGDATE FROM ".$_SESSION['brid'];
$query = "SELECT phone FROM ar";

$result = mysqli_query($con, $query);
while($row = mysqli_fetch_row($result)) {
    fputcsv($fp, $row);
    //fputcsv($fp, array( , ));

}
exit;
?>