    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/products') }}">
                {{ config('app.name', 'Irene') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="/products">Products<span class="sr-only"></span></a>
                        </li>

                        @if(!Auth::guest())
                            <li class="nav-item">
                            <a class="nav-link" href="/products/create/">Create Product</a>
                            </li>
                        @endif

                        <form class="form-inline my-2 my-lg-0" action="{{ route('search')}}" method="GET">
                                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" value="">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                     
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
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