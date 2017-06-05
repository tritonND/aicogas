<?php
require_once("dbconnect.php");
//session_start(); 
//get parameters sent

//  $opt=mysqli_real_escape_string($con,trim($_POST['category']));
//  $message=mysqli_real_escape_string($con,trim($_POST['message']));     
  
   if(true){
     
    $target_dir = "receipt/";
    $target_file = $target_dir . basename($_FILES["certphoto"]["name"]);
	//copy files to folder
	$pic_name=$_FILES["certphoto"]["name"];
	$pic_type=$_FILES["certphoto"]["type"];
	$pic_temp=$_FILES["certphoto"]["tmp_name"];
        
        if($pic_name=="")//dont upload since no new profile image is found
        {
         echo "no image";
        }
        else{
        
	 if (file_exists($target_file)) 
	{
    $randomnum=  uniqid().rand();
    move_uploaded_file($_FILES["certphoto"]["tmp_name"],$target_dir .$randomnum. $_FILES["certphoto"]["name"]);
	$prop_pic=mysqli_real_escape_string($con,$target_dir.$randomnum.$pic_name);
	}
	else 
	{
            $prop_pic=mysqli_real_escape_string($con,$target_dir.$pic_name);
      move_uploaded_file($_FILES["certphoto"]["tmp_name"],$target_dir.$_FILES["certphoto"]["name"]);
      
    }

    // sql to insert into support table

    $sql = "INSERT INTO `receipt` ( `SentBy`, `FilePath`,  `DateSent`) VALUES ( 'endy@goo.gl',  '".$prop_pic."', curdate())";
	
    
    $result=mysqli_query($con,$sql);
       $rowcount=mysqli_affected_rows($con);
       if($rowcount>0)
       {
           echo "successful";
       }
       else
       {
            echo "error";       
       }
       
        }
    

// $qry =  "insert into certificates (PROJECTID,CERTNUMBER,DATEISSUED,AMOUNT,STATUS,URL) values('$projectid','$certno','$dateissued','$amount','$status','$prop_pic')";

        mysqli_close($con);	

   }

   else echo "Error Occured";

?>

