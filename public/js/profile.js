$(document).ready(function(){
    $("#post").keypress(post).keyup(post);
})
    function post() {
        console.log($('#post').val());
        if ($('#post').val() != '') {
            
            $('#askBtn').removeClass("disabled");
        }
        else {
            $('#askBtn').addClass("disabled");
        }
    }
    