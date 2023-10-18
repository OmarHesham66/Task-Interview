@extends('User.Layouts.app')
@section('content')
@section('notifycss')
@notifyCss
@endsection
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('wellcome') }}" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                @include('notify::components.notify')
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{ $products->count() }}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active">Featured</a></li>
                                        <li><a href="{{ route('get_shop',['SortD'=>'price']) }}">Price: Low to High</a>
                                        </li>
                                        <li><a href="{{ route('get_shop',['SortA'=>'price']) }}">Price: High to Low</a>
                                        </li>
                                        <li><a href="{{ route('get_shop',['date'=>'created_at']) }}">Release Date</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
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
                                        <a href="{{ route('get_shop') }}">{{ $product->name }}</a>
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
                                    @livewire('btn-add-cart-in-shop-page',['product'=>$product])
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{ $products->withQueryString()->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('get_shop',['category_id'=>$category->id]) }}">
                                    {{ $category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->

                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach (\App\Models\Product::latest()->take(3)->get() as $product)
                        <div class="single-post clearfix">
                            <div class="image">
                                @if (Str::startsWith($product->photo,['http://','https://']))
                                <td><img src="{{$product->photo}}"></td>
                                @else
                                <td><img src="{{ asset('Images/' .$product->photo) }}"></td>
                                @endif
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('get_details_product',$product->id) }}">{{ $product->name }}</a>
                                </h5>
                                <p class="price mb-0 mt-5">${{ $product->price }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('notifyjs')
@notifyJs
@endsection