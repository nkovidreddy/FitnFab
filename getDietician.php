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
    $sqlExpert="SELECT DISTINCT Expert_Name,Expert_Id from Fitness_Expert where Expert_Type='Dietician'";
    $resultExp=mysql_query($sqlExpert);
    $expert = array();
    while($row = mysql_fetch_array($resultExp)){
        array_push($expert, $row["Expert_Name"],$row["Expert_Id"]);
    }
    echo json_encode($expert);
    //mysql_free_result($result);
    ?>
