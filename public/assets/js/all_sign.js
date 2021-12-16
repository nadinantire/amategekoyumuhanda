$(function () {
	"use strict";
    //username and password validations
    var username  = "";
    var password  = "";
    var SITEURL = $('#SITEURL').val();
    //username
    $('#username').keyup(function (){
       
        if($('#username').val().length > 2){
          
            username = $('#username').val();
             //input
            $('#username').removeClass("is-invalid");
            $('#username').addClass("is-valid"); 
            //message
            $('#username_validate').removeClass("invalid-feedback");
            $('#username_validate').addClass("valid-feedback");
            $('#username_validate').html("Username Looks Good!");
        }else{

            username = "";
             //input
            $('#username').removeClass("is-valid");
            $('#username').addClass("is-invalid");
            //message
            $('#username_validate').removeClass("valid-feedback");
            $('#username_validate').addClass("invalid-feedback");
            $('#username_validate').html("Please provide a valid username.");
        }

        

    });
    //password
    $('#password').keyup(function (){
        
        if($('#password').val().length > 4){
            password = $('#password').val();
                //input
            $('#password').removeClass("is-invalid");
            $('#password').addClass("is-valid"); 
            //message
            $('#password_validate').removeClass("invalid-feedback");
            $('#password_validate').addClass("valid-feedback");
            $('#password_validate').html("Password Looks Good!");
        }else{
            password = "";
                //input
            $('#password').removeClass("is-valid");
            $('#password').addClass("is-invalid");
            //message
            $('#password_validate').removeClass("valid-feedback");
            $('#password_validate').addClass("invalid-feedback");
            $('#password_validate').html("Please provide a valid password.");
        }

        

    });


    //logging in
	$("#login").on("click", function () {
        if(password.length > 4 && username.length > 2){
            $('#response').html('');
            $('#login_spinner').css('display', 'block');
            $('.log-fields').css('display', 'none');
            $("#login").html("Logging In...");
            $.ajax({
                type: 'post',
                url: SITEURL+'submissions.php',
                data: {
                  'action': 'loginUser',
                  'username': username,
                  'password': password,
                },
                success: function (data){
                    // console.log(data);
                    data = data.trim();
                    $('#login_spinner').css('display', 'none');
                    $('.log-fields').css('display', 'block');
                    $("#login").html('Log In <i class="lni lni-arrow-right"></i>');

                  if(data.trim() === "Country" ){
                    $('#response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Ok!</strong><a href="#" class="alert-link"></a> Successfully Logged in. </div>');
        
                    location.assign(SITEURL+"country/");
                  }else if(data.trim() === "Province" ){
                    $('#response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Ok!</strong><a href="#" class="alert-link"></a> Successfully Logged in. </div>');
                    location.assign(SITEURL+"province/");
                  }else if(data.trim() === "District" ){
                    $('#response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Ok!</strong><a href="#" class="alert-link"></a> Successfully Logged in. </div>');
                    location.assign(SITEURL+"district/");
                  }else if(data.trim() === "Sector" ){
                    $('#response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Ok!</strong><a href="#" class="alert-link"></a> Successfully Logged in. </div>');
                    location.assign(SITEURL+"sector/");
                  }else if(data.trim() === "Cell" ){
                    $('#response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Ok!</strong><a href="#" class="alert-link"></a> Successfully Logged in. </div>');
                    location.assign(SITEURL+"cell/");
                  }else if(data.trim() === "Agent" ){
                    $('#response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i><strong>Ok!</strong><a href="#" class="alert-link"></a> Successfully Logged in. </div>');
                    location.assign(SITEURL+"agent/");
                  }else if(data.trim() === "NoUser"){
                    $('#response').html('<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">User not found!<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span></button></div>');
                    //reset username
                    //input
                    $('#username').removeClass("is-valid");
                    $('#username').addClass("is-invalid");
                    username = "";
                    $('#username').val("");
                    //message
                    $('#username_validate').removeClass("valid-feedback");
                    $('#username_validate').addClass("invalid-feedback");
                    $('#username_validate').html("Please provide a valid username.");
                    //reset password
                    //input
                    $('#password').removeClass("is-valid");
                    $('#password').addClass("is-invalid");
                    $('#password').val("");
                    password= "";
                    //message
                    $('#password_validate').removeClass("valid-feedback");
                    $('#password_validate').addClass("invalid-feedback");
                    $('#password_validate').html("Please provide a valid password.");

                  }
                }
              })
        }else{
            $('#response').html('<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Please Enter username and password!<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span></button></div>');
        }
	});
});