<nav>
    <div class="bg-dark d-flex justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav">
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-warning" href="{{url('/')}}">Home</a></li>
            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-warning" href="{{url('news')}}">News</a></li>
{{--            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-warning" href="{{url('favourites')}}">Favourites</a></li>--}}
{{--            <li class="nav-link m-1 mr-3 ml-3"><a class="text-decoration-none text-warning" href="{{url('basket')}}">Basket</a></li>--}}
            @guest
                <li class="nav-item m-1 mr-3 ml-3">
                    <a class="nav-link text-warning" href="{{ url('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item m-1 mr-3 ml-3">
                        <a class="nav-link text-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown  m-1 mr-3 ml-3">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                        <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{ route('logout') }}"
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
            <div class="Drop nav-link m-1 mr-3 ml-3"><div class="text-decoration-none text-warning dropdown-toggle">Categories</div>
                <div class="Drop-menu mt-2">
                    @if(count($categories)>0)
                        @foreach($categories as $c)
                            <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{url('category', $c->id)}}">{{$c->name}}</a>
                        @endforeach
                    @endif
                    <a class="Item d-block p-1 bg-dark text-decoration-none text-light" href="{{url('category')}}">All Categories</a>

                </div>
            </div>
        </ul>
    </div>
</nav>
