$('document').ready(function(){
    
    $("#login-form").validate({
        rules:
                {
                    username:{
                        required: true,
                    },
                    password:{
                        required: true,
                    },
                },
                messages:
                    {
                        password:{
                            required: "Por favor ingrese su PASSWORD"
                        },
                            username: "Ingrese su usuario",
                        },
               submitHandler: submitForm
                
    });
    
    function submitForm(){
        var data = $("#login-form").serialize();
        
        $.ajax({
            type : 'POST',
            url  : 'login_process.php',
            data : data,
            beforeSend: function()
            { 
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {      
                if(response=="ok")
                {        
                    $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                    setTimeout(' window.location.href = "principal.php"; ',4000);
                }
                else
                {
                    $("#error").fadeIn(1000, function(){      
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
    } 
});