<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");


require_once("dbconnect.php");
session_start();
$br = $_SESSION['brid'];
//$_SESSION['branch'];


$qry = "SELECT max(ID) FROM ".$br;
//$qry = "SELECT count(*) FROM ".$br;
$result1 = mysqli_query($con, $qry) or die("could not generate id");

$row = mysqli_fetch_array( $result1);
$nxtid = $row[0]+1;
$paddedid = str_pad($nxtid, 3, '0', STR_PAD_LEFT);
$generatedid = $paddedid;
echo $br.$generatedid;


@mysqli_free_result($result);
mysqli_close($con);



?>