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
    <link rel="stylesheet" href="{{asset('/css/forgot.css')}}">
    <script src="{{asset('/js/changePass.js')}}"></script> 
</head>
<body>

    <div class="container">

        <div class="row px-3 py-3">
            <div class="col-md-4"></div>
            <div class="col-md-4 mb-5 mt-5 pt-5 pd-5 bg-white rounded" id="bg2">
                
                <center>
                    <h3 class="col-12"><b>Change Password</b></h3>
                    <hr>
                </center>
                <form action="/updatePass" id="form" method="post">
                @csrf
                    <table>
                        <td>
                        <tr>

                            <input type="password" name="current" id="Opass" class="f" placeholder="Old Password">
                        </tr></td>
                        <p class="text-muted small"></p>
                        <td>
                        <tr>
                            <input type="password" name="new" id="pass" class="f" placeholder="Password">
                            <p class="text-muted small" id="passTest"></p>
                        </tr></td>
                        <td></td>
                        <tr>
                            <input type="password" name="matchNew" id="Rpass" class="f" placeholder="Confirm Password">
                            <p class="text-muted small" id="passError"></p>
                        </tr></td>
                        <br>
                        <br>
                        <center><a href="javascript:$('form').submit();" <button type="button-center" class="btn btn-success disabled" id="contBtn">Continue</button></a></center>
                        
                        <?php
            if (empty($error)){}
            else{echo $error; } 
        ?>     
                    </tr></td>

                    </table>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container-fluid p-0">
    <footer class="page-footer font-small" style="background-color: #4A4A50;">
        <div class="footer-copyright text-center py-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-github"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
          <div><a href="" style="color: #ee1144;">The A-team</a></div>
          <p class="text-white">© 2020 Copyright</p>
        </div>
      </footer>
</div>
</body>
</html>