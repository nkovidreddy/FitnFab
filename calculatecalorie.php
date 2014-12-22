<?php
    session_start();
    $host="localhost"; // Host name
    $username="kovid"; // Mysql username
    $password="kovid"; // Mysql password
    $db_name="FitnFab"; // Database name
    $allFoodIds = $_POST['allFoodIDVal'];
    //echo $allFoodIds;
    /*$planoptions = $_POST['planoption'];
    echo $_POST['planoption'];
    $allfoodId[] = array();
    $foodCalId="'";
    $foodCalId=$foodCalId . "FD00" ."'";
    echo $_POST['planoptionBF'];
    
    foreach ($_POST['planoptionBF'] as $selectedOption){
        //echo $selectedOption;
        //echo $foodCalId;
        $foodCalId = $foodCalId . "," . "'".$selectedOption."'";
        //echo $foodCalId;
        //array_push($allfoodId,$selectedOption);
    }
    //echo "</br>";
    foreach ($_POST['planoptionLu'] as $selectedOption1){
        //echo $selectedOption1;
        //array_push($allfoodId,$selectedOption);
        $foodCalId = $foodCalId . "," . "'".$selectedOption1."'";
        
    }
    //echo "</br>";
    foreach ($_POST['planoptionSn'] as $selectedOption2){
        //echo $selectedOption2;
       // array_push($allfoodId,$selectedOption);
        $foodCalId = $foodCalId . "," . "'".$selectedOption2."'";
        
    }
      //  echo "</br>";
    foreach ($_POST['planoptionDi'] as $selectedOption3){
        //echo $selectedOption3;
        //array_push($allfoodId,$selectedOption);
        $foodCalId = $foodCalId . "," . "'".$selectedOption3."'";
        
    }
    //echo $foodCalId;
    //echo $allfoodId[]; */
    
    $exerciseId = $_POST['choseExer'];
    $timeExercise = $_POST['choseTime'];
    
    
  //  $serializedoptions = serialize($planoptions);
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
    //echo $planoptions;
    //echo "</br>";
//echo $planbreakfast;
  /*  $sql="SELECT SUM(Calorie_Count) Calorie_Count from Food where Food_Id in ($foodCalId)"; */
    
    $sql="SELECT SUM(Calorie_Count) Calorie_Count from Food where Food_Id in ($allFoodIds)";
    //echo $sql;
    $resultCal=mysql_query($sql);
    $calContFood = mysql_result($resultCal,0);
    
    
    
    
    $exerSql="select Calories_burnt_per_min*$timeExercise Calorie_Count from Exercise where Exercise_Id ='$exerciseId'";
    //echo $exerSql;
    $resultExerCal=mysql_query($exerSql);
     $calContExer = mysql_result($resultExerCal,0);
    
    $netCal = $calContFood - $calContExer;
    //echo "</br>";
   // echo $netCal;
    //echo "</br>";
    //echo number_format((float)$netCal);
    //echo "</br>";
    //echo number_format((float)$netCal, 3, '.', '');


   /* $calvalue = array();
    while($row = mysql_fetch_array($resultCal)){
        array_push($calvalue, $row["Calorie_Count"]);
    }
    
    $exercalvalue = array();
    while($row = mysql_fetch_array($resultExerCal)){
        array_push($exercalvalue, $row["Calorie_Count"]);
    }
    
*/
    $calCount = array();
    array_push($calCount,number_format((float)$netCal));
   // header("Location: http://localhost/fitnfab/homepage/index.html");
    //echo json_encode($calCount);
    echo "The Net Calorie Count based on your consumption and Exercise Done is ";
    echo number_format((float)$netCal)."Cal";
    
    mysql_query($sql) or die(mysql_error());
    
    //mysql_free_result($result);
    ?>
