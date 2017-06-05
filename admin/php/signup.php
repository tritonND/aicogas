<?php

require_once("dbconnect.php");
//require './myfunctions.php';
             
                $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
                $email=mysqli_real_escape_string($con,trim($_POST['email']));
                
                $phone=mysqli_real_escape_string($con,trim($_POST['phone']));
                $accname=mysqli_real_escape_string($con,trim($_POST['accname']));
                $accnum=mysqli_real_escape_string($con,trim($_POST['accnum']));
                $bank=mysqli_real_escape_string($con,trim($_POST['bank']));
                
                $password=mysqli_real_escape_string($con,trim($_POST['password']));                
                $referalid=mysqli_real_escape_string($con,trim($_POST['referalid']));		
		$safe_password=mysqli_real_escape_string($con,md5($password));
                $code=mysqli_real_escape_string($con,md5($email));
		
               
                $result=mysqli_query($con,"select * from users where EMAIL='$email'");//checks if account already exist
                $result2=mysqli_query($con,"select * from users where EMAIL='$referalid'");//checks if account already exist
		$new_user_query="INSERT INTO users(EMAIL,FIRSTNAME,PASSWORD,CODE,REFERREE, PHONE, ACCOUNTNAME, ACCOUNTNUMBER, BANKNAME) VALUES('$email','$firstname', '$safe_password','$code','$referalid', '$phone', '$accname', '$accnum', '$bank')";
		
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                echo "Invalid email format";
                }
                else if(mysqli_num_rows($result)>0)
                {
                echo "mail in use";
                }
                
             
                else if(!mysqli_query($con,$new_user_query))
                {
                   //echo "Error!";
                    echo mysqli_error($con);
                   exit();
                }
                else
                {
                    
                    session_start();
                    
                    
                 $_SESSION['helpersusername']=$email;
                 $_SESSION['helpersfirstname']=$firstname;
                    
                   
                    

$messagebody="<h2>Email Confirmation</h2>
<p style=\"color:black;line-height: 1.8;font-size: 1.2em;text-align: justify;\">Welcome to Helpers Forum!<br>We can assure you that you will continue to smile as long as you abide by our rules....<br><br>
<span style=\"font-weight:bold;font-size:1.2em;\">Welcome on board</span>
";

 // sendMail($email, "Welcome to Helpers Forum", $messagebody);                    
          echo "successful";           
       
                }                      
       ?>
		
