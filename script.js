$( document ).ready(function() {
    $.getJSON("getPlans.php",success=function(data)
              {
     var options="";
     for(var i=0;i<data.length;i++){
     options+= "<option value='" + data[i+1] + "'>" + data[i] + "</option>";
              i++;
     }
              $("#selDplan").append(options);
              $("#selDplan").change();
              
    });
                    

   

                    
                    
                    
$.getJSON("getExercises.php",success=function(data)
                              {
                              var options="";
                              for(var i=0;i<data.length;i++){
                              options+= "<option value='" + data[i+2] + "'>" + data[i] + "-"+ data[i+1] + "</option>";
                                i=i+2;
                              }
                              $("#addExer").append(options);
                              });
               
    
                    $("#Dietician").click(function() {
                                          $.getJSON("getDietician.php",success=function(data)
                                                    {
                                                    var options="";
                                                    for(var i=0;i<data.length;i++){
                                                    options+= "<option value='" + data[i+1] + "'>" + data[i] + "</option>";
                                                    i++;
                                                    }
                                                    $("#Dname").append(options);
                                                    });
                                        });
                    
                    $("#Nutritionist").click(function() {
                                          $.getJSON("getNurtician.php",success=function(data)
                                                    {
                                                    var options="";
                                                    for(var i=0;i<data.length;i++){
                                                    options+= "<option value='" + data[i+1] + "'>" + data[i] + "</option>";
                                                    i++;
                                                    }
                                                    $("#Nname").append(options);
                                                    });
                                          });
                    
                    $("#Expert").click(function() {
                                          $.getJSON("getFitnessExpert.php",success=function(data)
                                                    {
                                                    var options="";
                                                    for(var i=0;i<data.length;i++){
                                                    options+= "<option value='" + data[i+1] + "'>" + data[i] + "</option>";
                                                    i++;
                                                    }
                                                    $("#Ename").append(options);
                                                    });
                                          });
                    
                    
                     $("#Dname").change(function(){
                                        var expertId = $("#Dname").val();
                                        
                                        var dataString = 'expertIdVal='+ expertId ;
                                        
                                                                               // AJAX Code To Submit Form.
                                        $.ajax({
                                               type: "POST",
                                               url: "assignExpert.php",
                                               data: dataString,
                                               cache: false,
                                               success: function(result){
                                               $("#expertConf").empty();
                                               $("#expertConf").append(result);                                            }
                                               });
                                        
                                        return false;
                                        });
                    
                    
                    $("#Nname").change(function(){
                                       var expertId = $("#Nname").val();
                                       
                                       var dataString = 'expertIdVal='+ expertId ;
                                       
                                       // AJAX Code To Submit Form.
                                       $.ajax({
                                              type: "POST",
                                              url: "assignExpert.php",
                                              data: dataString,
                                              cache: false,
                                              success: function(result){
                                              $("#expertConf").empty();
                                              $("#expertConf").append(result);                                               }
                                              });
                                       
                                       return false;
                                       });
                    
                    $("#Ename").change(function(){
                                       var expertId = $("#Ename").val();
                                       
                                       var dataString = 'expertIdVal='+ expertId ;
                                       
                                       // AJAX Code To Submit Form.
                                       $.ajax({
                                              type: "POST",
                                              url: "assignExpert.php",
                                              data: dataString,
                                              cache: false,
                                              success: function(result){
                                              $("#expertConf").empty();
                                              $("#expertConf").append(result);                                               }
                                              });
                                       
                                       return false;
                                       });

                    

                    
                   
                    $("#aexer").click(function() {
                                      $("#addExercise").show("slow");
                                      });

                    
                    
                    
                    $("#shCalCo").click(function(){
                                       var dietPlan = $("#selDplan").val();
                                        //alert(dietPlan);
                                        var dietPlanBf = $("#selFbf").val();
                                        //alert(dietPlanBf);
                                        var alldietPlans;
                                        alldietPlans = "'"+"FD00"+"'";
                                        for (var i = 0; i < dietPlanBf.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanBf[i]+"'";
                                        }
                                        //alert("After Call");
                                        //alert(alldietPlans);
                                        //dietPlanBf="1,2,3".split(",");
                                        //alert(dietPlanBf);
                                        /*var list   = document.getElementById(#selFbf);
                                        alert(list);
                                        var dietPlanBf = [];
                                        i;
                                        for (i = 0; i < list.options.length; i++) {
                                        if (list.options[i].selected) {
                                        dietPlanBf.push(list.options[i].value);
                                        }
                                        }
                                        alert(dietPlanBf);
                                        */
                                        var dietPlanLu = $("#selFLun").val();
                                        for (var i = 0; i < dietPlanLu.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanLu[i]+"'";
                                        }
                                       var dietPlanSn = $("#selFSna").val();
                                        for (var i = 0; i < dietPlanSn.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanSn[i]+"'";
                                        }
                                        var dietPlanDi = $("#selFDinner").val();
                                        for (var i = 0; i < dietPlanDi.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanDi[i]+"'";
                                        }
                                        //alert(alldietPlans);
                                        
                                        var cExer = $("#addExer").val();
                                        var cTime = $("#timeExer").val();
                                        
                                        // Returns successful data submission message when the entered information is stored in database.
                                      var dataString = 'allFoodIDVal='+ alldietPlans +'&choseExer='+ cExer + '&choseTime='+ cTime;
                                        
                                        /*var dataString = 'planoption='+ dietPlan + '&planoptionBF='+ dietPlanBf + '&planoptionLu='+ dietPlanLu + '&planoptionSn='+ dietPlanSn + '&planoptionDi='+ dietPlanDi + '&choseExer='+ cExer + '&choseTime='+ cTime; */
                                    
                                        
                                       if(dietPlan==' '||dietPlanBf==' '||dietPlanLu==' '||dietPlanSn==' ' || dietPlanDi==' '||cExer==' '||cTime==' ')
                                       {
                                       alert("Please Fill All Fields");
                                       }
                                       else
                                       {
                                       // AJAX Code To Submit Form.
                                       $.ajax({
                                              type: "POST",
                                              url: "calculatecalorie.php",
                                              data: dataString,
                                              cache: false,
                                              success: function(result){
                                              alert(result);
                                              }
                                              });
                                       }
                                       return false;
                                       });
                    
                    
                  //save
                    
                    $("#Save").click(function(){
                                        var dietPlan = $("#selDplan").val();
                                        var dietPlanBf = $("#selFbf").val();
                                        var alldietPlans;
                                        alldietPlans = "'"+"FD00"+"'";
                                        for (var i = 0; i < dietPlanBf.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanBf[i]+"'";
                                        }
                                        var dietPlanLu = $("#selFLun").val();
                                        for (var i = 0; i < dietPlanLu.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanLu[i]+"'";
                                        }
                                        var dietPlanSn = $("#selFSna").val();
                                        for (var i = 0; i < dietPlanSn.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanSn[i]+"'";
                                        }
                                        var dietPlanDi = $("#selFDinner").val();
                                        for (var i = 0; i < dietPlanDi.length; ++i)
                                        {
                                        alldietPlans = alldietPlans+","+"'"+dietPlanDi[i]+"'";
                                        }
                                        var cExer = $("#addExer").val();
                                        var cTime = $("#timeExer").val();
                                        
                                        var dataString = 'allFoodIDVal='+ alldietPlans +'&choseExer='+ cExer + '&choseTime='+ cTime;
                                        
                                       if(dietPlan==' '||dietPlanBf==' '||dietPlanLu==' '||dietPlanSn==' ' || dietPlanDi==' '||cExer==' '||cTime==' ')
                                        {
                                        alert("Please Fill All Fields");
                                        }
                                        else
                                        {
                                        // AJAX Code To Submit Form.
                                        $.ajax({
                                               type: "POST",
                                               url: "onsavediet.php",
                                               data: dataString,
                                               cache: false,
                                               success: function(result){
                                               alert(result);                                               }
                                               });
                                        }
                                        return false;
                                        });
                    
                    
    $("#selDplan").change(function(){
                          $.getJSON("getPlansBF.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i+2] + "'>" +data[i]+"-"+ data[i+1] + "</option>";
                                    i=i+2;
                                    }
                                    $("#selFbf").html("");
                                    $("#selFbf").append(options);
                                    
                                    });
                          
                          $.getJSON("getPlansLu.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i+2] + "'>" + data[i] + "-"+ data[i+1] + "</option>";
                                    i=i+2;
                                    }
                                    $("#selFLun").html("");
                                    $("#selFLun").append(options);
                                    
                                    });
                          
                          $.getJSON("getPlansSn.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" +  data[i+2]  + "'>" + data[i] + "-"+
                                    data[i+1] + "</option>";
                                    i=i+2;
                                    }
                                    $("#selFSna").html("");
                                    $("#selFSna").append(options);
                                    
                                    });
                          
                          $.getJSON("getPlansDi.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i+2] + "'>" + data[i] + "-"+ data[i+1] + "</option>";
                                    i=i+2;
                                    }
                                    $("#selFDinner").html("");
                                    $("#selFDinner").append(options);
                                    
                                    });


                          
                          
                          
                          
    });

});