<?php
		
	header('Content-type: application/json; charset=UTF-8');
		 
	require_once 'dbconfig.php';
	
	if (isset($_POST['email']) && !empty($_POST['email'])) {
			
		$id = ($_POST['email']);
		$query = "SELECT * FROM users WHERE EMAIL=:email";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':email'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);						
		
		echo json_encode($row);
		exit;
	}		