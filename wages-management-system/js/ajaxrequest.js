$(document).ready(function(){
    //Ajex call form already exists email verification
    $("#clientemail").on("keypress blur", function(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var clientemail = $("#clientemail").val();

        $.ajax({ 
        url:"client/addclient.php",
        method:"POST",
        data:{
            checkemail: "checkemail", 
            clientemail:clientemail,
        },
        success: function(data){
            //console.log(data);
            if(data != 0)
            {
                $("#statusMsg2").html('<small style = "color:red;">Email id already exists !</small>'); 
                $("#signup").attr("disabled",true); 
            }else if(data == 0 && reg.test(clientemail))
            {
                 $("#statusMsg2").html('<small style = "color:green;">Email success varify !</small>'); 
                $("#signup").attr("disabled",false); 
            }else if(!reg.test(clientemail))
            {
                $("#statusMsg2").html('<small style = "color:red;">Please Enter Valid Email example@gmail.com !</small>'); 
                $("#signup").attr("disabled",false); 
            }
            if(clientemail = "")
            {
                 $("#statusMsg2").html('<small style = "color:red;">Please Enter Email !</small>'); 
            }
        },
    });
});
});


function addclient(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i; //rejects code email validation
    var clientname = $("#clientname").val();
    var clientemail = $("#clientemail").val();
    var clientpass = $("#clientpass").val();
   
   //chech form validation
   if (clientname.trim() == "") {
        $("#statusMsg1").html('<small style = "color:red;">Please Enter Name !</small>');
        $("#clientname").focus();
        return false;
    } else if (clientemail.trim() == "") {
        $("#statusMsg2").html('<small style = "color:red;">Please Enter Email !</small>');
        $("#clientemail").focus();
        return false;
    }else if(clientemail.trim() != "" && !reg.test(clientemail)){
         $("#statusMsg2").html('<small style = "color:red;">Please Enter Valid Email example@gmail.com !</small>');
        $("#clientemail").focus();
        return false;
    }else if (clientpass.trim() == "") {
        $("#statusMsg3").html('<small style = "color:red;">Please Enter Password !</small>');
        $("#clientpass").focus();
        return false;
    } else{

    $.ajax({ 
        url:'client/addclient.php',
        method:'POST',
        dataType: "json",
        data:{
            clientsignup: "clientsignup",
            clientname : clientname,
            clientemail : clientemail,
            clientpass : clientpass,
        },
        success:function(data){
            if(data == "OK")
            {
                $('#successMsg').html("<span class='alert alert-success'>Registration Successfully !</span>");
                clearClientRegField();
            }else if(data == "Failed")
            {
                 $('#successMsg').html("<span class='alert alert-danger'>Unable to Register.</span>");
            }
        },
    });

}
}

//EMpty All Filed 
function clearClientRegField(){
    $("#clientRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
     $("#statusMsg2").html(" ");
      $("#statusMsg3").html(" ");
}

//Ajex Call for client login verification
function checkClientLogin(){
    var clientLogEmail = $("#clientLogemail").val();
    var clientLogPass = $("#clientLogpass").val();
    $.ajax({
        url:'client/addclient.php',
        method:'POST',
        data:{
            checkLogEmail : "checkLogEmail",
            clientLogemail : clientLogEmail,
            clientLogpass : clientLogPass,
        },
        success: function(data){

            if(data == 0){
                $("#statusLogMsg").html('<small class ="alert alert-danger">Invalid Email or Password !</small>');
            }
            else if(data == 1)
            {
                $("#statusLogMsg").html('<div class ="spinner-border text-success" role="status"></div>');
                setTimeout(()=>{
                    window.location.href = "index.php";
                },1000);
            }
        }
    });
}