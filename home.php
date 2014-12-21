<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
       // header("location:home.php");
    }
?>   

<html>
<head>
<title>FitnFab Login</title>
<link rel="stylesheet" href="normalize.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<p>Welcome <?php echo $_SESSION['login_user'];?></p>
<img src="fitnfablogo.jpg" alt="Fit N Fab" style="width:145px;height:123px">
<h1>Welcome to FitnFab</h1>

<p><a href="myplan.php" target="iframe_a">My Plan</a></p>
<a href="myaccphp.php" target="iframe_a">My Account</a></p>
<iframe width="100%" height="100%" src="" name="iframe_a"></iframe>

</body>
</html>
