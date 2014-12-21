<?php
    session_start();
    $host="localhost"; // Host name
    $username="kovid"; // Mysql username
    $password="kovid"; // Mysql password
    $db_name="FitnFab"; // Database name
    $expertId = $_POST['expertIdVal'];
    // Connect to server and select databse.
    mysql_connect("$host", "$username", "$password")or die("cannot connect");
    mysql_select_db("$db_name")or die("cannot select DB");
    $username=$_SESSION['login_user'];
    
    $assignExpertSql="UPDATE Account SET Expert_Id='$expertId' where Account_Id='$username'";
     mysql_query($assignExpertSql) or die(mysql_error());
    
    echo "Your chosen Fitness expert is assigned to you and our fitness expert will contact to you as soon as poosible";
    //mysql_free_result($result);
    ?>
