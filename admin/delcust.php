<?php

session_start();
header('Content-type: application/json; charset=UTF-8');

require_once 'dbconfig.php';

require_once 'php/dbconnect.php';
//$jd = file_get_contents('php://input');
//$mval = json_decode($jd, true);

$id = strip_tags($_POST['cnum']);


//$query = "UPDATE users set ACTIVE = 0 WHERE EMAIL ='".$id."' ";
$query = "DELETE FROM ".$_SESSION['brid']. " WHERE cnum ='".$id."' ";


$result = mysqli_query($con, $query);
if(mysqli_query($con, $query)){
    echo "successful";


}
else{
    echo "error";
}

exit;
?>