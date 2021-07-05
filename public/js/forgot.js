$(document).ready(
    function () {
        $('#email').keyup(emailCheck).change(emailCheck);
        $('#email').keypress(noSpace).keyup(email);
        $('#code').keyup(codeCheck).change(codeCheck);
        $('#code').keypress(noSpace).keyup(code);

        $('#pass, #Rpass').keyup(passCheck).change(passCheck);
        $('#Rpass,#pass').keyup(matchPass);
        $('#pass').keyup(testPass).keypress(testPass);
    })

function emailCheck() {
    var empty = false;
        if ($('#email').val() == '') {
            empty = true;
        }
    
    if (empty == false && email() == true) {
        $('#contBtn').removeClass("disabled");
    }
    else {

        $('#contBtn').addClass("disabled");

    }
}

function email() {

    var regex = new RegExp("^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$");
    var email = $("#email").val();

    if (email != "") {
        if (regex.test(email)) {
            $("#emailError").html(null);
            return true;

        } else {
            $("#emailError").html("Email should be valid");
        }

    }
    else {
        $("#emailError").html(null);
    }
}

function codeCheck() {
    var empty = false;
    if ($('code').val() == '') {
        empty = true;
    }

    if (empty == false && code() == true) {
        $('#contBtn1').removeClass("disabled");
    }
    else {

        $('#contBtn1').addClass("disabled");

    }
}

function code() {

    var regex = new RegExp("^[0-9]{6}$");
    var code = $("#code").val();

    if (code != "") {
        if (regex.test(code)) {
            $("#codeError").html(null);
            return true;

        } else {
            $("#codeError").html("Code should be valid");
        }

    }
    else {
        $("#codeError").html(null);
    }
}

function passCheck() {
    var empty = false;
    if ($('pass').val() == '') {
        empty = true;
    }

    if (empty == false && matchPass() == true) {
        $('#contBtn2').removeClass("disabled");
    }
    else {

        $('#contBtn2').addClass("disabled");

    }
}

function noSpace(event) {
    if (event.which == 32) {
        event.preventDefault();
    }
}

function testPass(event) {
    var regex = new RegExp("^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$");
    var testp = $('#pass').val();
    if (testp != "") {
        if (event.which == 32) {
            event.preventDefault();
        }
        else {
            if (regex.test(testp)) {
                $("#passTest").html("Password must contain a special charchter, numeric and capital letter, min length 8");
            }
            else {
                $("#passTest").html("Good to go!");
            }

        }
    }
    else {
        $("#passTest").html(null);
    }
}

function matchPass() {
    var pass = $('#pass').val();
    var pass1 = $('#Rpass').val();

    if ($("#pass").val() === "") {
        $("#Rpass").val("");
        $("#passError").html(null);
    }

    else if ($("#Rpass").val() !== "") {
        if (pass == pass1) {
            $("#passError").html("Password match");
            return true;
        }
        else {
            $("#passError").html("Password mismatch");
        }
    }
}



$("#form").submit(
    function (e) {
        e.preventDefault();
    });
