<?php
    if(isset($_GET["myplan"])){
        session_start();
        $host="localhost"; // Host name
        $username="kovid"; // Mysql username
        $password="kovid"; // Mysql password
        $db_name="FitnFab"; // Database name
        //$tbl_name="Account"; // Table name
        // Connect to server and select databse.
        $plan = $_GET["myplan"];
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
        $sqlPlan="SELECT Food.Food_Id,Food.Food_Name,Food.Calorie_Count from Account JOIN Diet_Plan on Diet_Plan.Plan_Id= Account.Plan_Id JOIN Displays on Displays.Plan_Id= Account.Plan_Id JOIN Food on Food.Food_Id=Displays.Food_Id where Displays.Type_Name='Lunch' and Diet_Plan.Plan_Id like '{$plan}' and Account.Account_Id='$username'";
        $resultPlan=mysql_query($sqlPlan);
        $plansBF = array();
        while($row = mysql_fetch_array($resultPlan)){
            array_push($plansBF, $row["Food_Name"],$row["Calorie_Count"],$row["Food_Id"]);
        }
        echo json_encode($plansBF);
        //mysql_free_result($result);
    }
    
    ?>
