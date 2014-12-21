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
    $sql="SELECT Displays.Type_Name,Food.Food_Name,Food.Calorie_Count from Account JOIN Diet_Plan on Diet_Plan.Plan_Id= Account.Plan_Id JOIN Displays on Displays.Plan_Id= Account.Plan_Id JOIN Food on Food.Food_Id=Displays.Food_Id where Account.Account_Id='$username'";
   
    $result=mysql_query($sql);
    // Mysql_num_row is counting table row
    $count=mysql_num_rows($result);
    
    $fields_num = mysql_num_fields($result);
    
    $sqlPlan="SELECT DISTINCT Plan_name from Account JOIN Diet_Plan on Diet_Plan.Plan_Id= Account.Plan_Id where Account.Account_Id='$username'";
    $resultPlan=mysql_query($sqlPlan);
    $fieldPlan = mysql_result($resultPlan,0);
    
    
    $exerPlan="SELECT Exercise.Exercise_Name,Exercise_done.Time_Spent from Exercise JOIN Exercise_done on Exercise.Exercise_Id= Exercise_done.Exercise_Id JOIN Account on Exercise_done.Account_Id=Account.Account_Id where Account.Account_Id='$username'";
    $resultExer=mysql_query($exerPlan);
    $exerfields_num = mysql_num_fields($resultExer);
    
    echo "<h1>Plan Name:$fieldPlan</h1>";
    echo "<table border='3'><tr>";
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
     echo "</table>";
    
    
    //exercise
    echo "<h1>My Exercises</h1>";
    echo "<table border='3'><tr>";
    // printing table headers
    for($i=0; $i<$exerfields_num; $i++)
    {
        $fieldVal = mysql_fetch_field($resultExer);
        echo "<td>{$fieldVal->name}</td>";
    }
    echo "</tr>\n";
    // printing table rows
    while($row = mysql_fetch_row($resultExer))
    {
        echo "<tr>";
        
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
        echo "<td>$cell</td>";
        echo "</tr>\n";
    }
    echo "</table>";

    
 
    
mysql_free_result($result);
    ?>
