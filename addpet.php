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

$type= mysqli_real_escape_string($mysqli,$_POST['type']);
$breed= mysqli_real_escape_string($mysqli,$_POST['breed']);
$age= mysqli_real_escape_string($mysqli,$_POST['age']);
$price=$_POST['price'];
$gender=$_POST['gender'];
$description = mysqli_real_escape_string($mysqli,$_POST['description']);
$name= mysqli_real_escape_string($mysqli,$_POST['name']);
/*$target_dir = "c:/wamp64/tmp";
$target_file = $target_dir . basename($_FILES[" propic "]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["propic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if (move_uploaded_file($_FILES["propic"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["propic"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
*/
$idpet=mysqli_insert_id($mysqli);
$idusers=$_SESSION['uid'];
    $query="INSERT into pet(idpet, type, breed, age, price, idusers/*, img*/, gender, description, name,adate) VALUES('".$idpet."','".$type."','".$breed."','".$age."','".$price."','".$idusers."','".$gender."','".$description."','".$name."',now())";
    $result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
$strSQL = mysqli_query($mysqli,"select petnum from users where   idusers='".$idusers."'");

$Results = mysqli_fetch_array($strSQL);
$petnum=$Results['petnum'];
$petnum++;
$query="UPDATE users SET petnum='".$petnum."' where idusers='".$idusers."'";
mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
echo "<h1>user inserted in the database</h1> ";
mysqli_close($mysqli);
header('location:index.php');



?>
