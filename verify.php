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
echo $_GET['u_id'];
echo $_GET['ver_id'];
if(isset($_GET['u_id'])  AND isset($_GET['ver_id']) && !empty($_GET['ver_id'])){
    // Verify data
    echo 'hello  ';
    $uid = $_GET['u_id']; // Set email variable
    $ver_id = $_GET['ver_id']; // Set hash variable
    echo '$uid';
    echo '$ver_id';

    $query=" select * from users_un where idusers='".$uid."' and ver_id='".$ver_id."'";
    $strSQL = mysqli_query($mysqli,$query);


    $Results = mysqli_fetch_assoc($strSQL);
    if(mysqli_num_rows($strSQL)>0)
    {
        echo '<br>hello there';
        $message = $Results['email']." verified Sucessfully!!";
        echo $message;
        $fname       = mysqli_real_escape_string($mysqli,$Results['fname']);
        $mname       = mysqli_real_escape_string($mysqli,$Results['mname']);
        $lname       = mysqli_real_escape_string($mysqli,$Results['lname']);
        $address=$Results['addr'];
        $mob=$Results['mob'];
        $email      = mysqli_real_escape_string($mysqli,$Results['email']);
        $pass  = $Results['pass'];
    $u_id=mysqli_insert_id($mysqli);
    echo $mob;
    $query="INSERT into users(idusers, fname, mname, lname, email, mob, pass, rdate,addr) VALUES('".$u_id."','".$fname."','".$mname."','".$lname."','".$email."','".$mob."','".$pass."',now(),'".$address."')";
    $Results=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
        $_SESSION['logged']=1;
        $_SESSION['username']=$Results['fname'];
        $_SESSION['uid']=$Results['idusers'];
        header('location:index.php');
    }

    else
    {
        $message = "verification is failed, Please try again";

        echo $message;


    }}

?>