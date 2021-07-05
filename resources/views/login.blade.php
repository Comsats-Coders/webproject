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
<link rel="stylesheet" href="/css/login.css"> 
<script src="/js/login.js"></script> 
</head>

<body>
<div class="container ">

<div class="row py-3 px-3"> 
    <div class="col-md-7" id="logo" style="text-align: center;">
        <img src="{{asset('images/logoFF.png')}}" width="280px" height="250px" alt="Logo" style="object-fit:contain">    
    </div>
    
<div class="col-md-4 mt-5 mb-5 pt-5 pb-5 rounded shadow" id="bg2"; >
    <h3>Login</h3>
    <form action="/login" id="form" method="post">
    @csrf
      <table>
            <td>
            <tr>
                <input type="text" name="Uname" id="name" class="username" placeholder="Username" onkeypress="noSpace(event)" onkeyup="userField()">
            </tr></td>
            <br>
            <br>
            <td>
            <tr>
                <input type="password" name="password" id="pass" placeholder="Password" onkeyup="passField()">
            </tr></td>
            <br>
            <br>
            <td>
            <tr>
                <center><a href="javascript:$('form').submit();" class="btn btn-info disabled" role="button" id="LogBtn" aria-disabled="true">Log in</a></center>
                <?php
            if (empty($error)){}
            else{echo $error; } 
        ?> 
            </tr></td>
            <td>
            <tr>
                <center><a href="/forgot" class="forget">Forgot password?</a></center>
            </tr></td>
            <br>
            <td>
            <tr><center>
                
                <i class="bi bi-facebook" id="fb"></i>
                <i class="bi bi-google" id="g"></i></center>
                
            </tr>
            </td>
            <hr class="line">
            <td>
            <tr>
                <center><a href="/signup" class="btn btn-info" role="button" id="newBtn">Create New Account</a></center>
            </tr></td>
            <br>
        </table>
    </form>
    
</div>
</div>
</div>
<div class="container-fluid p-0">
    <footer class="page-footer font-small" style="background-color: #4A4A50;">
        <div class="footer-copyright text-center py-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-github"></i></a>
            <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
          <div><a href="" style="color: #ee1144;">The A-team</a></div>
          <p class="text-white">© 2020 Copyright</p>
        </div>
      </footer>
</div>

</body>
</html>
