<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Keyboard Detail Page</title>
</head>
<body style="background-color: #79A3B1">
  <header>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #456268">
      <div class="container-fluid">
      <a class="navbar-brand ms-5 fs-4 text-white fw-bold" href="/">KEYPEDIA</a>
        <div class="d-flex align-items-center me-5 text-white">

          @if (!Auth::check())
            <a class="nav-link text-decoration-none text-white" href="/login">Login</a>
            <a class="nav-link text-decoration-none text-white" href="/register">Register</a>

          @else
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FCF8EC">
                      @foreach ($categories as $cat)
                          <a class="dropdown-item" href="/viewKeyboard/{{$cat->id}}">{{$cat->name}}</a>
                      @endforeach
                    </ul>
                  </li>
                </ul>
            </div>
          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            @if(Auth::user()->role == 'manager')
              <div class="collapse navbar-collapse" id="navbarDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manager
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FCF8EC">
                        <li><a class="dropdown-item" href="/addKeyboard">Add Keyboard</a></li>
                        <li><a class="dropdown-item" href="/manageCategory">Manage Categories</a></li>
                        <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
              </div>

            @elseif(Auth::user()->role == 'user')
              <div class="collapse navbar-collapse" id="navbarDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->username}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FCF8EC">
                      <li><a class="dropdown-item" href="/myCart/{{Auth::user()->id}}">My Cart</a></li>
                      <li><a class="dropdown-item" href="/transactionHistory/{{Auth::user()->id}}">Transaction History</a></li>
                      <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                      <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
            @endif     
          @endif 

          {{ date('D, d-M-Y') }}
        </div>
      </div>
    </nav>
  </header>


  <div style="background-color: #D0E8F2; margin-left: 25vw; margin-top: 10vh; border-radius: 25px" class="w-50 h-75 py-4 px-1">
    <h4 class="mb-3 d-flex justify-content-center" style="color: #456268">Detail Keyboard</h4>
    <hr>

        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">

              @if(!Auth::check() || Auth::user()->role == 'user')

                <div class="col-md-6 col-lg-4 col-xl-4">
                    <img src="{{ Storage::url($keyboard->image)}}" class="card-img-top" alt="IMG not found" style="width: 350px; border-radius: 15px">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <h4>{{$keyboard->name}}</h4>
                    <h5>${{$keyboard->price}}</h5>
                    <p>{{$keyboard->description}}</p>
                    <form action="/addToCart/{{$keyboard->id}}" method="POST">
                      @csrf
                      <div class="form-outline mb-2 d-flex">
                        <label for="inputQuantity" class="col-form-label text-end">Quantity</label>
                        <div class="col-sm-6 ms-2 mb-2">
                            <input class="form-control" id="inputQuantity" name="quantity" aria-describedby="inputQuantity" style="background-color: #FCF8EC">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary d-flex justify-content-center" style="background-color: #456268">Add to Cart</button>
                    </form>
                </div>
    
              @elseif(Auth::user()->role == 'manager')
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <img src="{{ Storage::url($keyboard->image)}}" class="card-img-top" alt="IMG not found" style="width: 350px; border-radius: 15px">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <h4>{{$keyboard->name}}</h4>
                    <h5>$ {{$keyboard->price}}</h5>
                    <p>{{$keyboard->description}}</p>
                </div>
              @endif   
           </div>
        </div>  
    
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