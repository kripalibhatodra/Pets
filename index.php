<?php session_start();
?>
<!--[if t IE 7]>      <html lang="en" ng-app="myApp" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="myApp" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="myApp" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="myApp" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My AngularJS App</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/html5-boilerplate/dist/css/normalize.css">
  <link rel="stylesheet" href="bower_components/html5-boilerplate/dist/css/main.css">
  <link rel="stylesheet" href="app.css">
  <script src="bower_components/html5-boilerplate/dist/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<link href='https://fonts.googleapis.com/css?family=Antic' rel='stylesheet'>
<style>
  body {
    font-family: 'Antic';
      font-size: 28px;
  }
</style>
<body>
  <ul >
    <li><a href="#!/home">Home</a></li>
    <li><a href="#!/buy">Buy</a></li>
    <li><a href="#!/donate">Donate</a></li>
    <li><a href="#!/sell">Sell</a></li>
    <li> <a href="#!/mypets" onclick="changecard()">My Pets</a></li>
    <?php if(!isset($_SESSION['logged'])){
        echo "
    <li style='float: right '><a href='#!/login' style='color:black'>Login</a></li>
    <li style='float: right'><a href='#!/signup' style='color:black'>Sign up</a></li>
    ";}
    else{
      echo"<SPAN STYLE='position:absolute; right: 10%;  padding:14px 16px 16px 5px ;
'>Welcome User :".$_SESSION['username']."</SPAN><li style='float: right'><a href='logout.php' style='color:black'>Logout</a></li>
";}
  ?>
  </ul>


  <link rel="stylesheet" href="app.css">
  <div ng-view class="card" >  <link rel="stylesheet" href="app.css">
  </div>




  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
  <script src="bower_components/angular/angular.js"></script>
  <script src="bower_components/angular-route/angular-route.js"></script>
  <script src="app.js"></script>
  <script src="login/login.js"></script>
  <script src="signup/signup.js"></script>
  <script src="sell/sell.js"></script>
  <script src="mypets/mypets.js"></script>

  <script src="components/version/version.js"></script>
  <script src="components/version/version-directive.js"></script>
  <script src="components/version/interpolate-filter.js"></script>
</body>
</html>
