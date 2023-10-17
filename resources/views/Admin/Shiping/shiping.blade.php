@extends('Admin.Layout.starter')
@section('title','Shiping')
@section('page','Shiping')
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            {{-- <a href="{{ route('order.create') }}" class="btn  btn-outline-success"
                style="margin: 0 0 15px 5px; font-size:1.4em">Create</a> --}}
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($addresses as $row => $address)
                    <tr>
                        <th scope="row">{{ $row + 1 }}</th>
                        <td>{{ $address->Order->order_number }}</td>
                        <td>{{ $address->first_name }}</td>
                        <td>{{ $address->last_name }}</td>
                        <td>{{ $address->phone_number }}</td>
                        <td>{{ $address->email }}</td>
                        <td>{{ $address->address_name }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->state }}</td>
                        <td>{{ $address->zip_code??'Not Found' }}</td>
                        <td>{{ $address->created_at }}</td>
                    </tr>
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