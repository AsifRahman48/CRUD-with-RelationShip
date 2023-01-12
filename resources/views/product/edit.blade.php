@extends('layouts.master')
@section('title','Create Product')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Update Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}" > Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Product name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Price:</strong>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Product Price">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Image:</strong>
                        <input type="file" name="image[]" value="" class="form-control" multiple>
                        @foreach($product->images as $image)
                            <img src="{{ asset($image->image_url) }}" width='70px' height='70px'  />
                        @endforeach
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
        </form>

@endsection
