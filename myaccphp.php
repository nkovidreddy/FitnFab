<?php
    session_start();
    
    $host="localhost"; // Host name
    $username="kovid"; // Mysql username
    $password="kovid"; // Mysql password
    $db_name="FitnFab"; // Database name
    $tbl_name="Account"; // Table name
    
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
    $sql="SELECT * FROM $tbl_name where Account_Id='$username'";
    $result=mysql_query($sql);
    // Mysql_num_row is counting table row
    $count=mysql_num_rows($result);
    
    $fields_num = mysql_num_fields($result);
    
    echo "<h1>My {$tbl_name}</h1>";
    echo "<table border='1'><tr>";
    // printing table headers
    for($i=0; $i<$fields_num; $i++)
    {
        $field = mysql_fetch_field($result);
        echo "<td>{$field->name}</td>";
    }
    echo "</tr>\n";
    // printing table rows
    while($row = mysql_fetch_row($result))
    {
        echo "<tr>";
        
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
        echo "<td>$cell</td>";
        
        echo "</tr>\n";
    }
    mysql_free_result($result);
    ?>
