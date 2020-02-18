<!DOCTYPE html>
<html lang="en">
<head>
    <title>МегаПИЦЦА</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="blog, business, clean, clear, cooporate, creative, design web, flat, marketing, minimal, portfolio, shop, shopping, unique">
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/custom_bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/elegant.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/scroll.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/jquery.fancybox.min.css')}}">
    <link rel="shortcut icon" href="{{asset('src/images/shortcut_logo.png')}}">
</head>

<body>

<div id="main">

    @include('front.menu')
    @yield('content')
</div>

<footer>
    <div class="newletter">
        <div class="container">
            <div class="row justify-content-between align-items-center">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-4 text-sm-center text-md-left">
                <div class="footer-logo"><img src="{{asset('src/images/logo.png')}}" alt=""></div>
                <div class="footer-contact">
                    <p>Адрес: Невский пр., Санкт-Петербург</p>
                    <p>Телефон: +7 111-111-111</p>
                    <p>Email: admin@admin.com</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 col-sm-4 text-sm-center text-md-left">
                        <div class="footer-quicklink">
                            <h5>Информация</h5><a href="{{route('contact')}}">Контакты</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 text-sm-center text-md-left">
                        <div class="footer-quicklink">
                            <h5>Дополнительно</h5><a href="login.html">Акции</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('src/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('src/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('src/js/slick.min.js')}}"></script>
<script src="{{asset('src/js/jquery.easing.js')}}"></script>
<script src="{{asset('src/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('src/js/jquery.zoom.min.js')}}"></script>
{{--<script src="{{asset('src/js/parallax.js')}}"></script>--}}
<script src="{{asset('src/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('src/js/numscroller-1.0.js')}}"></script>
<script src="{{asset('src/js/vanilla-tilt.min.js')}}"></script>
<script src="{{asset('src/js/main.js')}}"></script>

@stack('scripts')
</body>
</html>
