@extends('User.Layouts.app')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('wellcome') }}" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                            href="#dashboard" role="tab" aria-controls="dashboard"
                                            aria-selected="false"><i
                                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                            role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                            role="tab" aria-controls="address" aria-selected="true"><i
                                                class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"><i
                                                class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            @auth
                                            <h5 class="mb-0">Hello, {{ Auth::user()->name }}</h5>
                                            @else
                                            <h5 class="mb-0">Hello, User</h5>
                                            @endauth
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a
                                                    id="viewOrder" href="">recent orders</a>, manage your <a
                                                    id="viewAddress" href="">shipping
                                                    address</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($orders->count()>0)
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>SubTotal</th>
                                                            <th>Vat</th>
                                                            <th>Shipping</th>
                                                            <th>Discount</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $row => $order )
                                                        <tr>
                                                            <td>#{{ $order->order_number }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->status_order }}</td>
                                                            <td>{{ $order->total_price }}</td>
                                                            <td>{{ $order->Vat }}</td>
                                                            <td>{{ $order->shiping_price }}</td>
                                                            <td>{{ $order->discount ?? 'No Discount'}}</td>
                                                            @php
                                                            $all =
                                                            $order->total_price + $order->shiping_price + $order->Vat;
                                                            if ($order->dicount) {
                                                            $total =
                                                            $all-array_sum(array_values(json_decode($order->discount,true)));
                                                            }
                                                            @endphp
                                                            <td>{{ $total ?? $all}}</td>
                                                            <td>
                                                                <a href="{{ route('show_item',$order->id) }}"
                                                                    class="btn btn-outline-success btn-sm">Show-Item</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @foreach ($orders as $order)
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>Name: {{$order->Shiping->first_name }} {{
                                                        $order->Shiping->last_name }}<br>
                                                        Email:{{ $order->Shiping->email }},<br>Phone: {{
                                                        $order->Shiping->phone_number }}</address>
                                                    <p>City:{{ $order->Shiping->city }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>SubTotal</th>
                                                            <th>Vat</th>
                                                            <th>Shipping</th>
                                                            <th>Discount</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="8">No Order ...</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>No Addresses ...</address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('js')
<script>
    let view_order= document.getElementById('viewOrder');
    view_order.addEventListener('click',function(e){
        e.preventDefault();
        document.getElementById('orders-tab').click();
    });
     let view_address= document.getElementById('viewAddress');
     view_address.addEventListener('click',function(e){
        e.preventDefault();
        document.getElementById('address-tab').click();
    });
</script>
@endpush