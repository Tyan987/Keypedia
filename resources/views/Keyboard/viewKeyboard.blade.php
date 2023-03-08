<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>View Keyboard Page</title>
</head>
<body style="background-color: #79A3B1" class="w-100 d-flex justify-content-center flex-column align-items-center">
  <header class="w-100">
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
    
    <div style="margin-top: 3vh; margin-bottom: 20vh" class="w-75 h-75">
        <h3 class="mb-3 text-center fs-2" style="padding-top: 3vh; color: #456268">
          @foreach ($keyboard as $keyB)
              {{$keyB->categories->name}}
              @break
          @endforeach
        </h3>
        <hr>

        <div class="row mb-4">
          <div class="col-sm-4">
            <form class="d-flex" action="/search">
              <input class="form-control me-1" name="search" type="search" placeholder="Search..." style="background-color: #FCF8EC" aria-label="Search">
              
              <div class="col-sm-3 ms-1">
                <select name="filter" id="datalistOptions" class="py-2 px-2 "style="background-color: #FCF8EC; border-radius: 20px">
                        <option name="filter" value="Name">Name</option>
                        <option name="filter" value="Price">Price</option>
                </select>
              </div>

              <button class="btn btn-outline-success" type="submit" style="background-color: #D0E8F2">Search</button>
            </form>
          </div>
        </div>

        <div class="card-deck d-flex justify-content-center w-100 flex-wrap">
          @foreach ($keyboard as $keyB)
          <div class="card mb-3 m-3 text-center h-100 py-3 px-3" style="color: #456268; background-color: #D0E8F2; width:30%; border-radius: 25px">
              <a href="/keyboardDetail/{{$keyB->id}}" style="text-decoration: none">
              <img class="card-img-top" src="{{ Storage::url($keyB->image)}}" alt="IMG not found" style="border-radius: 15px">
              
              <div class="card-body">
                  <hr>

                  @if(!Auth::check() || Auth::user()->role == 'user')
                    <h5 class="card-title" style="color: #456268">{{$keyB->name}}</h5>
                    <p class="card-text" style="color: #456268"> US$ {{$keyB->price}}</p>

                  @elseif(Auth::user()->role == 'manager')
                    <h5 class="card-title" style="color: #456268">{{$keyB->name}}</h5>
                    <p class="card-text" style="color: #456268"> US$ {{$keyB->price}}</p>

                    <div class="d-grid gap-2 ">
                      <a class="btn btn-primary" type="button" style="background-color: #456268" href="/deleteKeyboard/{{$keyB->id}}">Delete Keyboard</a>
                      <a class="btn btn-primary" type="button" style="background-color: #456268" href="/updateKeyboard/{{$keyB->id}}">Update Keyboard</a>
                    </div>
                  @endif    
                </a>
              </div>
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