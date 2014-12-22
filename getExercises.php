<?php
    session_start();
    $host="localhost"; // Host name
    $username="kovid"; // Mysql username
    $password="kovid"; // Mysql password
    $db_name="FitnFab"; // Database name
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
    $sqlPlan="SELECT DISTINCT Exercise_Name,Calories_burnt_per_min,Exercise_Id from Exercise";
    $resultPlan=mysql_query($sqlPlan);
    $exercises = array();
    while($row = mysql_fetch_array($resultPlan)){
        array_push($exercises, $row["Exercise_Name"],$row["Calories_burnt_per_min"],$row["Exercise_Id"]);
    }
    echo json_encode($exercises);
    //mysql_free_result($result);
    ?>
