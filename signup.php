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

    if (($_POST['fname']=='')||($_POST['lname']=='')) {
        header('location:signup.html');


    }

    $fname       = mysqli_real_escape_string($mysqli,$_POST['fname']);
    $mname       = mysqli_real_escape_string($mysqli,$_POST['mname']);
    $lname       = mysqli_real_escape_string($mysqli,$_POST['lname']);
    $address=$_POST['addr'];
    $mob=$_POST['mob'];
    $email      = mysqli_real_escape_string($mysqli,$_POST['email']);
    $pass  = mysqli_real_escape_string($mysqli,$_POST['pkey']);
    $ver_id= md5( rand(0,1000) );
$password=password_hash($pass,PASSWORD_BCRYPT);
//checking user is not already registered
    $query = "SELECT email FROM users where email='".$email."'";
$result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
$numResults=mysqli_num_rows($result);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
    {
        $message =  "Invalid email address please type a valid email!!";
    echo $message;
    }
    elseif($numResults>=1)
    {
    $message = " Email already exist!!";
    echo $message;
    }
    else{



global $u_id=mysqli_insert_id($mysqli);
    $query="INSERT into users_un(idusers, fname, mname, lname, email, mob, pass, rdate,ver_id,addr) VALUES('".$u_id."','".$fname."','".$mname."','".$lname."','".$email."','".$mob."','".$password."',now(),'".$ver_id."','".$address."')";
$result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));}
echo "<h1>user inserted in the database</h1> ";
mysqli_close($mysqli);
$_SESSION['email']=$email;
$_SESSION['uid']=$u_id;
$_SESSION['active']=$Results['active'];
$_SESSION['ver_id']=$ver_id;

            header('location:email.php');



?>
