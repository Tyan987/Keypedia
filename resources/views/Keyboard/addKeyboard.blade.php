<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Add Keyboard Page</title>
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


    <div style="background-color: #D0E8F2; margin-left: 25vw; margin-top: 15vh; margin-bottom: 25vh; border-radius: 25px" class="w-50 h-75 ">
        <h4 class="mb-3" style="margin-left: 2vw; padding-top: 2vh; color: #456268">Add Keyboard</h4>
        <hr>

        <form action="/addKeyboard" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="inputCategory" class="col-sm-4 col-form-label text-end">Category</label>
                <div class="col-sm-5 ms-2">
                    <select name="category" id="datalistOptions" class="py-2 px-2 w-100" style="background-color: #FCF8EC; border-radius: 5px">
                        @foreach ($categories as $cat)
                            <option name="category" value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputKeyboardName" class="col-sm-4 col-form-label text-end">Keyboard Name</label>
                <div class="col-sm-5 ms-2">
                    <input class="form-control" style="background-color: #FCF8EC" id="inputKeyboardName" name="name" aria-describedby="inputKeyboardName">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputKeyboardPrice" class="col-sm-4 col-form-label text-end">Keyboard Price ($)</label>
                <div class="col-sm-5 ms-2">
                    <input class="form-control" id="inputKeyboardPrice" aria-describedby="inputKeyboardPrice" name="price" style="background-color: #FCF8EC">
                </div>
            </div>

            <div class="row mb-2">
                <label for="inputDescription" class="col-sm-4 col-form-label text-end">Description</label>
                <div class="col-sm-5 ms-2">
                    <textarea class="form-control" id="textareaDescription" style="background-color: #FCF8EC" name="description" aria-describedby="textareaDescription" ></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputKeyboardImage" class="col-sm-4 col-form-label text-end">Keyboard Image</label>
                <div class="col-sm-5 ms-2">
                    <input class="form-control" type="file" style="background-color: #FCF8EC" name="image" id="formFile">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-5 mb-5 ms-2">
                    <button type="submit" class="btn btn-primary" style="background-color: #456268">Add</button>
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