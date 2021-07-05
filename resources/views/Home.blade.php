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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bona+Nova&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/css/home.css')}}">
  <script src="{{asset('/js/home.js')}}"></script>
  <script>
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light mb-3" id="nav">
    <img src="{{asset('images/logoF.png')}}" width="100px" height="60px" style="object-fit:contain;" alt="">
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
          <a class="nav-link" href="/explore"> <i class="bi bi-search"></i> </a>
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

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

    <div class="row">

      <div class="col-md-1"></div>
      <div class="col-md-8">
        <div class="card-body mb-4 pt-5 pr-4 pl-4" id="what">
          <div class="card-title">
            <form action="/addPost" method="post">
              @csrf
              <textarea name="post" id="post" cols="" rows="2" placeholder="What's on your mind?"></textarea>
            </form>
          </div>
          <div class="card-text text-right">
            <div class="image-upload float-left">
              <label for="file-input">
                <i class="bi bi-image-fill pl-1" id="pic"></i>
              </label>
              <input id="file-input" type="file">
            </div><span><a href="javascript:$('form').submit();" class="btn btn-info disabled" role="button" id="postBtn">Post</a> </span>
          </div>
        </div>
       
        @foreach($searchResults as $sr)
        <div class="card-body bg-light rounded mb-3" id="showPost">
          <div class="card-title"><img class="rounded-circle" width="45" src="{{$sr->profilePic}}" alt="">
            <span> <a href="/profileCheck/{{$sr->userName}}" id="maker">{{$sr->userName}}</a></span><span class="float-right"></span>
            <p class="text-muted small">{{$sr->date}}</p>
            <div class="card-text">
              <h6 id="content">{{$sr->content}}<span>
              </h6>
            </div>
          </div>
          <div class="card-footer">
          @foreach($likedPosts as $LP)
          @if($LP->postID==$sr->postID)
            <i class="bi bi-hand-thumbs-up-fill like" id="like" data-id="{{$sr->postID}}"> {{$sr->totalLikes}}</i>
            @break
            @endif
            @endforeach
          </div>
          <i class="bi bi-hand-thumbs-up like" id="like" data-id="{{$sr->postID}}"> {{$sr->totalLikes}}</i>
        </div>
        @endforeach

        @foreach($questionPosts as $qP)
        <div class="card-body bg-light rounded mb-3" id="qa">
          <div class="card-title">
            <h6>{{$qP->question}} <span class="text-muted small float-right">Anonymous</span>
            </h6>
          </div>
          <hr>
          <div class="card-text">
            <img class="rounded-circle" width="45" src="{{$qP->profilePic}}">
            <span> <a href="" id="reply">{{$qP->userName}}</a></span>
            <p> {{$qP->answer}}</p>
          </div>
          <div class="card-footer">
            <a href="#" class="card-link" id="up"><i class="bi bi-hand-thumbs-up" id="like"></i> Up</a>
            <a href="#" class="card-link" id="down"><i class="bi bi-hand-thumbs-down" id="dislike"></i> Down</a>
            <span class="float-right">
              <a href="#" class="card-link"><i class="bi bi-share"></i> Share on Facebook</a>
            </span>
          </div>
        </div>
        @endforeach
      </div>
      @foreach($myProfile as $mP)
      <div class="col-md-2">
        <div class="card p-4" id="mycard">
          <img src="{{$mP->profilePic}}" class="rounded-circle img-thumbnail" alt="..." />
          <div class="card-body">
            <a href="/profile">
              <h5 class="card-title text-center" id="userName">{{$mP->userName}}</h5>
            </a>
            <p class="card-text text-center">
            {{$mP->bio}}
            </p>
            <center><a href="#!" class="text">Followers:<br>50.5k</a></center>
            <br>
            <center> <a href="#!">Following:<br>28k</a></center>
          </div>
        </div>
      
      </div>
      @endforeach

    </div>
  </div>
  </div>
</body>

</html>