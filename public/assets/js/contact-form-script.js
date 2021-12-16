(function($) {

    "use strict";
    var SITEURL = $('#SITEURL').val();
    $("#contactForm").validator().on("submit", function(event) {
    
        
        if (event.isDefaultPrevented()) {
            formError();
            submitMSG(false, "Wujuje ifishi neza?");
        } else {
            
            event.preventDefault();
            submitForm();
        }
    });

    function submitForm() {
        //hide submit button
        $('#submit').hide();

        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var message = $("#message").val();
        $.ajax({
            type: "POST",
            url: SITEURL+"public/form-process.php",
            data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
            success: function(text) {
                $('#submit').show();
                if (text == "success") {
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false, text);
                }
            }
        });
    }

    function formSuccess() {
        $("#contactForm")[0].reset();
        submitMSG(true, "Ubutumwa bwatanzwe!")
    }

    function formError() {
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h5 text-center tada animated text-success mt-3";
        } else {
            var msgClasses = "h5 text-center text-danger mt-3";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery));