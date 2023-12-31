<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Buy any two items or more <a href="{{ route('get_shop') }}">View
                                        details</a></li>
                                <li>get a maximum of $10 off </li>
                                <li>Shipping Fees.<a href="{{ route('get_shop') }}">Shop
                                        now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @auth
                <div class="col-xl-9 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li><i class="fi-rs-key"></i>
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="col-xl-9 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li><i class="fi-rs-key"></i>
                                <a href="{{ route('get_login') }}">Log In </a> /
                                <a href="{{ route('get_register') }}">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('wellcome') }}">
                        <img src="{{ asset('assets/imgs/logo/logo.png')}}" alt="logo">
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-style-1" style="opacity: 0">
                        {{-- <form action="#">
                            <input type="text" placeholder="Search for items...">
                        </form> --}}
                    </div>
                    <div class="header-action-right ml-10" style="float:right">
                        <div class="header-action-2">
                            @livewire('cart-icon')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('wellcome') }}"><img src="{{ asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="{{ route('wellcome') }}">Home </a></li>
                                <li><a href="{{ route('get_shop') }}">Shop</a></li>
                                <li class="position-static"><a>Our Collections <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        <li class="sub-mega-menu sub-mega-menu-width-46">
                                            <a class="menu-title">Categories</a>
                                            <ul>
                                                @foreach (App\Models\Category::get() as $category)
                                                <li><a href="{{ route('get_shop',['category_id'=>$category->id]) }}">{{
                                                        $category->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-30">
                                            <div class="menu-banner-wrap">
                                                <a href="{{ route('get_shop') }}"><img
                                                        src="{{ asset('assets/imgs/banner/menu-banner.jpg')}}"
                                                        alt="Surfside Media"></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>Don't miss<br> Trending</h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Shoes are on 10%
                                                            off...</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="{{ route('get_shop') }}">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>35%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    @auth
                                    <a href="{{ route('account.index') }}">My Account ({{ Auth::user()->name }})<i
                                            class="fi-rs-angle-down"></i></a>
                                    @else
                                    <a href="{{ route('account.index') }}">Hello, User<i
                                            class="fi-rs-angle-down"></i></a>
                                    @endauth
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('account.index') }}">Dashboard</a></li>
                                        {{-- <li><a href="{{ route('account.index') }}">My-Orders</a></li> --}}
                                        {{-- @auth
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                        @endauth --}}
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+02) 0111-502-9466 </p>
                </div>
                {{-- <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to
                    40%
                </p> --}}
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        {{-- <div class="header-action-icon-2">
                            <a href="shop-wishlist.php">
                                <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-heart.svg')}}">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg')}}">
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="{{ asset('assets/imgs/shop/thumbnail-3.jpg')}}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="{{ asset('assets/imgs/shop/thumbnail-4.jpg')}}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="cart.html">View cart</a>
                                        <a href="shop-checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('wellcome') }}"><img src="{{ asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-dress"></i>Women's
                                    Clothing</a>
                            </li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-tshirt"></i>Men's
                                    Clothing</a></li>
                            <li> <a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-smartphone"></i>
                                    Cellphones</a>
                            </li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-desktop"></i>Computer &
                                    Office</a>
                            </li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-cpu"></i>Consumer
                                    Electronics</a>
                            </li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-home"></i>Home &
                                    Garden</a></li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-high-heels"></i>Shoes</a>
                            </li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-teddy-bear"></i>Mother &
                                    Kids</a>
                            </li>
                            <li><a href="{{ route('get_shop') }}"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="index.html">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="{{ route('get_shop') }}">shop</a>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our
                                Collections</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's
                                        Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Dresses</a></li>
                                        <li><a href="product-details.html">Blouses & Shirts</a></li>
                                        <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-details.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's
                                        Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Jackets</a></li>
                                        <li><a href="product-details.html">Casual Faux Leather</a></li>
                                        <li><a href="product-details.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Gaming Laptops</a></li>
                                        <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                        <li><a href="product-details.html">Tablets</a></li>
                                        <li><a href="product-details.html">Laptop Accessories</a></li>
                                        <li><a href="product-details.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('get_login') }}">Log In </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('get_register') }}">Sign Up</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">(+02) 0111-502-9466 </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a>
            </div>
        </div>
    </div>
</div>