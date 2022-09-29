<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6sudo chown -R usernameE9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>
<body>
     <div class="container">
         <div class="row mt-5 d-flex justify-content-center">
             <div class="col-sm-12 col-md-12 col-xs-12 col-lg-8 col-xl-8 d-flex justify-content-center">
                 <div class="card w-100 mt-5">
                     <div class="d-flex justify-content-center mt-3">
                      <img class="mt-5" width="170px" height="50px" src="images/logo.png">
                     </div>
                     <div class="card-body">
                        <form method="POST" action="/login">
                          @csrf
                          @if($errors->any())
                          <div class="error ml-4" style="color:red; margin-bottom:10px;font-family:Muli">{{$errors->first()}}</div>
                          @endif
                            <div class="col-auto">
                                <div class="input-group mb-2 mt-4">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text" style="color:rgb(115, 193, 230)"><i class="bi bi-envelope-fill"></i></div>
                                  </div>
                                  <input type="email" class="form-control placeHolder" name="email" id="inlineFormInputGroup" placeholder="Email">
                                </div>
                                <div class="input-group mt-4">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text" style="color:rgb(115, 193, 230)"><i class="bi bi-key-fill"></i></div>
                                    </div>
                                    <input type="password" name ="password" class="form-control placeHolder" id="inlineFormInputGroup" placeholder="Password">
                                </div>
                            <button type="submit" class="mt-5 mb-5 btn btn-primary btn-block loginButton" 
                            >
                            Login</button>
                          </form>
                     </div>
                   </div>
             </div>
        </div>
     </div>
     
    



</body>
</html>