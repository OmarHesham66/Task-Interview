@extends('User.Layouts.app')
@section('content')
<main class="main">
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Trade-in offer</h4>
                                <h2 class="animated fw-900">Super value deals</h2>
                                <h1 class="animated fw-900 text-brand">On all Shoes</h1>
                                <p class="animated">Shoes are on 10% off.</p>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('get_shop') }}"> Shop Now
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{ asset('assets/imgs/slider/slider-1.png')}}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Hot promotions</h4>
                                <h2 class="animated fw-900">Fashion Trending</h2>
                                <h1 class="animated fw-900 text-7">Great Collection</h1>
                                <p class="animated">Buy any two tops (T-Shirt or Blouse) and get any jacket half its
                                    price.</p>
                                <a class="animated btn btn-brush btn-brush-2" href="{{ route('get_shop') }}">
                                    Discover
                                    Now
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2" src="{{ asset('assets/imgs/slider/slider-2.png')}}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-1.png')}}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-2.png')}}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-3.png')}}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-4.png')}}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-5.png')}}" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-6.png')}}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                            type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                            type="button" role="tab" aria-controls="tab-three" aria-selected="false">New
                            added</button>
                    </li>
                </ul>
                <a href="{{ route('get_shop') }}" class="view-more d-none d-md-flex">View More<i
                        class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <!--End tab one (Featured)-->
                <div class="tab-pane fade show active" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($popular_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('get_details_product',$product->id) }}">
                                            @if (Str::startsWith($product->photo,['http://','https://']))
                                            <td><img src="{{$product->photo}}"></td>
                                            @else
                                            <td><img src="{{ asset('Images/' .$product->photo) }}"></td>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('get_details_product',$product->id) }}">{{ $product->name }}
                                        </a>
                                    </div>
                                    <h2><a href="{{ route('get_details_product',$product->id) }}">{{
                                            $product->description }}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>${{ $product->price }}</span>
                                        {{-- <span class="old-price">$245.8</span> --}}
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i
                                                class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($new_added_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('get_details_product',$product->id) }}">
                                            @if (Str::startsWith($product->photo,['http://','https://']))
                                            <td><img src="{{$product->photo}}"></td>
                                            @else
                                            <td><img src="{{ asset('Images/' .$product->photo) }}"></td>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('get_details_product',$product->id) }}">{{ $product->name
                                            }}</a>
                                    </div>
                                    <h2><a href="{{ route('get_details_product',$product->id) }}">{{
                                            $product->description }}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>${{ $product->price }}</span>
                                        {{-- <span class="old-price">$245.8</span> --}}
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i
                                                class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{ asset('assets/imgs/banner/banner-4.png')}}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Buy any two top</h4>
                    <h1 class="fw-600 mb-20"> (t-shirt or blouse) <br>and get any jacket half its price.</h1>
                    <a href="{{ route('get_shop') }}" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            {{-- ////////////////////////////////////////////////////////////////////////////////// --}}
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
                </div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($categories as $category)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="{{ route('get_shop',['category_id'=>$category->id]) }}">
                                @if (Str::startsWith($category->photo,['http://','https://']))
                                <td><img src="{{$category->photo}}" style="width:172px; height:200px;"></td>
                                @else
                                <td><img src="{{ asset('Images/' .$category->photo) }}"
                                        style="width:172px; height:200px;"></td>
                                @endif
                            </a>
                        </figure>
                        <h5><a href="{{ route('get_shop',['category_id'=>$category->id]) }}">{{ $category->name }}</a>
                        </h5>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- ////////////////////////////////////////////////////////////////////////////////////////////// --}}
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset('assets/imgs/banner/banner-1.png')}}" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>T-Shirts</h4>
                            <a href="{{ route('get_shop',['category_id'=>2]) }}">Shop Now <i
                                    class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset('assets/imgs/banner/banner-2.png')}}" alt="">
                        <div class="banner-text">
                            <span>Buy any two items or more</span>
                            <h4>get a maximum of $10 off <br>shipping fees</h4>
                            <a href="{{ route('get_shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="{{ asset('assets/imgs/banner/banner-3.png')}}" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="{{ route('get_shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                </div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($new_added_products as $product)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('get_details_product',$product->id) }}">
                                    <img class="default-img" src="{{ $product->photo }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('get_details_product',$product->id) }}">{{ $product->name }}</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>${{ $product->price }}</span>
                                {{-- <span class="old-price">$245.8</span> --}}
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows">
                </div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach ($brands as $brand)
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/' . $brand->photo)}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}

</main>
@endsection