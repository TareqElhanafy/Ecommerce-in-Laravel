<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
            <li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>

           <li><a href="{{ url('locale/ar') }}" ><i class="fa fa-language"></i> AR</a></li>
                      <li>
                    <a href="{{route('notification')}}" class="nav-link">
                     <span class="badge">
                       @auth
                       {{auth()->user()->unReadNotifications->count()}}
                       unread Notification
                       @endauth
                     </span>
                    </a>

                      </li>
                      @auth
                      @if(auth()->user()->isAdmin())
                      <li class=" nav-item {{(request()->is('products'))?'active':''}}">

                      <a href="{{route('products.index')}}" class="nav-link">
                        {{ __('messages.products')    }}
                      </a>
                    </li>
                    @endif
                    @endauth
                    @auth
                    <li class=" nav-item {{(request()->is('products'))?'active':''}}">

                    <a href="{{route('userproducts')}}" class="nav-link">
                      {{__('messages.yourproducts')}}
                    </a>
                  </li>
                  @endauth

@auth
                      <li class="nav-item {{(request()->is('products/create'))?'active':''}} ">

                      <a href="{{route('products.create')}}" class="nav-link">
                        New Product
                      </a>
                    </li>
                    @else
                    <li class="nav-item {{(request()->is('login'))?'active':''}} ">

                    <a href="{{route('login')}}" class="nav-link">
                      Sign in to sell your product
                    </a>
                  </li>
@endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@if(session()->has('success'))
<div class="alert alert-success">
 {{session()->get('success')}}
</div>
@endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
