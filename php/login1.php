<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");

require_once("dbconnect.php");

$username=mysqli_real_escape_string($con,trim($_POST['username']));
$password=mysqli_real_escape_string($con,trim($_POST['password']));
// $safe_password=mysqli_real_escape_string($con,md5($password));

$safe_password= md5($password);

$login_query="SELECT * from users where email= '".$username."' and password ='".$safe_password."'  ";

$result = mysqli_query($con, $login_query);

//    if (!filter_var($username, FILTER_VALIDATE_EMAIL))
//      { echo "Invalid email format";   }

if(!mysqli_query($con,$login_query))
{
    echo "Error!";
    echo mysqli_error($con);
    exit();
}
else
{

    session_start();
    $user =  $_SESSION['firstname'];
    $branch = $_SESSION['branch'];
    $brid = $_SESSION['brid'];

    echo "successful";

}
mysqli_close($con);

?>



