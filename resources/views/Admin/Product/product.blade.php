@extends('Admin.Layout.starter')
@section('title','Products')
@section('page','Products')
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <a href="{{ route('product.create') }}" class="btn  btn-outline-success"
                style="margin: 0 0 15px 5px; font-size:1.4em">Create</a>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Describtion</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Shiping-From</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Avaliable</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Created At</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $row => $product)
                    <tr>
                        <th scope="row">{{ $row + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        @if (Str::startsWith($product->photo,['http://','https://']))
                        <td><img src="{{$product->photo}}" width="75px" height="75px"></td>
                        @else
                        <td><img src="{{ asset('Images/' .$product->photo) }}" width="75px" height="75px"></td>
                        @endif
                        <td>{{ $product->shiping_from }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->avaliable }}</td>
                        <td><span style="opacity: 0">.....</span>{{ $product->quantity }}</td>
                        <td>{{ $product->Category->name }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <a href="{{ route('product.edit',$product->id) }}"
                                class="btn btn-sm btn-outline-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
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