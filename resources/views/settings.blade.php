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
    <link rel="stylesheet" href="/css/signup.css">
    <script src="js/settings.js"></script> 
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
        <div class="row px-3 py-3">
                <div class="col-md-3" ></div>
                <div class="col-md-6 mb-5 p-3 rounded" id="bg2">
                    
                    <center><h3>Settings</h3></center>
                    <hr/>
                    @foreach($searchResults as $sr)
                    <form action="/updateUser" id="form" method="post">
                    @csrf
                        <table>
                            <td>
                            <tr>
                                <input type="text" name="name1" id="Fname" class="f myname" value= "{{$sr->firstName}}"> 
                                <span class="spann"><input type="text" name="name2" id="Lname" class="f myname"value= "{{$sr->lastName}}"></span>
                                <div style="overflow: hidden;">
                                    <p class="text-muted small" id="nameError" style="float:left"></p>
                                    <p class="text-muted small" id="nameError2"></p>
                                </div>
                            </tr></td>
                            <td>
                            <tr>
                            
                                <input type="text" name="uname" id="Uname" class="f" value= "{{$sr->userName}}">
                                <span class="spann"><input type="date" name="dob" id="DOB" class="f"value= "{{$sr->dob}}"></span>
                                <div style="overflow: hidden;">
                                    <p class="text-muted small" id="UserError" style="float:left"></p>
                                    <p class="text-muted small" id="dateError"></p>
                                </div>
                            </tr></td>
                            <td>
                            <tr>
                                <input type="email" name="email" id="email" class="f" value= "{{$sr->email}}">
                                <p class="text-muted small" id="emailError"></p>
                            </tr></td>
                            <td><tr>
                                <textarea name="bio" form="form" id="bio" cols="30" rows="3" >{{$sr->bio}}</textarea>
                            </tr></td>
                            <td><tr>
                        
                        <br>
 
                        <td><tr>
                            <div class="image-upload">
                                <label for="file-input">Change Profile Picture:
                                    <i class="bi bi-image-fill pl-1" id="addp"></i>
                                  </label>
                                
                                  <input id="file-input" type="file"> </div>
                        </tr></td>
                        
                    </td>
                    <br>
                    
                        <td>
                            <tr>
                                <center><a href="javascript:$('form').submit();" <button type="button-center" class="btn btn-success" id="saveBtn">Save</button></a></center>
                            </tr></td>
                            <hr>
                        <td>
                        <tr>
                            <a href="/changePass" class="btn btn-info" role="button">Change Password</a>
                        </tr></td>
                        <br><br>
                        <td><tr>
                        <a href="/deactivate" class="btn btn-info" role="button">Delete Account</a>
                      
                    </td></tr>
                        <br>
                        <br>
                    </table>

                </form>
                @endforeach
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
