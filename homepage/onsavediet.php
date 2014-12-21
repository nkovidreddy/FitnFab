<?php
    session_start();
    $host="localhost"; // Host name
    $username="kovid"; // Mysql username
    $password="kovid"; // Mysql password
    $db_name="FitnFab"; // Database name
    $allFoodIds = $_POST['allFoodIDVal'];
    $exerciseId = $_POST['choseExer'];
    $timeExercise = $_POST['choseTime'];
    // Connect to server and select databse.
    mysql_connect("$host", "$username", "$password")or die("cannot connect");
    mysql_select_db("$db_name")or die("cannot select DB");
    $username=$_SESSION['login_user'];
    $flag = true;
    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION");
    $sql="SELECT SUM(Calorie_Count) Calorie_Count from Food where Food_Id in ($allFoodIds)";
    //echo $sql;
    $resultCal=mysql_query($sql);
    $calContFood = mysql_result($resultCal,0);
    
    $exerSql="select Calories_burnt_per_min*$timeExercise Calorie_Count from Exercise where Exercise_Id ='$exerciseId'";
    $resultExerCal=mysql_query($exerSql);
     $calContExer = mysql_result($resultExerCal,0);
    
    $netCal = $calContFood - $calContExer;
    $netCal = round((float)$netCal);
    
    
    //Update Account
    $updAcc = "UPDATE Account SET Calorie_Count=$netCal where Account_Id = '$username'";
    //echo $updAcc;
    $result1 = mysql_query($updAcc);
    
    
    //Insert Calorie Info
    $updCal = "INSERT INTO Calorie_Info VALUES('$username',CURDATE(),$netCal)";
    $result2= mysql_query($updCal);
  
    $currentPlanId;
    if ($netCal <  "1000") {
        $currentPlanId="DP01";
    }
    elseif($netCal <  "1300"){
        $currentPlanId="DP02";
    }
    elseif($netCal <  "1500"){
        $currentPlanId="DP03";
    }
    elseif($netCal <  "1700"){
        $currentPlanId="DP05";
    }
    else{
        $currentPlanId="DP04";
    }
   
    $sqlPlan="SELECT Diet_Plan.Plan_Id from Account JOIN Diet_Plan on Diet_Plan.Plan_Id= Account.Plan_Id and Account.Account_Id='$username'";
    $resultPlan=mysql_query($sqlPlan);
    $existingPlanId = mysql_result($resultPlan,0);
    
    if($currentPlanId==$existingPlanId){
        
    }
    else{
        //$dietHistCurr ="SELECT Plan_Id FROM Diet_History WHERE Current='Y'";
        
        $updAccountCal = "UPDATE Account SET Plan_Id='$currentPlanId' WHERE Account_Id='$username'";
        $result3= mysql_query($updAccountCal);
        
        $updHistCurr = "UPDATE Diet_History SET Current='N',E_Date=CURDATE() WHERE Account_Id='$username' and Current='Y'";
        $result4= mysql_query($updHistCurr);
        $dietHistSQL="INSERT INTO Diet_History VALUES ('$currentPlanId','$username', CURDATE(), NULL, 'Y')";
        $result5=mysql_query($dietHistSQL);
        //Update Exercises Done
        $exerDoneSql = "INSERT INTO Exercise_Done VALUES('$exerciseId','$username',CURDATE(),$timeExercise)";
        $result6=mysql_query($exerDoneSql);
        if(!$result1 || !$result2 || !$result3 || !$result4 || !$result5 || !$result6){
            $flag=false;
        }
        
        $myFoodArray = explode(',', $allFoodIds);
        unset($myFoodArray[0]);
        
        //Food Intake
        foreach ($myFoodArray as $selectedOption){
             $foodIntakeSql = "INSERT INTO Food_Intake VALUES($selectedOption,'NA','$username',CURDATE())";
           $result7= mysql_query($foodIntakeSql);
            if(!$result7){
                $flag=false;
            }
        }
    }
    if($flag){
        mysql_query("COMMIT");
    }
    else{
        mysql_query("ROLLBACK");
    }
    //echo $updCal;
    echo "Successfully Saved to Database."
    //mysql_free_result($result);
    ?>
