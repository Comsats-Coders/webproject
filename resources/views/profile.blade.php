<!DOCTYPE html><html>
    <head>
        <title>PUCHOO -Login or sign up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{asset('/css/profile.css')}}">
        <script src="{{asset('/js/profile.js')}}"></script>
        
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
        <div class="row py-5 px-4">

            <div class="col-md-9">
                @foreach($profileData as $pd)
                <div class="shadow rounded">
                    <div class="px-4 pt-0 pb-4 cover">
                        <div class="media align-items-end profile-head">
                            <div class="profile mr-3"><img src="{{$pd->profilePic}}" alt="Cover Pic" 
                                 class="rounded-circle mb-2" id="Ppic"><a href="/settings" class="btn btn-block">Edit Profile</a></div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0">{{$pd->userName}}</h4>
                                <p class="small mb-4"> <i class="bi bi-geo-alt-fill"></i>{{$pd->country}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 d-flex justify-content-end text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <h5 class="text-white mb-0 d-block">30.1k</h5><small class="text-muted">Likes</small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="text-white mb-0 d-block">7.5k</h5><small class="text-muted">Followers</small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="text-white mb-0 d-block">140</h5><small class="text-muted">Following</small>
                            </li>
                        </ul>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="text-white">Bio</h5>
                        <div class="pl-0 rounded" id="bio">
                            <p class="font-italic mb-0">{{$pd->bio}}
                            <span class="float-right"><i class="bi bi-images" id="galIcon"></i></span></p>
                            
                        </div>
                    </div>
                    @endforeach
   
    
                    @foreach($questionPosts as $qp)
                    <div class="card-body bg-white rounded m-4" id="qa">
                    
                        <div class="card-title">
                            <h6>
                                {{$qp->question}}<span class="text-muted small float-right">Anonymous</span>
            
                            </h6>
                        </div>
                        <hr>
                        <div class="card-text">
                            <img class="rounded-circle" width="45" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="">
                            <span> <a href="/profileCheck/{{$qp->userName}}" id="reply">{{$qp->userName}}</a></span>
                            <p>{{$qp->answer}}</p>
                        </div>
                        <div class="card-footer">
                            <span class="float-right">
                                <a href="#" class="card-link"><i class="bi bi-share"></i>  Share on Facebook</a>
                                <br>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
               
            </div>

            <div class="col-md-3" id="gal">
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-white mb-0">Recent photos</h5><a href="#" class="btn btn-success">Show all</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                        <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                        <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                        <div class="col-lg-6 pl-lg-1"><img src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                    </div>
                </div>
    
            </div>
        </div>
    </body>
    </html>