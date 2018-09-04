<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION);
echo "<h1>you are logged out successfully.you will be redirected to home page in a sec.</h1>";
header( "refresh:1; url=index.php" );


?>