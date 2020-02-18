@extends('front.layout')

@section('content')
    <div class="slider">
        <div class="full-fluid">
            <div class="slider_wrapper">
                @forelse($products as $product)
                    @if($product->discount == 'valid')
                        <div class="slider-block slick-slide" style="background-image: url({{asset('src/images/homepage/background_home.png')}}); width: 1865px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" data-slick-index="0" aria-hidden="false" tabindex="0">
                            <div class="slider-content">
                                <div class="container">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-12 col-md-5 col-xl-6">
                                            <div class="slider-text d-flex flex-column align-items-center align-items-md-start">
                                                <h5 data-animation="fadeInUp" data-delay=".2s">{{$product->category->name}}</h5>
                                                <h1 data-animation="fadeInUp" data-delay=".3s">{{$product->name}}</h1>
                                                <h3 data-animation="fadeInUp" data-delay=".4s">{{$product->price}} ₽</h3><a class="normal-btn" href="{{route('cart.add', $product->id)}}" data-animation="fadeInUp" data-delay=".4s">В корзину</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="slider-img" data-animation="zoomIn" data-delay=".1s"><img src="{{asset('images/' . $product->image)}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="slider-block slick-slide" style="background-image: url({{asset('src/images/homepage/slider_background_2.png')}}); width: 1865px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" data-slick-index="0" aria-hidden="false" tabindex="0">
                        <div class="slider-content">
                            <div class="container">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-12 col-md-5 col-xl-6">
                                        <div class="slider-text d-flex flex-column align-items-center align-items-md-start">
                                            <h1 data-animation="fadeInUp" data-delay=".3s">Пицца</h1>
                                            <h3 data-animation="fadeInUp" data-delay=".4s"></h3><a class="normal-btn" href="#" data-animation="fadeInUp" data-delay=".4s">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="slider-img" data-animation="zoomIn" data-delay=".1s"><img src="{{asset('src/images/homepage/slider_subbackground_1.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
            <div class="benefit-block">
                <div class="container">
                    <div class="our-benefits">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="benefit-detail d-flex flex-column align-items-center"><img class="benefit-img" src="{{asset('src/images/homepage/benefit-icon1.png')}}" alt="">
                                    <h5 class="benefit-title">Бесплатная доставка</h5>
                                    <p class="benefit-describle">При заказе свыше 1000 руб.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="benefit-detail d-flex flex-column align-items-center"><img class="benefit-img" src="{{asset('src/images/homepage/benefit-icon2.png')}}" alt="">
                                    <h5 class="benefit-title">Доставка вовремя</h5>
                                    <p class="benefit-describle">Привезем в течение 1 часа</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="benefit-detail boderless d-flex flex-column align-items-center"><img class="benefit-img" src="{{asset('src/images/homepage/benefit-icon3.png')}}" alt="">
                                    <h5 class="benefit-title">Оплата по карте</h5>
                                    <p class="benefit-describle">Наличными или по карте курьеру</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End slider-->

    <div class="feature-products mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title mx-auto">Популярная  пицца</h1>
                </div>
                <div class="col-12">
                    <div id="tab">
                        <ul class="tab-control">
                            <li><a class="active" href="#tab-0">Все</a></li>
                            @forelse($prodCategories as $prodCategory)
                                <li><a href="#tab-{{$prodCategory->id}}">{{$prodCategory->name}}</a></li>
                            @empty
                            @endforelse
                        </ul>
                        <div id="tab-0">
                            <div class="row no-gutters-sm">
                                @forelse($products as $product)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="product"><a class="product-img" href="{{route('product.details', $product->id)}}"><img src="{{url('images', $product->image)}}" alt=""></a>
                                            <h5 class="product-type">{{$product->category->name ?? ''}}</h5>
                                            <h3 class="product-name">{{$product->name}}</h3>
                                            <h3 class="product-price">{{$product->price}} ₽</h3>
                                            <div class="product-select">
                                                <a href="{{route('cart.add', $product->id)}}"><button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button></a>
                                                <a href="{{route('product.details', $product->id)}}"><button class="round-icon-btn"> <i class="icon_info_alt"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        @forelse($prodCategories as $prodCategory)
                            <div id="tab-{{$prodCategory->id}}">
                                <div class="row no-gutters-sm">
                                    @forelse($prodCategory->products as $product)
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="product"><a class="product-img" href="{{route('product.details', $product->id)}}"><img src="{{url('images', $product->image)}}" alt=""></a>
                                                <h5 class="product-type">{{$product->category->name ?? ''}}</h5>
                                                <h3 class="product-name">{{$product->name}}</h3>
                                                <h3 class="product-price">{{$product->price}} ₽</h3>
                                                <div class="product-select">
                                                    <a href="{{route('cart.add', $product->id)}}"><button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button></a>
                                                    <a href="{{route('product.details', $product->id)}}"><button class="round-icon-btn"> <i class="icon_info_alt"></i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End feature-products-->
@endsection
