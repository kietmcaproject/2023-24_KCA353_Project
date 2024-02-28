function sendOTP() {
    $(".error").html("").hide();
    var number = $("#mobile").val();
    if(number.length == 10 && number!=null){
        var input = {
            "mobile_number" : number,
            "action" : "send_otp"
        };
        $.ajax({
            url : 'controller.php',
            type : 'POST',
            data : input,
            success : function (response) {
                $(".container").html(response);
            }
        });
    }
    else{
        $(".error").html('Please enter a valid number!')
        $(".error").show();
    }
}

function verifyOTP() {
    $(".error").html("").hide();
    $(".success").html("").hide();
    var otp = $("#mobileotp").val();
    var input = {
        "otp" : otp,
        "action" : "verify_otp"

    };
    if(otp.length == 5 && otp != null){
        $.ajax({
            url : 'controller.php',
            type : 'POST',
            dataType : "json",
            data : input,
            success : function(response) {
                $("." + response.type).html(response.message)
                $("." + response.type).show();
            },
            error : function () {
                alert("ss");
            }
        });
    }
    else{
        $(".error").html('You Have entered wrong OTP.')
        $(".error").show();
    }
}