<nav>
    <div class="bg-dark d-flex justify-content-center">
        <ul class="nav">
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('/')}}">Home
                    <img class="ml-1 mb-1" src="{{asset(url('img/home.svg'))}}" alt=""></a></li>
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('news')}}">News
                    <img class="ml-1 mb-1" src="{{asset(url('img/news.svg'))}}" alt=""></a></li>
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('sale')}}">Sale
            <img class="ml-1 mb-1" src="{{asset(url('img/sale.svg'))}}" alt=""></a></li>
        @if(Auth::check() && !Auth::user()->isAdmin)
                <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-light" href="{{url('favourites')}}">Favourites
                        <img class="ml-1 mb-1" src="{{asset(url('img/star.svg'))}}" alt=""></a></li>
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
            <li><div class="nav-link m-1 mr-3 ml-3"><div class="text-decoration-none text-light dropdown-toggle"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">Categories
                    <img class="ml-1 mb-1" src="{{asset(url('img/grid.svg'))}}" alt=""></div>
                <div class="mt-2 dropdown-menu bg-dark">
                    @if(count($categories)>0)
                        @foreach($categories as $c)
                            <a class="d-block p-1 bg-dark text-decoration-none dropdown-item text-light" href="{{url('category', $c->id)}}">
                                <img class="mr-1 mb-1" src="{{asset('img/'.strtolower($c->name).'.svg')}}" alt="">{{$c->name}}
                                </a>
                        @endforeach
                    @endif
                    <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{url('category')}}">
                        <img class="mr-1 mb-1" src="{{asset('img/viral.svg')}}" alt="">All Categories</a>

                </div>
            </div></li>
        </ul>
    </div>
</nav>
