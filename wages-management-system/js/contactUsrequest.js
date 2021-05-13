///Ajex Call for Contact us verification
function checkContactFlied(){
     var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var client_name = $("#client_name").val();
    var project_num = $("#project_num").val();
     var client_email = $("#client_email").val();
      var message = $("#message").val();

//chech form validation
   if (client_name.trim() == "") {
        $("#StatusContactMsg1").html('<small style = "color:red;">Please Enter Name !</small>');
        $("#client_name").focus();
        return false;
    } else if (project_num.trim() == "") {
        $("#StatusContactMsg2").html('<small style = "color:red;">Please project_number !</small>');
        $("#project_num").focus();
        return false;
    }
    else if (client_email.trim() == "") {
        $("#StatusContactMsg3").html('<small style = "color:red;">Please Enter Email !</small>');
        $("#client_email").focus();
        return false;
    }else if(client_email.trim() != "" && !reg.test(client_email)){
         $("#StatusContactMsg3").html('<small style = "color:red;">Please Enter Valid Email example@gmail.com !</small>');
        $("#client_email").focus();
        return false;
    }else if (message.trim() == "") {
        $("#StatuContactsMsg4").html('<small style = "color:red;">Please Enter your query? !</small>');
        $("#message").focus();
        return false;
    } else{

    $.ajax({
        url:'client/clientcontact.php',
        method:'POST',
        dataType: "json",
        data:{
            clientEmail : "clientEmail",
            client_name : client_name,
            project_num : project_num,
            client_email : client_email,
            message : message,
        },
        success: function(data){

            if(data == "Failed"){
                $("#StatusContactMsg5").html('<small class ="alert alert-danger">Something is wrong !</small>');
            }
            else if(data == "OK")
            {
                $("#StatusContactMsg5").html('<small class ="alert alert-success">Your query is stored successfully.</small>');
                clearContactField();
            }
        }
    });
}
}

//EMpty All Filed 
function clearContactField(){
    $("#contactusForm").trigger("reset");
    $("#StatusContactMsg1").html(" ");
     $("#StatusContactMsg2").html(" ");
      $("#StatusContactMsg3").html(" ");
       $("#StatusContactMsg4").html(" ");
}