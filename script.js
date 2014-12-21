$( document ).ready(function() {
    $.getJSON("getPlans.php",success=function(data)
              {
     var options="";
     for(var i=0;i<data.length;i++){
     options+= "<option value='" + data[i].toLowerCase() +"-"+data[i+1].toLowerCase() + "'>" + data[i] + "</option>";
     }
              $("#selDplan").append(options);
              $("#selDplan").change();
              
    });
                    
    $("#selDplan").change(function(){
                          $.getJSON("getPlansBF.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i].toLowerCase() +"-"+ data[i+1].toLowerCase() + "'>" + data[i] + "</option>";
                                    }
                                    $("#selFbf").html("");
                                    $("#selFbf").append(options);
                                    
                                    });
                          
                          $.getJSON("getPlansLu.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
                                    }
                                    $("#selFLun").html("");
                                    $("#selFLun").append(options);
                                    
                                    });
                          
                          $.getJSON("getPlansSn.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
                                    }
                                    $("#selFSna").html("");
                                    $("#selFSna").append(options);
                                    
                                    });
                          
                          $.getJSON("getPlansDi.php?myplan=" +$(this).val(),success=function(data)
                                    {
                                    var options="";
                                    for(var i=0;i<data.length;i++){
                                    options+= "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
                                    }
                                    $("#selFDinner").html("");
                                    $("#selFDinner").append(options);
                                    
                                    });


                          
                          
                          
                          
    });

});