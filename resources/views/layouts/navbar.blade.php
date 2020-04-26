<nav>
    <div class="bg-dark d-flex justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav">
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('/')}}">Home
                    <img class="ml-1 mb-1" src="{{asset(url('img/home.svg'))}}" alt=""></a></li>
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('news')}}">News
                    <img class="ml-1 mb-1" src="{{asset(url('img/news.svg'))}}" alt=""></a></li>
{{--            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('sale')}}">Sale--}}
{{--                    <img class="ml-1 mb-1" src="{{asset(url('img/sale.svg'))}}" alt=""></a></li>--}}
        @if(Auth::check() && !Auth::user()->isAdmin)
{{--                <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('favourites')}}">Favourites--}}
{{--                        <img class="ml-1 mb-1" src="{{asset(url('img/star.svg'))}}" alt=""></a></li>--}}
                <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('basket')}}">
                        Basket <img class="ml-1 mb-1" src="{{asset(url('img/cart.svg'))}}" alt="">
                    </a></li>
               @endif
            @guest
                <li class="nav-item m-1 mr-3 ml-3">
                    <a class="nav-link text-light" href="{{ url('login') }}">{{ __('Login') }}
                        <img class="ml-1 mb-1" src="{{asset(url('img/login.svg'))}}" alt=""></a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item m-1 mr-3 ml-3">
                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}
                            <img class="ml-1 mb-1" src="{{asset(url('img/add.svg'))}}" alt=""></a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown  m-1 mr-3 ml-3">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                        <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <img class="ml-1 mb-1" src="{{asset(url('img/logout.svg'))}}" alt="">
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <div class="Drop nav-link m-1 mr-3 ml-3"><div class="text-decoration-none text-light dropdown-toggle">Categories
                    <img class="ml-1 mb-1" src="{{asset(url('img/grid.svg'))}}" alt=""></div>
                <div class="Drop-menu mt-2">
                    @if(count($categories)>0)
                        @foreach($categories as $c)
                            <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{url('category', $c->id)}}">
                                <img class="mr-1 mb-1" src="{{asset('img/'.strtolower($c->name).'.svg')}}" alt="">{{$c->name}}
                                </a>
                        @endforeach
                    @endif
                    <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{url('category')}}">
                        <img class="mr-1 mb-1" src="{{asset('img/viral.svg')}}" alt="">All Categories</a>

                </div>
            </div>
        </ul>
    </div>
</nav>
