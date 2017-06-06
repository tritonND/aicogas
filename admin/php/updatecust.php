<?php
/**
 * Created by PhpStorm.
 * User: tritonND
 * Date: 6/6/2017
 * Time: 3:10 AM
 */

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");


require_once("dbconnect.php");
session_start();

$addr1 = strip_tags(mysqli_real_escape_string($con, trim($_POST['addr1'])));
$cnum1 =  strip_tags(mysqli_real_escape_string($con, trim($_POST['cnum1'])));
$name1 = strip_tags(mysqli_real_escape_string($con, trim($_POST['name1'])));
$phone1 = strip_tags(mysqli_real_escape_string($con, trim($_POST['phone1'])));




$qry = "UPDATE ".$_SESSION['brid']." (cnum, name, phone, addr, REGDATE ) VALUES ('$cnum1', '$name1', '$phone1', '$addr1', curdate()) ";

$result=mysqli_query($con, $qry) or die("Script not executale");

$rowcount=mysqli_affected_rows($con);
if($rowcount>0)
{
    echo "successful";
}
