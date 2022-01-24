<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="s1()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <a href="{{ url('/') }}" class="text-dark text-decoration-none h2">
                        <img src="/pictures/baner.jpg" width="70px" height="70px"/>
                        {{ config('app.name') }}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                        <form class="form-inline ml-5 mb-2" action="/search/sea" method="get">
						<div class="input-group">
        					<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-search"></i></div>
							</div>
							<input class="form-control" oninput="zmien()" type="search" size="55" name="szukaj" id="szukaj" placeholder="Wpisz tytuł gry, kategorie lub cokolwiek innego" autocomplete="off"><button onclick="usun()" class="btn btn-dark input-group-text d-none" type="reset" id="clear"><i class="fas fa-times"></i></button>
                            <div class="input-group-prepend">
                                <button class="btn btn-dark input-group-text" type="submit">Szukaj</button>
                            </div>
                        </div>
                        </form>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <a href="{{route('sell.view')}}" class="nav-item nav-link btn btn-dark text-white mr-3">Sprzedaj grę</a>
                        <a href="{{route('cart.view')}}" class="nav-item nav-link mr-3"><i class="fas fa-shopping-cart" style="font-size:1.5em;"></i> @if(session()->get('cart') != null) <span class="rounded-circle p-1 h7 bg-danger text-white">{{count(session()->get('cart'))}}</span>@endif</a>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Utwórz konto') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true" class=""></i>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                    <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('settings.view')}}">{{ __('Moje konto') }}</a>
                                        <a class="dropdown-item" href="{{route('his.view')}}">{{ __('Moje zakupy') }}</a>
                                        @if(Auth::user()->is_admin == true)
                                            <a href="{{route('admin.view')}}" class="dropdown-item">Widok administratora</a> 
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Wyloguj') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox" style="box-shadow: 5px 5px 20px;">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/pictures/a1.jpg" width="1000px" height="600px" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/pictures/a2.jpg" width="1000px" height="600px" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/pictures/a3.jpg" width="1000px" height="600px" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span aria-hidden="true"><i class="fas fa-chevron-circle-left fa-3x"></i></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span aria-hidden="true"><i class="fas fa-chevron-circle-right fa-3x"></i></span>
      <span class="sr-only">Next</span>
    </a>
    
  </div>
  <div class="fixed-bottom mb-3">
    <button class="btn btn-dark float-right mr-3 rounded-circle" id="upbtn" type="button" title="W górę"><i class="fas fa-angle-up fa-2x"></i></button>
  </div>
  <script>
            function dispBtn()
            {
                var go_up = document.getElementById("upbtn");

                if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) 
                {
                    go_up.style.display = "block";
                } 
                
                else 
                {
                    go_up.style.display = "none";
                }
            }

            window.onscroll = function()
            {
                dispBtn()
            };

    </script>
        <script>
            $("#upbtn").click(function(){    
                $('html').animate({scrollTop:0}, 500);
            });
        </script>
        <main class="py-4">
            @yield('content')
        </main>
        

        <script>
            function zmien(){
                var text = document.getElementById('szukaj').value;
                var but = document.getElementById('clear');
                if(text != "")
                    but.classList.remove("d-none");
                else
                    but.classList.add("d-none");
            }
            function usun(){
                var but = document.getElementById('clear');
                but.classList.add("d-none");
            }
        </script>
        <script>
            
            function delete_row(name)
            {
                $.ajax({
                    url: "users-view.blade.php",
                    type: "get",
                    data: "name="+name,
                    success: function(data)
                    { 
                       if(data==1)
                       {
                            $("#row" + name).remove();
                            setTimeout(() => {
                                sleep()
                            }, 100);
                       }
                       else
                       {
                           alert("Błąd serwera. Przepraszamy");
                       }
                    }
                });
            }

            function delete_row1(title)
            {
                $.ajax({
                    url: "products-view.blade.php",
                    type: "get",
                    data: "title="+title,
                    success: function(data)
                    { 
                       if(data==1)
                       {
                            $("#row" + title).remove();
                            setTimeout(() => {
                                sleep()
                            }, 100);
                       }
                       else
                       {
                           alert("Błąd serwera. Przepraszamy");
                       }
                    }
                });
            }

            function delete_row2(name)
            {
                $.ajax({
                    url: "categories-view.blade.php",
                    type: "get",
                    data: "name="+name,
                    success: function(data)
                    { 
                       if(data==1)
                       {
                            $("#row" + name).remove();
                            setTimeout(() => {
                                sleep()
                            }, 100);
                       }
                       else
                       {
                           alert("Błąd serwera. Przepraszamy");
                       }
                    }
                });
            }
    function delete_row1(id)
    {
        $.ajax({
            url: "cart.blade.php",
            method: "get",
            data: "id="+id,
            success: function(data)
            { 
                if(data==1)
                {
                    $("#row" + id).remove();
                    setTimeout(() => {
                        sleep()
                    }, 100);
                }
                else
                {
                    alert("Błąd serwera. Przepraszamy");
                }
            }
        });
    }
    </script>
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
