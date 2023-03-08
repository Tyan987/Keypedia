<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>
<body style="background-color: #79A3B1">
    <header>
        <nav class="navbar navbar-light" style="background-color: #456268">
            <div class="container-fluid">
            <a class="navbar-brand ms-5 fs-4 text-white fw-bold" href="/">KEYPEDIA</a>
                <div class="d-flex align-items-center me-5 text-white">
                    <a class="nav-link text-decoration-none text-white" href="/login">Login</a>
                    <a class="nav-link text-decoration-none text-white" href="/register">Register</a>
                    {{ date('D, d-M-Y') }}
                </div>
            </div>
        </nav>
    </header>

    <div style="background-color: #D0E8F2; margin-left: 25vw; margin-top: 20vh; border-radius: 25px" class="w-50 h-75">
        <h4 class="mb-3 d-flex justify-content-center" style="padding-top: 2vh; color: #456268">Login</h4>
        <hr><br>


        <form action="/login" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-4 col-form-label text-end">E-Mail Address</label>
                <div class="col-sm-5 ms-2">
                    <input type="email" class="form-control" style="background-color: #FCF8EC" name="email" id="inputEmail" aria-describedby="inputEmail"
                    value={{Cookie::get('email') !== null ? Cookie::get('email') : ""}}>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-4 col-form-label text-end">Password</label>
                <div class="col-sm-5 ms-2">
                    <input type="password" class="form-control" style="background-color: #FCF8EC" name="password" id="inputPassword" aria-describedby="inputPassword">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-5 offset-sm-4">
                    <div class="form-check ms-2">
                        <input class="form-check-input" type="checkbox" id="rememberMe" style="background-color: #456268" name="remember">
                        <label class="form-check-label" for="gridCheck1">Remember Me</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-5"></div>
                <div class="col-sm-5 mb-5 ms-2">
                    <button type="submit" class="btn btn-primary" style="background-color: #456268">Login</button>
                </div>
            </div>
            
        </form>

        @if ($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <footer class="text-center text-lg-start position-absolute bottom-0 start-50 w-100 translate-middle-x">
      <div class="text-center text-white-50 py-3" style="background-color: #456268">
          Made By Keypedia CEO-ES - 2021
      </div>
    </footer>

</body>
</html>