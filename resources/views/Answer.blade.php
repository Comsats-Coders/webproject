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
    <link rel="stylesheet" href="/css/Answer.css">
    <script src="/js/answer.js"></script> 

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

    <div class="container-fluid">

        <div class="row px-3 py-3">
            <div class="col-md-1"></div>

            <div class="col-md-8">
            
            @foreach($questions as $qs)
                <div class="card-body bg-light rounded mb-5" id="qa">
                   <span class="float-right"><a href="/Answer/delete/{{$qs->questionID}}"><i class="bi bi-x-square-fill" id="close"></i></span></a>
                    <div class="card-title">
                        <h6>
                            {{$qs->question}}<span class="text-muted small float-right mr-3">Anonymous</span>
                           
                        </h6>
                    </div>
                    <hr>
                    <div class="card-text">
              
                        <form action="/Answer/{{$qs->questionID}}" id="form" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="comment"></label>
                                <textarea class="form-control" rows="3" id="comment" name="answer" form="form" placeholder="Answer..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="float-right ">
                            <a href="javascript:$('form').submit();" <i class="btn btn-success"></i> Answer</a>
                        </div>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-md-2" id="mycard">
                <div class="card p-4">
                    <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                         class="rounded-circle img-thumbnail"
                         alt="..." />
                    <div class="card-body">
                        <a href="profile.html"><h5 class="card-title text-center" id="userName">@Username</h5></a>
                        <p class="card-text text-center">
                            This area will display tha user's bio.
                        </p>
                        <center><a href="#!" class="text">Followers:<br>50.5k</a></center>
                        <br>
                        <center> <a href="#!">Following:<br>28k</a></center>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
    
</body>
</html>

