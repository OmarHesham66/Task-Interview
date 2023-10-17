@extends('Admin.Layout.starter')
@section('title','Users')
@section('page','Users')
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Created At</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $row => $user)
                    <tr>
                        <th scope="row">{{ $row + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if (Str::startsWith($user->photo,['http://','https://']))
                        <td><img src="{{$user->photo}}" style="width=75px;height:75px"></td>
                        @else
                        <td><img src="{{ asset('Images/' .$user->photo) }}" style="width=75px;height:75px"></td>
                        @endif
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">
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