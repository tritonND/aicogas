<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");


require_once("dbconnect.php");
session_start();

$addr = mysqli_real_escape_string($con, $_POST['addr']);
$cnum=  mysqli_real_escape_string($con,$_POST['cnum']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);


$qry = "INSERT INTO ad (cnum, name, phone, addr ) VALUES ('$cnum', '$name', '$phone', '$addr') ";

$result=mysqli_query($con, $qry) or die("Script not executale");

$rowcount=mysqli_affected_rows($con);
if($rowcount>0)
{
echo "successful";
}
