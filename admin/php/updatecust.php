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


if($_SESSION['user'] == "ADMIN")
{
    $tables = array("ug","ar","ad");
    foreach($tables as $table)
    {
        //$query = "DELETE FROM ".$table." WHERE cnum ='".$id."' ";
        $qry = "UPDATE ".$table." SET name = '$name1', phone = '$phone1', addr = '$addr1' WHERE  cnum = '$cnum1' ";
        if(mysqli_query($con, $qry)){

        }
        else{    echo "error"; }

    }
    echo "successful";

// $qry = "UPDATE ar SET name = '$name1', phone = '$phone1', addr = '$addr1' WHERE  cnum = '$cnum1' UNION ALL
//UPDATE ad SET name = '$name1', phone = '$phone1', addr = '$addr1' WHERE  cnum = '$cnum1'  UNION ALL
//UPDATE ug SET name = '$name1', phone = '$phone1', addr = '$addr1' WHERE  cnum = '$cnum1' ";

}
else {
       $qry = "UPDATE " . $_SESSION['brid'] . " SET name = '$name1', phone = '$phone1', addr = '$addr1' WHERE  cnum = '$cnum1' ";
     }

$result=mysqli_query($con, $qry) or die("Script not executale");

$rowcount=mysqli_affected_rows($con);
if($rowcount>0)
{
    echo "successful";
}
