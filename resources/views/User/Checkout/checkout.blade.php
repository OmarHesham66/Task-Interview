@extends('User.Layouts.app')
@section('notifycss')
@notifyCss
@endsection
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('wellcome') }}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                @include('notify::components.notify')
                <div class="col-lg-6 mb-sm-15">
                    <div class="toggle_info">
                        <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an account?</span>
                            <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click
                                here to login</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form" id="loginform">
                        <div class="panel-body">
                            <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                below. If you are a new customer, please proceed to the Billing &amp; Shipping section.
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Username Or Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox"
                                                name="address[billing][checkbox" id="remember" value="">
                                            <label class="form-check-label" for="remember"><span>Remember
                                                    me</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md" type="submit">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4 style="font-weight: bold">Shiping Details</h4>
                    </div>
                    <form action="{{ route('checkout.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="address[first_name]" placeholder="First name *"
                                value="{{ old('address.first_name') }}">
                        </div>
                        @error('address.first_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="address[last_name]" placeholder="Last name *"
                                value="{{ old('address.last_name') }}">
                        </div>
                        @error('address.last_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <div class="custom_select">
                                <select class="form-control select-active" name="address[country]"
                                    @selected(old('address.country'))>
                                    <option value="">Select Country..</option>
                                    @foreach ($countries as $key => $country)
                                    <option value="{{ $key }}">{{ $country['country'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('address.country')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="address[address_name]" placeholder="Address *"
                                value="{{ old('address.address_name') }}">
                        </div>
                        @error('address.address_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="address[city]" placeholder="City / Town *"
                                value="{{ old('address.city') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address[state]" placeholder="State / County *"
                                value="{{ old('address.state') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address[zip_code]" placeholder="Postcode / ZIP *"
                                value="{{ old('address.zip_code') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address[phone_number]" placeholder="Phone *"
                                value="{{ old('address.phone_number') }}">
                        </div>
                        @error('address.phone_number')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="address[email]" placeholder="Email address *"
                                value="{{ old('address.email') }}">
                        </div>
                        @error('address.email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        {{-- <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="create_account"
                                        id="createaccount">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse"
                                        href="#collapsePassword" data-target="#collapsePassword"
                                        aria-controls="collapsePassword" for="createaccount"><span>Create an
                                            account?</span></label>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div id="collapsePassword" class="form-group create-account collapse in">
                            <input type="password" placeholder="Password" name="password_account">
                        </div> --}}

                        <div class="mb-20">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes"></textarea>
                        </div>
                        <button type="submit" class="submit-form" style="display: none"></button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->Products as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ $item->photo }}" alt="#">
                                        </td>
                                        <td>
                                            <h5>
                                                <a href="{{ route('get_details_product',$item->id) }}">{{
                                                    $item->name}}</a>
                                            </h5>
                                            <span class="product-qty">x {{ $item->pivot->quantity}}</span>
                                        </td>
                                        <td>${{ $item->price*$item->pivot->quantity }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">${{ $total }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2"><em>Free Shipping</em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">${{
                                                $total }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <a class="btn btn-fill-out btn-block mt-30 submit">Pay Now</a>
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