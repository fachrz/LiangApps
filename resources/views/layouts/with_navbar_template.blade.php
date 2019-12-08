<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('pageTitle')</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ptk-navbar-wrapper">
        <a class="navbar-brand" href="{{ url('/') }}">Liang Apps</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if (Session::get('status') == 'admins')
                <li class="nav-item">
                    <button type="button" class="navlink btn btn-primary" data-toggle="modal" data-target="#AppInsertmodal">Publish Application</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Session::get('adminname') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
                @elseif (Session::get('status') == 'users')
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Session::get('usersname') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                @endif
                
            </ul>
        </div>
    </nav>

    <!-- Modal -->
<div class="modal fade" id="AppInsertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publish Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="app-name">Application Name</label>
            <input type="text" name="app-name" class="form-control app-name" aria-describedby="emailHelp" placeholder="Nama Aplikasi">
        </div>
        <div class="form-group">
            <label for="developer-name">Nama Developer</label>
            <input type="text" name="developer-name" class="form-control developer-name" placeholder="Developer">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="freecheck">
            <label class="form-check-label" for="freecheck">Make it Free</label>
        </div>
        <div class="form-group">
            <label for="app-price">Price</label>
            <input type="text" name="app-price" class="form-control app-price" placeholder="Taruh Harga">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary publishapp-btn" data-dismiss="modal">Publish</button>
      </div>
    </div>
  </div>
</div>

    @yield('content')

    <!-- JavaScript Library -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')

</body>

</html>