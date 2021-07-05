$(document).ready(
    function(){
      // $("#like").click(likeFill);
       //$("#dislike").click(dislikeFill);
       $("#post").keypress(post).keyup(post).change(post);
       $(".like").click(like)
       
    })
    
   /* function likeFill(){
    
        if($("#dislike").attr('class')==("bi bi-hand-thumbs-down-fill")){
        $("#dislike").toggleClass('bi bi-hand-thumbs-down bi bi-hand-thumbs-down-fill');
        $("#like").toggleClass('bi bi-hand-thumbs-up bi bi-hand-thumbs-up-fill');
        //decrease dislike
        //add like
       // likesUpdate();
        }
        else{
            $("#like").toggleClass('bi bi-hand-thumbs-up bi bi-hand-thumbs-up-fill');
            //add like

        }
    }
    
    function dislikeFill(){
        if($("#like").attr('class')==("bi bi-hand-thumbs-up-fill")){
            $("#like").toggleClass('bi bi-hand-thumbs-up bi bi-hand-thumbs-up-fill');
            $("#dislike").toggleClass('bi bi-hand-thumbs-down bi bi-hand-thumbs-down-fill');
            //decrease likes
            //add dislike
            //likesUpdate()
            }
            else{
                $("#dislike").toggleClass('bi bi-hand-thumbs-down bi bi-hand-thumbs-down-fill');
                //add dislike

            }
    
    }
    */
    function post() {
        console.log($('#post').val());
        if ($('#post').val() != '') {
            
            $('#postBtn').removeClass("disabled");
        }
        else {
            $('#postBtn').addClass("disabled");
        }
    }

    function likesUpdate(postID){
        var postReq= new XMLHttpRequest();
        var url='/like/'+postID;
        var pID=postID;
        postReq.open("GET",url);
        postReq.send();
        postReq.onreadystatechange=function(){
            if(postReq.readyState==4 && postReq.status==200){
                const JSONResponse=JSON.parse(postReq.responseText);
                console.log(JSONResponse);
                $('[data-id="' +  postID + '"]').html(JSONResponse);
                 
        }}}
        
        function like(){
                var postID=$(this).attr("data-id");
               // var likes=$(this).html();
                $(this).toggleClass('bi bi-hand-thumbs-up bi bi-hand-thumbs-up-fill');
               // $(this).html(likes+=1);
                likesUpdate(postID);
                  //  console.log(a);

        }