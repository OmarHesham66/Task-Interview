@extends('Admin.Layout.starter')
@section('title','Products')
@section('page','Products')
@section('content')
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control @error('name')
                    is-invalid
                    @enderror" name="name" placeholder="Name..." value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTitle4">Title</label>
                    <input type="Title" class="form-control @error('title')
                        is-invalid
                    @enderror" id="inputTitle4" name="title" placeholder="Title" value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="inputDescribtion">Describtion</label>
                <input type="text" name="describtion" class="form-control  @error('describtion')
                is-invalid
                @enderror" id="inputDescribtion" placeholder="Text...." value="{{ old('describtion') }}">
                @error('describtion')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <label for="">Photo</label>
            <div class="input-group mb-3">
                <div class="custom-file col-3">
                    <input type="file" class="custom-file-input @error('photo')
                    is-invalid
                @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="photo">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Price</label>
                    <input type="text" name="price" class="form-control @error('price')
                        is-invalid
                    @enderror" id="inputCity" value="{{ old('price') }}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Price-After-Discount</label>
                    <input type="text" name="discount" class="form-control @error('discount')
                        is-invalid
                    @enderror" id="inputZip" value="{{ old('discount') }}">
                    @error('discount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Category</label>
                    <select id="inputState" name="category_id" class="form-control @error('category_id')
                    is-invalid
                @enderror">
                        <option value="">Choose...</option>
                        @foreach ($categories as $category)
                        <option @selected(old('category_id')==$category->id) value="{{ $category->id }}">{{
                            $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <button type="submit" id="submit_form" class="btn btn-outline-primary">Add</button>
        </form>
    </div>
</div>
@endsection