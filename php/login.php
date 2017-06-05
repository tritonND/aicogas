<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");

require_once("dbconnect.php");
session_start();

$email=mysqli_real_escape_string($con,trim($_POST['username']));
$password=mysqli_real_escape_string($con,trim($_POST['password']));
$safe_password=md5($password);

$login_query="SELECT * from users where EMAIL='{$email}' and PASSWORD='{$safe_password}' ";


$result = mysqli_query($con, $login_query) or die("cannt process");

//echo "i am here";

if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_array($result);

    $user=$row['EMAIL'];
    $branch = $row['BRANCH'];
    $firstname=$row['FIRSTNAME'];
    $brid = $row['BRID'];


    $_SESSION['user']=$user;
    $_SESSION['branch']=$branch;
    $_SESSION['firstname']=$firstname;
    $_SESSION['brid']=  $brid;

    echo "successful";

}

else
{
    echo "Invalid username or password";
}


mysqli_close($con);

?>