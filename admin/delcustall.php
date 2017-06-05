<?php

session_start();
header('Content-type: application/json; charset=UTF-8');

require_once 'dbconfig.php';

require_once '../php/dbconnect.php';
$jd = file_get_contents('php://input');
$mval = json_decode($jd, true);

$id = ($_POST['cnum']);
//echo $id;

//$query = "UPDATE users set ACTIVE = 0 WHERE EMAIL ='".$id."' ";
//$query = "DELETE FROM ".$_SESSION['brid']. " WHERE cnum ='".$id."' ";

$tables = array("ug","ar","ad");
foreach($tables as $table) {
    $query = "DELETE FROM ".$table." WHERE cnum ='".$id."' ";
    if(mysqli_query($con, $query)){

    }
    else{    echo "error"; }
    //mysqli_query($con,$query);
}

echo "successful";



//$result = mysqli_query($con, $query);
//if(mysqli_query($con, $query)){  echo "successful";  }
//else{    echo "error"; }

exit;
