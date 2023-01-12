@extends('layouts.master')
@section('title','product create')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Product Name" step="0.01" required>
                    @error('price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image[]" class="form-control" placeholder=" Image" multiple>
                </div>
            </div>
            {{--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tag Name:</strong>
                    <select class="form-control" name="tag_id">
                        <option>Select Tag</option>
                        @foreach ($tag as $key => $value)
                            <option value="{{ $value->id }}" >
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>--}}

            <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
