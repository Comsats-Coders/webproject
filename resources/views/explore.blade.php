<!DOCTYPE html>
<html>
<head>
<title>PUCHOO -Login or sign up</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{asset('/css/explore.css')}}">
    <script>

    function searchSuggest(){
        var str=document.getElementById('search').value;
        document.getElementById('searchResults').innerHTML="";
        document.getElementById('searchResults').style.border="0px";
        var searchReq= new XMLHttpRequest();
        var url='/request?search='+ str;
        searchReq.open("GET",url);
        searchReq.send();
        searchReq.onreadystatechange=function(){
            if(searchReq.readyState==4 && searchReq.status==200){
                const JSONResponse=JSON.parse(searchReq.responseText);
        for (var i = 0; i < JSONResponse.length; i++)  {
  
        //  var mainDiv= document.createElement('div');
        //   mainDiv.className="card-body bg-light rounded mb-3";
        //   var textnode = document.createTextNode(JSONResponse[i].userName); 
        //   mainDiv.appendChild(textnode);
        //   mainDiv.remove();
       // document.getElementById("testDiv").appendChild(mainDiv);
       //document.getElementById("pp").src+=JSONResponse[i].profilePic;
        document.getElementById('searchResults').innerHTML+=JSONResponse[i].userName+"<br>";
        document.getElementById('searchResults').style.border="1px solid #cc0d3a";
       document.getElementById('searchResults').style.borderRadius="2px 2px 2px 2px";
          
      }       
        }
        };     
    }
</script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light mb-3" id="nav">
            <img src="{{asset('images/logoF.png')}}" width="100px" height="60px"  style="object-fit:contain;" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav pl-4">
                <li class="nav-item">
                  <a class="nav-link" href="/home"><i class="bi bi-house-door-fill"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/Answer"><i class="bi bi-question-square-fill"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/profile"><i class="bi bi-person-fill"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/explore">  <i class="bi bi-search"></i> </a>
                </li>
              <li class="nav-item dropdown" id="bell"> <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-bell-fill"></i>
                    </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <p> Notification</p>
                    </div>
                  </li>
            <li class="nav-item dropdown"> <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bi bi-caret-down-square-fill"></i>   
              </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                <a class="dropdown-item" href='/settings'><i class="bi bi-gear-fill"></i> Settings</a>
                <a class="dropdown-item" href="/logOut"><i class="bi bi-box-arrow-in-right"></i> Log Out</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>

            </li>
           </ul>
        </div>
        </div>
        </nav>

    <div class="container">



        <div class="row mx-auto"> 
            <form class="mx-auto" action="/explore" method="post">
              @csrf
              <div>
               <input id="search" type="text" class="form-control" name="search" placeholder="Who are you looking for?" 
                onkeyup="searchSuggest();" autocomplete="off">
                 
                </form>
        <div id="searchResults"></div>
        </div>
        <span class="float-left"><a href="javascript:$('form').submit();" class="btn btn-success" role="button" id="postBtn">Search</a> </span>
             
        </div>
  </div>
  
        <div class="row py-3 px-4">
    
    <div class="col-lg-4 mx-auto p-5" id="testing">
    @foreach($resultsData as $rd)
      <div class="card p-5 mb-5 ">
        <img id="pp"
          src="{{$rd->profilePic}}"
          class="rounded-circle img-thumbnail"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title text-center" id="userName">{{$rd->userName}}</h5>
          <p class="card-text">
          {{$rd->bio}}
          </p>
          <a href="/profileCheck/{{$rd->userName}}" class="btn btn-success">View Profile</a>
        </div>
       
      </div>
      @endforeach
   

</body>
</html>