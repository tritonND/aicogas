<?php

require_once("dbconnect.php");
//$result1 = mysqli_query($con,"SELECT * FROM schooldetails where EMAIL='$email' ") or die("Error in Selecting " . mysqli_error($con));
session_start();


if (isset($_POST['cnum']) && !empty($_POST['cnum'])) {
    $id = strip_tags($_POST['cnum']);
//$query = "UPDATE users set ACTIVE = 0 WHERE EMAIL ='".$id."' ";
//$query = "DELETE FROM ".$_SESSION['brid']. " WHERE cnum ='".$id."' ";

if ($_SESSION['user'] == "ADMIN") {
 $query = " SELECT * FROM ad WHERE  cnum ='" . $id . "' UNION ALL SELECT * FROM ar WHERE  cnum ='" . $id . "' 
UNION ALL SELECT * FROM ug WHERE  cnum ='" . $id . "' ";
    }

    else {
        $query = "SELECT * FROM " . $_SESSION['brid'] . " WHERE  cnum ='" . $id . "' ";
    }

//create an array
    $result1 = mysqli_query($con, $query);
    $resarray1 = array();

    while ($row = mysqli_fetch_assoc($result1)) {
        $resarray1 = $row;
    }

    echo json_encode($resarray1);

//$myarray = array("scdet"=>$resarray1,  "clubs"=>$resarray5);
//echo json_encode($myarray);


    mysqli_close($con);

}



