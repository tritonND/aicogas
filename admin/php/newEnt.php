<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");


require_once("dbconnect.php");
session_start();

$addr1 = strip_tags(mysqli_real_escape_string($con, trim($_POST['addr'])));
$cnum1 =  strip_tags(mysqli_real_escape_string($con, trim($_POST['cnum'])));
$name1 = strip_tags(mysqli_real_escape_string($con, trim($_POST['name'])));
$phone1 = strip_tags(mysqli_real_escape_string($con, trim($_POST['phone'])));


//$qrys = "SELECT count(*) FROM ".$_SESSION['brid'];
//$result1 = mysqli_query($con, $qrys) or die("could not generate id");

//$row = mysqli_fetch_array( $result1);
//$nxtid = $row[0]+1;



$qry = "INSERT INTO ".$_SESSION['brid']." (cnum, name, phone, addr, REGDATE ) VALUES ('$cnum1', '$name1', '$phone1', '$addr1', curdate()) ";

$result=mysqli_query($con, $qry) or die("Script not executale");

$rowcount=mysqli_affected_rows($con);
if($rowcount>0)
{
    echo "successful";
}
