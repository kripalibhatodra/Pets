<?php
session_start();
global $mysqli;
$mysqli = mysqli_connect("localhost", "root", "", "pets");
//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed %s\n", mysqli_connect_error());
    exit();}
else {
    printf("host information: %s\n", mysqli_get_host_info($mysqli));
}

if (($_POST['email'])=='') {
    header('location:login.html');


}

$email      = mysqli_real_escape_string($mysqli,$_POST['email']);
$password   = mysqli_real_escape_string($mysqli,$_POST['pkey']);
$password=password_hash($password,PASSWORD_BCRYPT);

$strSQL = mysqli_query($mysqli,"select * from users where email='".$email."' and pass='".$password."'");

$Results = mysqli_fetch_array($strSQL);
if(count($Results)>=1)
{
    $message = $Results['email']." Login Sucessfully!!";
    echo $message;

    $_SESSION['logged']=1;
    $_SESSION['username']=$Results['fname'];
    $_SESSION['uid']=$Results['idusers'];

}
else
{
    $message = "Invalid email or password!!";
}
header('refresh:2;url=index.php');
mysqli_close($mysqli);


?>
