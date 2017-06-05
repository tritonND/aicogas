<?php

  session_start();
	header('Content-type: application/json; charset=UTF-8');
		 
	require_once 'dbconfig.php';

   require_once '../php/dbconnect.php';
	$jd = file_get_contents('php://input');
    $mval = json_decode($jd, true);
   
	// if (isset($_POST['ID']) && !empty($_POST['ID'])) {
			// echo $_POST['ID'];

		$id = ($_POST['EMAIL']); 
        echo $id;

        $query = "UPDATE users set ACTIVE = 0 WHERE EMAIL ='".$id."' ";

        $result = mysqli_query($con, $query);
        if(mysqli_query($con, $query)){
            echo "successful";
           

        }
        else{
            echo "error";
        }
  
	//	$query1 = "SELECT * FROM support WHERE ID=:id";
	//	$stmt = $DBcon->prepare( $query );
	//	$stmt->execute(array(':id'=>$id));
	//	$row=$stmt->fetch(PDO::FETCH_ASSOC);						
		
	//	echo json_encode($row);
     //   echo 'here';
		exit;
	//}		