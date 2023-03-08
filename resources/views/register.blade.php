<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Register Page</title>
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

    <div style="background-color: #D0E8F2; margin-left: 25vw; margin-top: 15vh; margin-bottom: 15vh; border-radius: 25px" class="w-50 h-75">
        <h4 class="mb-3 d-flex justify-content-center" style="padding-top: 2vh; color: #456268">Register</h4>
        <hr>

        <form action="/register" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="inputUsername" class="col-sm-4 col-form-label text-end">Username</label>
                <div class="col-sm-5 ms-2">
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="validationUsername">@</span>
                        <input type="text" class="form-control" id="validationUsername" name="username" aria-describedby="validationUsername" style="background-color: #FCF8EC" >
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-4 col-form-label text-end">E-Mail Address</label>
                <div class="col-sm-5 ms-2">
                    <input type="email" class="form-control" name="email" style="background-color: #FCF8EC" id="inputEmail" aria-describedby="inputEmail">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-4 col-form-label text-end">Password</label>
                <div class="col-sm-5 ms-2">
                    <input type="password" class="form-control" name="password" style="background-color: #FCF8EC" id="inputPassword" name="password" aria-describedby="inputPassword">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputConfPassword" class="col-sm-4 col-form-label text-end">Confirm Password</label>
                <div class="col-sm-5 ms-2">
                    <input type="password" class="form-control" style="background-color: #FCF8EC" id="inputConfPassword" name="confPassword" aria-describedby="inputConfPassword">
                </div>
            </div>

            <div class="row mb-2">
                <label for="inputAddress" class="col-sm-4 col-form-label text-end">Address</label>
                <div class="col-sm-5 ms-2">
                    <textarea class="form-control" id="textareaAddress" name="address" style="background-color: #FCF8EC"  aria-describedby="textareaAddress" ></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputGender" class="col-sm-4 col-form-label text-end">Gender</label>
                <div class="col-sm-5 ms-2 d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadiosMale" style="background-color: #456268" value="male" checked>
                        <label class="form-check-label me-3" for="gridRadiosMale">
                            Male 
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadiosFemale" style="background-color: #456268" value="female">
                        <label class="form-check-label" for="gridRadiosFemale">
                            Female
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <label for="inputDOB" class="col-sm-4 col-form-label text-end">Date of Birth</label>
                <div class="col-sm-5 ms-2">
                    <input type="date" class="form-control" name="date_of_birth" style="background-color: #FCF8EC; color: #456268" id="inputDOB" aria-describedby="inputDOB">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5"></div>
                <div class="col-sm-5 mb-5 ms-1">
                    <button type="submit" class="btn btn-primary" style="background-color: #456268">Register</button>
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

    <footer class="flex-shrink-0 text-center text-lg-start">
        <div class="text-center text-white-50 py-3" style="background-color: #456268">
            Made By Keypedia CEO-ES - 2021
        </div>
    </footer>
    
</body>
</html>