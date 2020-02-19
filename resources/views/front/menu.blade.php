<header>
    <div class="header-block d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="header-left d-flex flex-column flex-md-row align-items-center">
                        <p class="d-flex align-items-center"><i class="fas fa-envelope"></i>admin@admin.com</p>
                        <p class="d-flex align-items-center"><i class="fas fa-phone"></i>+7 111 111 111</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="header-right d-flex flex-column flex-md-row justify-content-md-end justify-content-center align-items-center">
                        <div class="login d-flex">
                            @guest
                                <a href="{{ route('login') }}"><i class="fas fa-user"></i>Войти</a>
                            @else
                                <a href="{{ route('profile') }}"><i class="fas fa-user"></i>{{ Auth::user()->name }}</a>&nbsp;
                                (
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <small>выйти</small>
                                </a>
                                )
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--        Top menu--}}
    <nav class="navigation d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-2"><a class="logo" href="{{url('/')}}"><img src="{{asset('src/images/logo.png')}}" alt=""></a></div>
                <div class="col-8">
                    <div class="navgition-menu d-flex align-items-center justify-content-center">
                        <ul class="mb-0">
                            <li class="toggleable"><a class="menu-item" href="{{url('/')}}">Главная</a></li>
                            <li class="toggleable"><a class="menu-item" href="{{route('shop')}}">Пицца</a>
                                <ul class="sub-menu">
                                    @forelse($prodCategories as $prodCategory)
                                        <li><a href="{{route('product.category', $prodCategory->id)}}">{{$prodCategory->name}}</a></li>
                                    @empty
                                        <li></li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="toggleable"><a class="menu-item" href="{{route('contact')}}">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="product-function d-flex align-items-center justify-content-end">
                        <div id="cart"><a class="function-icon icon_bag_alt" href="{{route('cart')}}"><span>{{Cart::getTotal() > 0 ? Cart::getTotal() . '₽' : ''}}</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="mobile-menu">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="mobile-menu_block d-flex align-items-center"><a class="mobile-menu--control" href="#"><i class="fas fa-bars"></i></a>
                        <div id="ogami-mobile-menu">
                            <button class="no-round-btn" id="mobile-menu--closebtn">Закрыть</button>
                            <div class="mobile-menu_items">
                                <ul class="mb-0 d-flex flex-column">
                                    <li class="toggleable"> <a class="menu-item active" href="{{url('/')}}">Главная</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
                                    </li>
                                    <li class="toggleable"><a class="menu-item" href="{{route('shop')}}">Пицца</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
                                        <ul class="sub-menu">
                                            @forelse($prodCategories as $prodCategory)
                                            <li><a href="{{route('product.category', $prodCategory->id)}}">{{$prodCategory->name}}</a></li>
                                            @empty
                                            <li></li>
                                            @endforelse
                                        </ul>
                                    </li>
                                    <li class="toggleable"> <a class="menu-item" href="{{route('cart')}}">Корзина</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-login">
                                <h2>Мой профиль</h2>
                                @guest
                                    <a href="{{ route('login') }}">Войти</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Регистрация</a>
                                    @endif
                                @else
                                    <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                                @endguest
                            </div>
                        </div>
                        <div class="ogamin-mobile-menu_bg"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center"><a href="{{url('/')}}"><img src="{{asset('src/images/logo.png')}}" alt=""></a></div>
                </div>
                <div class="col-3">
                    <div class="mobile-product_function d-flex align-items-center justify-content-end">
                        <a class="function-icon icon_bag_alt" href="{{route('cart')}}"></a>
                        <a class="pl-1" href="{{route('cart')}}"><strong>{{Cart::getTotal() > 0 ? Cart::getTotal() . '₽' : ''}}</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
