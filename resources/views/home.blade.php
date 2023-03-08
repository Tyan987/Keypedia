<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body style="background-color: #79A3B1" class="w-100 d-flex justify-content-center flex-column align-items-center">
    <header class="w-100">
      <nav class="navbar navbar-light navbar-expand-lg w-100" style="background-color: #456268">
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
    
    <div style="margin-top: 3vh; margin-bottom: 15vh" class="w-75 h-75">
      <h3 class="mb-3 text-center fs-1" style="padding-top: 2vh; color: #456268">Welcome to Keypedia</h3>
      <h4 class="mb-3 text-center fs-5" style=" color: #456268">Best Keyboard and Keycaps Shop</h4>
  
      <h3 class="mb-3 text-center fs-2" style="padding-top: 4vh; color: #456268">Categories</h3>
  
      <div class="card-deck d-flex justify-content-center w-100 flex-wrap">
        @foreach ($categories as $cat)
        <div class="card mb-3 m-3 text-center fs-4" style="background-color: #D0E8F2; width:30%; border-radius: 25px">
          <a href="/viewKeyboard/{{$cat->id}}" style="text-decoration: none">
            <div class="card-header" style="color: #456268">{{$cat->name}}</div>
            <div class="card-body">
              <img class="card-img-top" src="{{ Storage::url($cat->image)}}" alt="IMG not found" style="border-radius: 15px">
            </div>
          </a>
        </div>
        @endforeach
      </div>   
    </div>
    
    
    <footer class="flex-shrink-0 text-center text-lg-start w-100">
      <div class="text-center text-white-50 py-3" style="background-color: #456268">
          Made By Keypedia CEO-ES - 2021
      </div>
    </footer>

</body>
</html>