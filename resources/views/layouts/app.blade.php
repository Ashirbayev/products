<html>
<head>
    <title>
        Products
    </title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <style>
        body {
            background-color: #f0f4f8;
        }
        .sidebar {
            background-color: #3a3f48;
            height: 100vh;
            padding: 20px;
            color: white;
        }
        .sidebar h5 {
            margin-top: 20px;
        }
        .content {
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            border-bottom: 1px solid #e0e0e0;
        }
        .header h1 {
            color: red;
            font-size: 24px;
        }
        .header .user-info {
            color: #b0b0b0;
        }
        .table-container {
            margin-top: 20px;
        }
        .btn-add {
            background-color: #00bfff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }


        .modal-content {
            background-color: #34495e;
            border: none;
            width: 75%;
            padding: 20px;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-header .btn-close {
            color: #ecf0f1;
        }
        .form-control {
            background-color: #ecf0f1;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .form-select {
            background-color: #ecf0f1;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #00aaff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .add-attribute {
            color: #00aaff;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <img  src="./public/img/Group.png"/>

        <h5>
            Enterprise Resource Planning
        </h5>
        <h5>
            Продукты
        </h5>

        <ul class="navbar-nav ml-auto">

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                </li>
            @endguest
        </ul>
    </div>

    @yield('content')

</div>
</body>
</html>
