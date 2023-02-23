@extends('layouts.master')
@section('title','product list')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>

        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('products.create') }}">
                    Add Product
                </a>
            </div>
        </div>

        <table class="table table-bordered yajra-datatable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $list)
            <tr>
                <td>{{ $list->name }}</td>
                <td>{{ $list->price }}</td>
                <td>{{ $list->qty }}</td>
                {{--<td>
                    @php
                    $count=count($list->tags)
                    @endphp
                @foreach($list->tags as $tag)
                {{$tag->name ?? ''}}{{$loop->iteration<$count?",":""}}
                @endforeach
                </td>--}}
                <td>
                    @foreach($list->images as $image)
                        <img src="{{ asset($image->image_url) }}" width='70px' height='70px'  />
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('products.destroy',$list->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('products.edit',$list->id) }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('products.show',$list->id) }}">View</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


