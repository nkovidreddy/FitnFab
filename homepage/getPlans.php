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
    $sqlPlan="SELECT DISTINCT Plan_name,Diet_Plan.Plan_Id from Account JOIN Diet_Plan on Diet_Plan.Plan_Id= Account.Plan_Id and Account.Account_Id='$username'";
    $resultPlan=mysql_query($sqlPlan);
    $plans = array();
    while($row = mysql_fetch_array($resultPlan)){
        array_push($plans, $row["Plan_name"],$row["Plan_Id"]);
    }
    echo json_encode($plans);
    //mysql_free_result($result);
    ?>
