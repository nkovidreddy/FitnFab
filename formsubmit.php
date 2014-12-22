<?php
    session_start();
    $host="localhost"; // Host name
    $username="kovid"; // Mysql username
    $password="kovid"; // Mysql password
    $db_name="FitnFab"; // Database name
    $planoptions = $_GET['planoption'];
    $exerciseId = $_GET['choseExer'];
    $timeExercise = $_GET['choseTime'];
    //$planbreakfast = $_POST['planoptionBF'];
    //$plansBF = array();
      //  array_push($plansBF, $_POST['planoptionBF']);
    //echo $plansBF;
    foreach ($_GET['planoptionBF'] as $selectedOption){
        echo $selectedOption;
        echo ",";
    }
    echo "</br>";
    foreach ($_GET['planoptionLu'] as $selectedOption1){
        echo $selectedOption1;
        echo ",";
    }
    echo "</br>";
    foreach ($_GET['planoptionSn'] as $selectedOption2){
        echo $selectedOption2;
        echo ",";
    }
        echo "</br>";
    foreach ($_GET['planoptionDi'] as $selectedOption3){
        echo $selectedOption3;
        echo ",";
    }
    
    $exerOptions = $_GET['planoption'];
    
    $serializedoptions = serialize($planoptions);
    //$tbl_name="Account"; // Table name
    // Connect to server and select databse.
    mysql_connect("$host", "$username", "$password")or die("cannot connect");
    mysql_select_db("$db_name")or die("cannot select DB");
    // username and password sent from form
    //  $myusername=$_POST['myusername'];
    // $myusername== $_SESSION['myusername']
    // $mypassword=$_POST['mypassword'];
    
    // To protect MySQL injection (more detail about MySQL injection)
    // $myusername = stripslashes($myusername);
    // $mypassword = stripslashes($mypassword);
    // $myusername = mysql_real_escape_string($myusername);
    // $mypassword = mysql_real_escape_string($mypassword);
    $username=$_SESSION['login_user'];
    echo $planoptions;
    echo "</br>";
//echo $planbreakfast;
    $sql="INSERT INTO LOGIN (Username,Password) VALUES('$planoptions','$planoptions')";
    mysql_query($sql) or die(mysql_error());
    echo 'The following options were saved to database:<br/><br/>';
    
    //mysql_free_result($result);
    ?>
