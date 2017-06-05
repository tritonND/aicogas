<?php
session_start();
header('Content-type: application/json; charset=UTF-8');

require_once 'dbconfig.php';

if (isset($_POST['cnum']) && !empty($_POST['cnum'])) {

    $id = ($_POST['cnum']);
   // $query = "SELECT * FROM ".$_SESSION['brid']." WHERE cnum=:cnum";
    $query = "SELECT cnum, name, phone,addr, REGDATE FROM ad WHERE cnum=:cnum
UNION ALL
SELECT cnum, name, phone,addr, REGDATE FROM ar WHERE cnum=:cnum
UNION ALL
SELECT cnum, name, phone,addr, REGDATE FROM ug WHERE cnum =:cnum";
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':cnum'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($row);
    exit;
}