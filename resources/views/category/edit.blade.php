@extends('layouts.master')
@section('title','Edit Category')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Update Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('categories.index') }}" > Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category Name:</strong>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Category name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category Image:</strong>
                        <input type="file" name="image" value="" class="form-control" accept="image/*">
                            <img src="{{ asset('storage/'.$category->image) }}" width='70px' height='70px'  />
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
        </form>

@endsection
