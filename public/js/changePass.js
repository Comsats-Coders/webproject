$(document).ready(
    function () {
        $('#pass, #Rpass,#Opass').keyup(passCheck).change(passCheck);
        $('#Rpass,#pass').keyup(matchPass);
        $('#pass').keyup(testPass).keypress(testPass);
    })


function passCheck() {
    var empty;
   
        if (($('#pass').val() != '') && ($('#Opass').val() !='')) {
            empty = false;
        }
    

    if (empty == false && matchPass() == true) {
        $('#contBtn').removeClass("disabled");
    }
    else {

        $('#contBtn').addClass("disabled");

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
