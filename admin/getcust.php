<?php
session_start();
header('Content-type: application/json; charset=UTF-8');

require_once 'dbconfig.php';

if (isset($_POST['cnum']) && !empty($_POST['cnum'])) {

    $id = ($_POST['cnum']);
    $query = "SELECT * FROM ".$_SESSION['brid']." WHERE cnum=:cnum";
    //echo $query;
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':cnum'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($row);
    exit;
}