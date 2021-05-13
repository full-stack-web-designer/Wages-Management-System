///Ajex Call for Admin login verification
function checkAdminLogin(){
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
    $.ajax({
        url:'admin/admin.php',
        method:'POST',
        data:{
            checkLogEmail : "checkLogEmail",
            adminLogemail : adminLogEmail,
            adminLogpass : adminLogPass,
        },
        success: function(data){

            if(data == 0){
                $("#adminLogMsg").html('<small class ="alert alert-danger">Invalid Email or Password !</small>');
            }
            else if(data == 1)
            {
                $("#adminLogMsg").html('<small class ="alert alert-success">Success Loading ... !</small>');
                setTimeout(()=>{
                    window.location.href = "admin/adminDashboard.php";
                },1000);
            }
        }
    });
}