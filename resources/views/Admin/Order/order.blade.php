@extends('Admin.Layout.starter')
@section('title','Orders')
@section('page','Orders')
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order-Number</th>
                        <th scope="col">User-Name</th>
                        <th scope="col">Order-Status</th>
                        <th scope="col">VAT</th>
                        <th scope="col">Shiping-Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Total-Price</th>
                        <th scope="col">Created At</th>
                        <th colspan="4"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $row => $order)
                    <tr>
                        <th scope="row">{{ $row + 1 }}</th>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->user->name ?? 'Unknown'}}</td>
                        <td>{{ $order->status_order }}</td>
                        <td>{{ $order->Vat }}</td>
                        <td>{{ $order->shiping_price }}</td>
                        <td>{{ $order->discount }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('order.edit',$order->id) }}"
                                class="btn btn-sm btn-outline-success">Edit-Status-Order</a>
                        </td>
                        <td>
                            <form action="{{ route('order.destroy',$order->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <button id="show_address" count="{{ $row }}"
                                class="btn btn-outline-info btn-sm show_address">Show-Adresses</button>
                        </td>
                        <td>
                            <button id="show_item" count="{{ $row }}"
                                class="btn btn-outline-success btn-sm show_item">Show-Item</button>
                        </td>
                    </tr>
                    @if ($order->OrderItems)
                    <tr>
                        <td colspan="10">
                            <p>
                                <button style="display: none" id="item{{ $row }}" type="button" data-toggle="collapse"
                                    data-target="#collapseExampleItem{{ $row }}" aria-expanded="false"
                                    aria-controls="collapseExampleItem{{ $row }}">
                                    Button
                                </button>
                            </p>
                            <div class="collapse" id="collapseExampleItem{{ $row }}">
                                <div class="card card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product-Name</th>
                                                <th scope="col">Product-Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->OrderItems as $key => $item)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <th>{{ $item->product_name }}</th>
                                                <th>{{ $item->price }}</th>
                                                <th>{{ $item->quantity }}</th>
                                                <th>{{ $item->created_at }}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @if ($order->Shiping)
                    <tr>
                        <td colspan="10">
                            <p>
                                <button style="display: none" id="add{{ $row }}" type="button" data-toggle="collapse"
                                    data-target="#collapseExampleAdd{{ $row }}" aria-expanded="false"
                                    aria-controls="collapseExampleAdd{{ $row }}">
                                    Button
                                </button>
                            </p>
                            <div class="collapse" id="collapseExampleAdd{{ $row }}">
                                <div class="card card-body">
                                    <table class="table">
                                        <thead class="table-active">
                                            <th scope="col">#</th>
                                            <th scope="col">Order-Number</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">City</th>
                                            <th scope="col">State</th>
                                            <th scope="col">Zip-Code</th>
                                            <th scope="col">Created At</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <th>{{ $order->Shiping->Order->order_number }}</th>
                                                <th>{{ $order->Shiping->first_name }}</th>
                                                <th>{{ $order->Shiping->last_name }}</th>
                                                <th>{{ $order->Shiping->phone_number }}</th>
                                                <th>{{ $order->Shiping->email }}</th>
                                                <th>{{ $order->Shiping->address_name }}</th>
                                                <th>{{ $order->Shiping->city }}</th>
                                                <th>{{ $order->Shiping->state }}</th>
                                                <th>{{ $order->Shiping->zip_code ??'Not Found'}}</th>
                                                <th>{{ $order->Shiping->created_at }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td colspan="6">No Defined Orders .</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    let list1 = Array.from(document.querySelectorAll(".show_item"))
    list1.forEach(element => {
        element.addEventListener("click", function () {
        let number1= "item" + element.getAttribute('count');
        document.getElementById(number1).click();
    })
    });
    let list2 = Array.from(document.querySelectorAll(".show_address"))
    list2.forEach(element => {
        element.addEventListener("click", function () {
        let number2= "add" + element.getAttribute('count');
        document.getElementById(number2).click();
    })
    });
</script>
@endpush